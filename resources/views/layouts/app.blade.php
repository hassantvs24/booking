<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Booking</title>

    <!-- Global stylesheets -->
    <link href="{{asset('public/fonts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/assets/css/core.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/assets/css/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('public/assets/css/colors.min.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->
    <link href="{{asset('public/custom.css')}}" rel="stylesheet" type="text/css">
</head>
<body class="login-container">

<!-- Main navbar -->
@include('shared.app_nav')
<!-- /main navbar -->

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

            @yield('content')

            <!-- Footer -->
            @include('shared.footer')
            <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->


<!-- Core JS files -->
<script type="text/javascript" src="{{asset('public/assets/js/plugins/loaders/pace.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/plugins/ui/moment/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/core/libraries/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/core/libraries/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/plugins/loaders/blockui.min.js')}}"></script>
<!-- /core JS files -->

<!-- Theme JS files -->
<script type="text/javascript" src="{{asset('public/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>

<script type="text/javascript" src="{{asset('public/assets/js/core/app.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/pages/login.js')}}"></script>
<!-- /theme JS files -->
</body>
</html>

<!--
Copyright © Infinity Flame Soft
Author: Nazmul Hossain
Company: Infinity Flame Soft
Contact: +8801675870047
Email: wall.mate@gmail.com
-->
