@extends('layouts.app')
@section('contents')
    <div class="page-title-area title-bg-eight">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="container">
                    <div class="title-item">
                        <h2>Contact</h2>
                        <ul>
                            <li>
                                <a href="{{route('index')}}">Home</a>
                            </li>
                            <li>
                                <span>Contact</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="contact-info-area pt-100 pb-70">
        @if(Session::has('message'))
        <span class="alert alert-{{Session::get('alert')}}"> {{Session::get('message')}}</span>
        @endif
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-4">
                    <div class="contact-info">
                        <i class="icofont-location-pin"></i>
                        <span>Location:</span>
                        <a href="#">{{$settings->address}}</a>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="contact-info">
                        <i class="icofont-ui-call"></i>
                        <span>Phone:</span>
                        <a href="tel:+123456789">{{$settings->site_phone}}</a>
                    </div>
                </div>
                <div class="col-sm-6 offset-sm-3 offset-lg-0 col-lg-4">
                    <div class="contact-info">
                        <i class="icofont-ui-email"></i>
                        <span>Email:</span>
                        <a href="{{$settings->site_email}}"> </span></a>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="contact-area pb-70">
        <div class="container">
            <form id="contactForm"action="{{route('contact-email')}}" method="post">
                @csrf
                <h2>Get in touch with us...!</h2>
                <p>Please fill the contact form below and submit</p>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <i class="icofont-user-alt-3"></i>
                            </label>
                            <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control" placeholder="Name"
                                required data-error="Please enter your name">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label>
                                <i class="icofont-ui-email"></i>
                            </label>
                            <input type="email" value="{{old('email')}}" name="email" id="email" class="form-control" placeholder="Email"
                                required data-error="Please enter your email">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>
                                <i class="icofont-ui-call"></i>
                            </label>
                            <input type="text"  value="{{old('phone')}}" name="phone" id="phone_number" placeholder="Phone" required
                                data-error="Please enter your number" class="form-control">
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>
                                <i class="icofont-comment"></i>
                            </label>
                            <textarea name="message"  class="form-control" id="message" cols="30" rows="8" placeholder="Write message"
                                required data-error="Write your message"> {{old('message')}}</textarea>
                            <div class="help-block with-errors"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn common-btn">
                            Send Message
                        </button>
                        <div id="msgSubmit" class="h3 text-center hidden"></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="map-area">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3964.2287126794126!2d3.334485974692173!3d6.492699123521129!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x103b8ea877e45983%3A0xe003bed2ce212be9!2s43%20Oladimeji%20St%2C%20Ijesha%20Tedo%2C%20Lagos%20103251%2C%20Lagos!5e0!3m2!1sen!2sng!4v1719236800125!5m2!1sen!2sng" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
@endsection
