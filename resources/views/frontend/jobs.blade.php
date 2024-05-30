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

<!-- Start Page Content Wrapper -->
<div class="page-content-wrap pt-90 pt-sm-60 pb-90 pb-sm-60 mb-xl-30">
    <div class="about-us-page-area">
        <div class="container">
         <div class="row">
                <div class="col-lg-4 order-1 ">
                    <!-- Start Service Details Sidebar -->
                    <div class="service-details-sidebar mtm-40 mtm-sm-2 mtm-md-2">
                        <!-- Start Sidebar Item -->
                       
                        <div class="sidebar-single" style="background: #fff">
                            <a href="{{asset('/assets/NCIC-HR.pdf')}}" target="_blank" class="btn btn-secondary">Download Company brochure</a>
                            <hr>
                            <h3 class="sidebar-heading">Job Ids</h3>
                            <hr>
                            <div class="sidebar-body">
                                <ul class="service-list">
                                    @forelse ( $industries as $industry)
                                    <li><a href="{{route('industries-category',$industry->id.'-'.str_replace(' ','',$industry->name))}}">{{$industry->name}}</a>
                                </li>
                                    @empty
                                        
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        <!-- End Sidebar Item -->

                    </div>
                </div>

                <div class="col-lg-8 order-0">
                    <div class="about-discover-content mb-md-22 mb-sm-22">
                        <div class="about-discover-head">
                            <h4>Job Feeds</h4>
                          
                        </div>

                        <div class="about-awards-content mt-46 mt-sm-36">
                          

                            <div class="partner-content-wrap mt-50 mt-sm-40">
                                <div class="row mtm-30">
                                    @forelse ($jobs as $job )
                                    <div class="col-md-12 p-3 mb-3" style="border: 1px solid #b2b2b260; border-radius:10px">
                                        <div class="discover-item">
                                            <div class="discover-item__thumb">
                                                <img src="{{asset('/assets/img/partner/partner-1.jpg')}}" alt="Discover"/>
                                            </div>
                                            <div class="discover-item__info">
                                                {{-- <span style="float:right"> Posted: {{$job->created_at->diffForHumans()}}</span> --}}
                                                <h6 style="color:#0099ff">{{$job->title}}</h6> 
                                                <p style="color:#0099ff">{{$job->company??$job->company}}</p>
                                                <span  class="p-1" style="border-radius: 4px; background:#9ab6c957; color:#5f5a5a"> {{$job->location}}</span>  
                                                 <span class="p-1" style="border-radius: 4px; background:#9ab6c957; color:#5f5a5a"> {{$job->job_type}}</span>  
                                                 <span class="p-1" style="border-radius: 4px; background:#9ab6c957; color:#5f5a5a"> {{$job->salary_range}}</span> <br>
                                               <span> Job ID: {{$job->industry->name}}</span> <br>
                                               <hr>
                                               <span> {!! substr($job->job_details,0,400) !!}@if(strlen($job->job_details) > 400)... <a href="{{route('job-details', $job->id.'-'.str_replace(' ','',$job->title))}}"> readmore @endif</a> <br> <a href="{{route('job-details', $job->id.'-'.str_replace(' ','',$job->title))}}" class=" btn-primary btn-sm rounded"> Apply for this Job</a></span>
                                            </div>
                                          
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-12 p-3 mb-3" style="border: 1px solid #b2b2b260; border-radius:10px">
                                        <div class="discover-item">
                                            <div class="discover-item__thumb">
                                                <img src="{{asset('/assets/img/partner/partner-1.jpg')}}" alt="Discover"/>
                                            </div>
                                            <div class="discover-item__info">
                                                <h6 style="color:#0099ff">No jobs found for this category</h6> 
        
                                            </div>
                                          
                                        </div>
                                    </div>
                                    @endforelse

                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection