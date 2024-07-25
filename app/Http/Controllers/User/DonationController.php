<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use App\Models\DonationCategory;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    //

    public function Index(){
        return view('frontend.donations')
        ->with('donations', DonationCategory::latest()->get())
        ->with('title', 'Donations');
    }

    public function Details($donation_id){
        return view('frontend.donation-details')
        ->with('donation', DonationCategory::where('id', decrypt($donation_id))->first())
        ->with('donations', Donation::where(['donation_category_id' => decrypt($donation_id), 'status' => 'success'])->latest()->get())
        ->with('title', 'Donation');
    }



}
