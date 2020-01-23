<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>@yield('title') | Booking</title>
    <link href="{{asset('public/frontend/assets/images/favicon.png')}}" rel="shortcut icon">

    <!-- fraimwork - css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/bootstrap.min.css')}}">


    <!-- icon css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/fontawesome-all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/flaticon.css')}}">



    <!-- carousel css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/slick.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/slick-theme.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/owl.theme.default.min.css')}}">

    <!-- others css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/jquery.mCustomScrollbar.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/calendar.css')}}">


    <!-- custom css include -->
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/style.css')}}">

    @yield('style')

</head>
<body class="homepage3 default-header-p">
<!-- backtotop - start -->
<div id="thetop" class="thetop"></div>
<div class='backtotop'>
    <a href="#thetop" class='scroll'>
        <i class="fas fa-angle-double-up"></i>
    </a>
</div>
<!-- backtotop - end -->

<!-- preloader - start -->
<div id="preloader"></div>
<!-- preloader - end -->




<!-- header-section - start
================================================== -->
@include('shared.frontend.header')
<!-- header-section - end
================================================== -->


<!-- altranative-header - start
================================================== -->
@include('shared.frontend.header-mobile')
<!-- altranative-header - end
================================================== -->


@yield('content')


<!-- default-footer-section - start
================================================== -->

@include('shared.frontend.footer')

<!-- default-footer-section - end
================================================== -->

<!-- fraimwork - jquery include -->
<script src="{{asset('public/frontend/assets/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/moment.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/popper.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/bootstrap.min.js')}}"></script>

<!-- carousel jquery include -->
<script src="{{asset('public/frontend/assets/js/slick.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/owl.carousel.min.js')}}"></script>

<!-- map jquery include -->
<script src="{{asset('public/frontend/assets/js/gmap3.min.js')}}"></script>
@yield('script2')
<!--<script src="http://maps.google.com/maps/api/js?key=AIzaSyC61_QVqt9LAhwFdlQmsNwi5aUJy9B2SyA"></script>-->

<!-- calendar jquery include -->
<script src="{{asset('public/frontend/assets/js/atc.min.js')}}"></script>

<!-- others jquery include -->
<script src="{{asset('public/frontend/assets/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/jarallax.min.js')}}"></script>
<script src="{{asset('public/frontend/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!-- gallery img loaded - jqury include -->
<script src="{{asset('public/frontend/assets/js/imagesloaded.pkgd.min.js')}}"></script>

<!-- multy count down - jqury include -->
<script src="{{asset('public/frontend/assets/js/jquery.countdown.js')}}"></script>

<!-- custom jquery include -->
<script src="{{asset('public/frontend/assets/js/custom.js')}}"></script>


@yield('script')
</body>
</html>

