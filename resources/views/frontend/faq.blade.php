@extends('layouts.app')
@section('contents')
@if(isset($breadcrums))
<div class="page-header-area" style="background: #ddd url('{{asset('/images/'.$breadcrums->image)}}')  center">
   @else 
   <div class="page-header-area" style="background: #ddd url('{{asset('/images')}}') no-repeat center">
   @endif
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-4">
                <div class="page-header-title text-center text-md-start">
                    {{-- <h1>Blog Details</h1> --}}
                </div>
            </div>

            <div class="col-md-6 col-lg-8">
                {{-- <nav class="page-header-breadcrumb text-center text-md-end">
                    <ul class="breadcrumb">
                        <li><a href="{{route('index')}}">Home</a></li>
                        <li class="active"><a href="">Blog Details</a></li>
                    </ul>
                </nav> --}}
            </div>
        </div>
    </div>
</div>


<section class="news-why-choose-area mt-90 mt-sm-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-11 col-xl-11">
                <!-- Start Why Choose Content -->
                <div class="why-choose-content-wrap mt-md-84 mt-sm-52">
                    <div class="section-title-wrap mb-34">
                        <h2 class="mb-2">Great ncicworld FAQs</h2>
                    </div>

                    <div class="why-choose-content-inner">
                        <div class="accordion" id="chooseAccordion">
                            <!-- Start Why choose Us Item -->
                            @forelse ($faqs as $faq)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne{{$faq->id}}">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne{{$faq->id}}" aria-expanded="true" aria-controls="collapseOne">
                                       {{$faq->title}}
                                    </button>
                                </h2>
                                <div id="collapseOne{{$faq->id}}" class="accordion-collapse collapse " aria-labelledby="headingOne" data-bs-parent="#chooseAccordion">
                                    <div class="accordion-body">
                                        <p>{!! $faq->content !!}.</p>
                                    </div>
                                </div>
                            </div>   
                            @empty
                            @endforelse

                         
                        </div>
                    </div>
                </div>
                <!-- End Why Choose Content -->
            </div>
        </div>
    </div>
</section>

<div class="p-5"></div>

@endsection