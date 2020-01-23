@extends('layouts.frontend')

@section('title')
    Customer Profile
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
                                <span class="sub-title">customer profile</span>
                                <h2 class="big-title">Hi <strong>
                                        @if(Auth::check())
                                            {{Auth::user()->name}}
                                            @else
                                            Customer
                                        @endif
                                    </strong></h2>
                            </div>
                            <!-- breadcrumb-title - end -->

                            <!-- breadcrumb-list - start -->
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-item"><a href="{{route('front.home')}}" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Customer Profile</li>
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


    <!-- absolute-eventmake-section - start
    ================================================== -->
    <section class="event-search-tab">
        <div id="absolute-eventmake-section" class="absolute-eventmake-section sec-ptb-170 bg-gray-light clearfix">
            <div class="eventmaking-wrapper">
                <ul class="nav eventmake-tabs">
                    <li>
                        <a class="active" data-toggle="tab" href="#profile">
                            profile
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#ordersummary">
                            order summary
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#changepassword">
                            change password
                        </a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div id="profile" class="tab-pane fade in active show">
                        <table class="table table-bordered" style="width:500px;">
                            <tbody><tr>
                                <th>Name</th>
                                <td>John Doe</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>info@demo.com</td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td>11223344</td>
                            </tr>
                            </tbody></table>
                    </div>

                    <div id="ordersummary" class="tab-pane fade">
                        <table class="table table-bordered">
                            <tbody><tr>
                                <th>Booking ID</th>
                                <th>Booking Details</th>
                                <th>Booking Date</th>
                                <th>Event Date</th>
                                <th>Paid Amount</th>
                                <th>Package</th>
                                <th>No. of Guests</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td>25845</td>
                                <td> Hiraba Farm, <br>
                                    Behind Shalby Hospital, Garden Road, Prahlad Nagar , Ahmedabad-380015 <br>
                                    Phone : +91-79-12345678 </td>
                                <td>10 Jan 2020</td>
                                <td>13 Jan 2020</td>
                                <td>20,000 BDT</td>
                                <td>Standard</td>
                                <td>100</td>
                                <td>Booked</td>
                            </tr>
                            </tbody></table>
                    </div>
                    <div id="changepassword" class="tab-pane fade">
                        <form class="pro_form" action="" style="width:500px;">
                            <input type="password" name="" class="form-control" id="" placeholder="Current Password">
                            <br>
                            <input type="password" name="" class="form-control" id="" placeholder="New Password">
                            <br>
                            <input type="password" name="" class="form-control" id="" placeholder="Confirm Password">
                            <br>
                            <button type="button" name="" class="custom-btn">Change Password</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- absolute-eventmake-section - end
    ================================================== -->

@endsection


@section('script')
    <script type="text/javascript">



    </script>
@endsection