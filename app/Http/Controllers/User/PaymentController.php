<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Unicodeveloper\Paystack\Facades\Paystack;
use Illuminate\Support\Facades\{Auth, Hash, Redirect, Session, Validator};
use App\Models\{Donation, DonationCategory, User, Wallet};


class PaymentController extends Controller
{
    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    
    public function pay(Request $request)
    {
        $required_data = $request->only('amount');
       $valid =  Validator::make($request->all(), [
            'amount' => 'required|gte:100',
            'name' => 'required',
            'email' => 'required',
        ]);

        if($valid->fails()){
            Session::flash('alert', 'danger');
            Session::flash('message', $valid->errors()->first());
            return back()->withInput($request->all());
        }


        $user = User::where('email', $request->email)->first();
        if(!$user){
            $user = user::create([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->fullname)
            ]);
        }
        Auth::login($user);
    
        // $tax = (intval($required_data['customAmount']) * 7.5)/100;
        $trans_reference = str_replace(['\\', '/', '!', '@', '#', '$', '%', '^', '&', '*', '(', ')', '{', '}', '[', ']'], '', substr(base64_encode(random_bytes(10)), 0,20));
        $donation = Donation::whereId($request->category_id)->latest()->first();


        Donation::create([
            'user_id' => auth()->user()->id,
            'donation_category_id' => $request->category_id,
            'amount' => intval($required_data['amount']),
            'is_public' => 1,
            'ref' => $trans_reference,
            'prev_balance' => $donation->prev_balance??0,
            'total_amount' => $donation->prev_balance??0 + intval($required_data['amount']),
        ]);
        
        $request->merge([
            'amount' => intval($required_data['amount']) * 100,
            'reference' => $trans_reference,
            'email' => auth()->user()->email,
            'currency' => 'NGN',
            'metadata' => $request->category_id,
        ]);

        try{
            return Paystack::getAuthorizationUrl()->redirectNow();
        }catch(\Exception $e) {
            return Redirect::back()->withMessage(['msg'=>'The paystack token has expired. Please refresh the page and try again.', 'type'=>'error']);
        }        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */

    public function handleCallback(Request $request)
    {
        $response_data = Paystack::getPaymentData();
          dd($response_data);

        if ($response_data['status'] != true){
            Session::flash('alert', 'success');
            session()->flash('message', $response_data['message'].',please contact support.');
            return redirect()->route('user.donation.details',  $response_data['data']['metadata']);
        }
      
        //check if transaction ref exist 

         $check = Donation::where('trans_id',  $request->trxref)->first();
         if($check)
         {
            Session::flash('alert', 'success');
            session()->flash('message', ' Transaction already completed.');
            return back();
         }

        if ($response_data['status'] == true  && $response_data['data']['status'] == 'success'){
            $user = User::where('email', $response_data['data']['customer']['email'])->first();
            if($user){
                $transaction = Donation::where(['ref' => $response_data['data']['reference'], 'user_id' => $user->id])->first();
                $transaction->update(['status'=> 'success', 'trans_id' => $request->trxref]);
                $donation_category = DonationCategory::where('id',  $transaction->donation_category_id)->first();
                $donation_category->update([
                    'total_donors' => $donation_category->total_donors + 1,
                    'amount_raised' => $donation_category->amount_raised + ($response_data['data']['amount']*0.01)
                ]);
            }
            // dd($response_data['data']['amount']*0.01);
            Session::flash('alert', 'success');
            Session::flash('message', 'Payment completed successfully, thank you for donating');
            return view('frontend.donation-details')
            ->with('donation', $donation_category)
            ->with('donations',  Donation::where(['donation_category_id' => $donation_category->id, 'status' => 'success'])->latest()->get());
        }
    }
}
