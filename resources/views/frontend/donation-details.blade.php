@extends('layouts.app')
@section('contents')
    <div class="page-title-area title-bg-three">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h4 style="color:#fff">{{$donation->title}}</h4>
                        <ul>
                            <li>
                                <a href="">Home</a>
                            </li>
                            <li>
                                <span>Donation Details</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="donation-details-area ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="details-item">
                        <div class="details-img">
                       
                            <h2>{{$donation->title}}</h2>
                            <img src="{{asset('images/'.$donation->image)}}" alt="Details" width="300px">
                            <p>{!! $donation->content !!}</p>
             
                        </div>
                        <div class="details-payment">
                            <h4>Proceed to  Payment</h4>
                            @if(session()->has('alert'))
                             <span class="badge bg-{{session()->get('alert')}}">   {{session()->get('message')}}</span>
                            @endif
                            <form action="{{route('pay')}}" method="post">
                                @csrf
                                <div class="form-input-area">
                                    <div class="form-group">
                                        <label>
                                            <i class="icofont-user-alt-3"></i>
                                        </label>
                                        <input type="text" class="form-control"  name="name" value="{{old('name')}}" placeholder="Full  Name">
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <i class="icofont-ui-email"></i>
                                        </label>
                                        <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <i class="icofont-ui-call"></i>
                                        </label>
                                        <input type="text" class="form-control" name="phone" value="{{old('phone')}}" placeholder="Phone number">
                                    </div>
                                    <div class="form-group">
                                        <label>
                                            <i class="">₦</i>
                                        </label>
                                        <input type="text" class="form-control" name="amount" value="{{old('amount')}}" placeholder="100.00">
                                    </div>
                                    <input type="hidden" value="{{$donation->id}}" name="category_id">
                                    <div class="text-center">
                                        <button type="submit" class="btn common-btn">Donate Now</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="widget-area">
                        <div class="common-right-content widget-item">
                            <h3>Recent Donors</h3>
                            <ul>
                                @forelse($donations as $ss)
                                <li>
                                    <span style="color:green"> {{$ss->user->name}} </span>donated <span style="color:red">  {{moneyFormat($ss->amount)}} </span> 
                                </li>
                                @empty 
                               
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
