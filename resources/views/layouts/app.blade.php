<!DOCTYPE html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title> {{isset($title)?$title.'| ELB Foundation': $settings->site_name}} </title>
    <link rel="shortcut icon" href="{{asset('/assets/fav.png')}}" type="image/x-icon"/>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700" rel="stylesheet"/>

<link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/icofont.min.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/meanmenu.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/modal-video.min.css')}}">
<link rel="stylesheet" href="{{asset('/assets/fonts/flaticon.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/animate.min.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/lightbox.min.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/owl.theme.default.min.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/odometer.min.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/nice-select.min.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/responsive.css')}}">
<link rel="stylesheet" href="{{asset('/assets/css/theme-dark.css')}}">
    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
   @include('layouts.header')
    @yield('contents')
<!--== Start Footer Area Wrapper ==-->
@include('layouts.footer')
@include('layouts.js')
<!-- End Off Canvas Menu Wrapper -->
