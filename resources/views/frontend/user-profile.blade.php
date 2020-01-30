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
                        <a class="active" data-toggle="tab" href="#ordersummary">
                            order summary
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#transactions">
                            transaction history
                        </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#profile">
                            profile
                        </a>
                    </li>
                </ul>

                <div class="tab-content">

                    <div id="ordersummary" class="tab-pane fade in active show">
                        <h3>Current Balance: <b>{{money_c(Auth::user()->balance)}}</b></h3>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Date</th>
                                    <th>Service</th>
                                    <th>Company</th>
                                    <th>Package</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($table as $row)
                                    @php
                                        $package_json = json_decode($row->package, true);
                                    @endphp
                                    <tr>
                                        <td>{{$row->bookingID}}</td>
                                        <td>
                                            <p style="margin: 0px;">{{pub_date($row->created_at)}}</p>
                                            <small>{{$row->time_slot['name'] ?? ''}} ({{date('ha', strtotime($row->time_slot['fromTime']))}}-{{date('ha', strtotime($row->time_slot['toTime']))}})</small>
                                        </td>
                                        <td>{{$row->service['serviceType'] ?? ''}}</td>
                                        <td>{{$row->service['name'] ?? ''}}</td>
                                        <td><b class="m-0">{{$package_json['name'] ?? ''}}</b> <small class="text-grey-300">({{$package_json['item']}})</small></td>
                                        <td>
                                            <p style="margin: 0px;">{{ money_c($row->pricing * $row->qty) }}</p>
                                            <small>{{money_c($row->pricing)}} x {{$row->qty}}</small>
                                        </td>
                                        <td>

                                            {{$row->booking['status'] ?? ''}}
                                            @if($row->booking['status'] == 'Complete')
                                                @php
                                                    $review = $row->review();
                                                @endphp
                                                @if($review == null)
                                                    <a href="#login-modal" data-booking="{{$row->bookingID}}"  data-service="{{$row->serviceID}}" type="button" class="login-modal-btn">Review</a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div id="transactions" class="tab-pane fade">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Booking ID</th>
                                    <th>Payment Method</th>
                                    <th>Description</th>
                                    <th>IN</th>
                                    <th>OUT</th>
                                    <th>Balance</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $balance = 0;
                                @endphp
                                @foreach($payment as $row)
                                <tr>
                                    <td>{{pub_date($row->created_at)}}</td>
                                    <td>{{$row->refID}}</td>
                                    <td>{{$row->payMethod}}</td>
                                    @if($row->payType == 'IN')
                                        <td>Purchase Payment</td>
                                        @else
                                        <td>Payment Return</td>
                                    @endif

                                    <td>{{money_c($row->amountOUT)}}</td>
                                    <td>{{money_c($row->amountIN)}}</td>
                                    @php
                                        $balance += ($row->amountOUT - $row->amountIN);
                                    @endphp
                                    <td>{{money_c($balance)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div id="profile" class="tab-pane fade">
                        <table class="table table-bordered" style="width:500px;">
                            <tbody><tr>
                                <th>User Name</th>
                                <td>{{Auth::user()->name}}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{Auth::user()->email}}</td>
                            </tr>
                            <tr>
                                <th>Mobile Number</th>
                                <td>{{Auth::user()->contact}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

    </section>
    <!-- absolute-eventmake-section - end
    ================================================== -->

    @include('shared.frontend.review')

@endsection


@section('script')
    <script type="text/javascript">

        $('.login-modal-btn').click(function () {
            var serviceID = $(this).data('service');
            var bookingID = $(this).data('booking');

            $('#reviewForm [name=serviceID]').val(serviceID);
            $('#reviewForm [name=bookingID]').val(bookingID);

        });

    </script>
@endsection