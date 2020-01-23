@extends('layouts.frontend')

@section('title')
    Checkout
@endsection

@section('content')

    <!-- breadcrumb-section - start
		================================================== -->
    <section id="breadcrumb-section" class="breadcrumb-section clearfix">
        <div class="jarallax" style="background-image: url({{asset('public/frontend/assets/images/breadcrumb/0.breadcrumb-bg.jpg')}});">
            <div class="overlay-black">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-12 col-sm-12">

                            <!-- breadcrumb-title - start -->
                            <div class="breadcrumb-title text-center mb-50">
                                <h2 class="big-title">checkout</h2>
                            </div>
                            <!-- breadcrumb-title - end -->

                            <!-- breadcrumb-list - start -->
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-item"><a href="{{route('front.home')}}" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">checkout</li>
                                </ul>
                            </div>
                            <!-- breadcrumb-list - end -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- breadcrumb-section - end
    ================================================== -->





    <!-- booking-section - start
    ================================================== -->
    <section id="booking-section" class="booking-section bg-gray-light sec-ptb-100 clearfix">
        <div class="container">
            <div class="row">

                <!-- booking-content-wrapper - start -->
                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="booking-content-wrapper">
                        <!-- reg-info - start -->
                        <div class="reg-info mb-50">

                            <!-- section-title - start -->
                            <div class="section-title mb-30">
                                <h2 class="big-title">User <strong>information</strong></h2>
                            </div>
                            <!-- section-title - end -->

                            <!-- row - start -->
                            <div class="row">

                                <!-- ticket-buying-form - start -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="ticket-buying-form form-wrapper">
                                        <h3 class="form-title">Registration</h3>

                                        <form action="{{ route('register') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="userType" value="Customer">
                                            <div class="form-item">
                                                <input type="text" placeholder="User Name" name="name" value="{{ old('name') }}" required>
                                            </div>
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-item">
                                                <input type="email" placeholder="Your email" name="email" value="{{ old('email') }}" required>
                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-item">
                                                <input type="text" placeholder="Your contact" name="contact" value="{{ old('contact') }}" required>
                                            </div>
                                            @if ($errors->has('contact'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('contact') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-item">
                                                <input type="password" placeholder="Create password" name="password" required>
                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                            <div class="form-item">
                                                <input type="password" placeholder="Confirm Password" name="password_confirmation" required>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="custom-btn">
                                                    Register
                                                </button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                                <!-- ticket-buying-form - end -->

                                <!-- payment-form - start -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="payment-form form-wrapper">
                                        <h3 class="form-title">Login</h3>

                                        <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-item {{ $errors->has('email') ? ' has-error' : '' }}">
                                                <input type="email" name="email" placeholder="Your Email" autofocus required>

                                            </div>
                                            @if ($errors->has('email'))
                                                <span class="help-block text-danger">
                                                        <small>{{ $errors->first('email') }}</small>
                                                </span>
                                            @endif
                                            <div class="form-item {{ $errors->has('password') ? ' has-error' : '' }}">
                                                <input type="password" name="password" placeholder="Password" required>

                                            </div>
                                            @if ($errors->has('password'))
                                                <span class="help-block text-danger">
                                                        <small>{{ $errors->first('password') }}</small>
                                                </span>
                                            @endif
                                            <div class="form-check">
                                                <input class="form-check-input" name="remember" type="checkbox" value="" id="defaultCheck1" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Remember me
                                                </label>
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                <a href="{{ route('password.request') }}">Forgot password?</a>
                                            </div>

                                            <div class="text-center">
                                                <button type="submit" class="custom-btn">
                                                    Login
                                                </button>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                                <!-- payment-form - end -->
                            </div>
                            <!-- row - end -->
                        </div>
                        <!-- reg-info - end -->
                    </div>
                </div>
                <!-- booking-content-wrapper - end -->

                <!-- sidebar-section - start -->
                @include('shared.frontend.right-pan')
                <!-- location-wrapper - end -->

                    </div>
                </div>
                <!-- sidebar-section - end -->

            </div>
        </div>
    </section>
    <!-- booking-section - end
    ================================================== -->


@endsection


@section('script')
    <script type="text/javascript">



    </script>
@endsection