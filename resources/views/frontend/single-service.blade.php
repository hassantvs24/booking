@extends('layouts.frontend')

@section('title')
    Service
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
                                <span class="sub-title">service single</span>
                                <h2 class="big-title">harmoni <strong>service details</strong></h2>
                            </div>
                            <!-- breadcrumb-title - end -->

                            <!-- breadcrumb-list - start -->
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-item"><a href="{{route('front.home')}}" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$table->name}} Details</li>
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


    @php


        $social = json_decode($table->social, true);
        $pricing = json_decode($table->pricing, true);
        $photos = json_decode($table->photos, true);
        $facility = json_decode($table->facility, true);
        $rules = json_decode($table->rules, true);
        $contact = json_decode($table->contact, true);
        $additional = json_decode($table->additional, true);
        $faq_json = $additional['faq'];

    @endphp



    <!-- event-details-section - start
    ================================================== -->
    <section id="event-details-section" class="event-details-section sec-ptb-100 clearfix">
        <div class="container">
            <div class="row">

                <!-- col - event-details - start -->
                <div class="col-lg-8 col-md-12 col-sm-12">

                    <!-- event-details - start -->
                    <div class="event-details mb-80">

                        <div class="event-title mb-30">
                            <h2 class="event-title">{{$table->name}}</h2>
                        </div>

                        <div id="event-details-carousel" class="event-details-carousel owl-carousel owl-theme">
                            @foreach($photos as $i => $row)
                                @if($i != 0)
                            <div class="item">
                                <img src="{{asset('public/gallery/'.$row['photo'])}}" alt="Image_not_found">
                            </div>
                                @endif
                            @endforeach
                        </div>

                    </div>
                    <!-- event-details - end -->

                    <!-- event-schedule - start -->
                    <div class="event-schedule">

                        <!-- schedule-wrapper - start -->
                        <div class="schedule-wrapper">

                            <div class="tab-content">

                                <div id="day1" class="tab-pane fade in active show">
                                    {!! urldecode($table->description) ?? '' !!}
                                </div>

                            </div>
                        </div>
                        <!-- schedule-wrapper - end -->

                    </div>
                    <!-- event-schedule - end -->

                    <br><br>

                    <div class="reviewer-comment-wrapper mb-30 clearfix">
                        @php
                            $comment = $table->review()->orderBy('id', 'DESC')->get();
                        @endphp

                        <div class="section-title text-left mb-50">
                            <h2 class="big-title">Event <strong>reviews</strong></h2>
                            <small>Rating: <b>{{$table->rating}}/5</b> ({{$comment->count()}})</small>
                        </div>

                        @foreach($comment as $row)

                            <div class="comment-bar clearfix">
                                <div class="admin-image">
                                    <img src="{{asset('public/frontend/assets/images/user_img.png')}}" alt="Image_not_found">
                                </div>
                                <div class="comment-content">
                                    <div class="admin-name mb-15">
                                        <div class="rateing-star ul-li clearfix" title="{{$row->rating ?? 0}}">
                                            <ul>
                                                @for($i = 0; $i<floor($row->rating); $i++)
                                                    <li class="rated"><i class="fas fa-star"></i></li>
                                                @endfor
                                            </ul> &nbsp;|&nbsp;
                                            <small>{{pub_date($row->created_at)}}</small>
                                        </div>
                                        <div class="name">
                                            <a href="#!">{{$row->user['name'] ?? 'Unnamed'}}</a>
                                        </div>
                                    </div>
                                    <div class="comment-text">
                                        <p class="mb-30">
                                            {{$row->comment ?? ''}}
                                        </p>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>



                </div>
                <!-- col - event-details - end -->

                <!-- sidebar-section - start -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="sidebar-section">

                        <!-- map-wrapper - start -->
                        <div class="map-wrapper mb-30">

                            <!-- section-title - start -->
                            <div class="section-title mb-30">
                                <h2 class="big-title">Service <strong>location</strong></h2>
                            </div>
                            <!-- section-title - end -->

                            <div style="position: relative;">
                                <fieldset class="gllpLatlonPicker"  style="width: 100%;">
                                    <input type="hidden" name="lat" class="gllpLatitude" value="{{$table->lat ?? '23.78'}}"/>
                                    <input type="hidden" name="lon" class="gllpLongitude" value="{{$table->lon ?? '90.40'}}"/>
                                    <div class="gllpMap" style="width: 100%;">Google Maps</div>
                                    <input type="hidden" class="gllpLatLng"/>
                                    <input type="hidden" class="gllpZoom" value="15"/>
                                </fieldset>
                            </div>

                        </div>
                        <!-- map-wrapper - end -->

                        <!-- location-wrapper - start -->
                        <div class="location-wrapper mb-30">
                            <div class="title-wrapper">
                                <span class="icon">
										<i class="fas fa-map-marker-alt"></i>
									</span>
                                <div class="title-content">
                                    <small>{{$table->address}}</small>
                                </div>
                            </div>

                            @foreach($pricing as $row)
                            <div class="ul-li-block title-wrapper">
                                <div class="title-content">
                                    <h3>{{$row['name'] ?? ''}}</h3>
                                </div>
                                <ul>
                                    <li>{{$row['item'] ?? ''}}</li>
                                    <li class="text-warning"><b><i class="fas fa-dollar-sign"></i> {{money_c($row['price']) ?? '0.00'}}</b></li>
                                </ul>
                            </div>
                            @endforeach


                            <div class="button">
                                <a href="#addcart-modal" data-id="{{$table->id}}"
                                   data-searchtype="{{$searchType ?? ''}}"
                                   data-servicetype="{{$serviceType ?? ''}}"
                                   data-bookingdate="{{$bookingDate ?? ''}}"
                                   data-timeslotid="{{$timeSlotID ?? ''}}"
                                   data-partytype="{{$partyType ?? ''}}"
                                   data-guestnumber="{{$guestNumber ?? ''}}"
                                   data-cardnumber="{{$cardNumber ?? ''}}"
                                   class="custom-btn myy-btn lightBoxCart"><i class="fas fa-shopping-cart"></i> add to my cart</a>
                            </div>

                            <div class="location-info-list ul-li-block clearfix title-wrapper">
                                <div class="title-content">
                                    <h3>Facilities</h3>
                                </div>

                                <ul>
                                    @foreach($facility as $row)
                                    <li><i class="fas fa-arrow-circle-right"></i> {{$table->get_facility($row)['name'] ?? ''}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="location-info-list ul-li-block clearfix title-wrapper">
                                <div class="title-content">
                                    <h3>Rules</h3>
                                </div>
                                <ul>
                                    @foreach($rules as $row)
                                        <li><i class="fas fa-arrow-circle-right"></i> {{$table->get_rules($row) ?? ''}}</li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="contact-links ul-li-block clearfix">
                                <div class="title-content">
                                    <h3><i class="fas fa-phone"></i> Contact</h3>
                                </div>

                                <ul>
                                    @if($contact['mobile'] != '')
                                    <li>
                                        <a href="#!" target="_blank" title="mobile">
												<span class="icon">
													<i class="fas fa-mobile-alt"></i>
												</span>
                                            {{$contact['mobile'] ?? ''}}
                                        </a>
                                    </li>
                                    @endif
                                    @if($contact['phone'] != '')
                                    <li>
                                        <a href="#!" target="_blank" title="telephone">
												<span class="icon">
													<i class="fas fa-tty"></i>
												</span>
                                            {{$contact['phone'] ?? ''}}
                                        </a>
                                    </li>
                                    @endif
                                    @if($contact['whatsApp'] != '')
                                    <li>
                                        <a href="#!" target="_blank" title="whatsApp">
												<span class="icon">
													<i class="fas fa-phone-volume"></i>
												</span>
                                            {{$contact['whatsApp'] ?? ''}}
                                        </a>
                                    </li>
                                    @endif
                                    @if($contact['viber'] != '')
                                    <li>
                                        <a href="#!" target="_blank" title="viber">
												<span class="icon">
													<i class="fas fa-phone-volume"></i>
												</span>
                                            {{$contact['viber'] ?? ''}}
                                        </a>
                                    </li>
                                    @endif

                                </ul>

                                <ul>
                                    @if($table->email != '')
                                    <li>
                                        <a href="#!" target="_blank" title="email">
												<span class="icon">
													<i class="fas fa-at"></i>
												</span>
                                            {{$table->email ?? ''}}
                                        </a>
                                    </li>
                                    @endif
                                    @if($table->website != '')
                                        @php
                                            $result = parse_url($table->website)
                                        @endphp
                                    <li>
                                        <a href="{{$table->website ?? '#!'}}" target="_blank"  title="website">
												<span class="icon">
													<i class="fas fa-globe"></i>
												</span>
                                            {{$result['host']}}
                                        </a>
                                    </li>
                                    @endif

                                </ul>

                                <div class="title-content">
                                    <h3><i class="fas fa-share-alt"></i> Social Link</h3>
                                </div>
                                <ul>
                                    @foreach($social as $row)
                                        <li>
                                            <a href="{{$row['link'] ?? '#!'}}" target="_blank">
												<span class="icon">
													<i class="fas fa-link"></i>
												</span>
                                                {{$row['name'] ?? 'Unnamed'}}
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                        <!-- location-wrapper - end -->

                        <!-- faq-wrapper - start -->
                        <div class="faq-wrapper mb-30">

                            <!-- section-title - start -->
                            <div class="section-title mb-30">
                                <h2 class="big-title">Service <strong>FAQ</strong></h2>
                            </div>
                            <!-- section-title - end -->

                            <div id="faq-accordion" class="faq-accordion">

                                @foreach($faq_json as $k => $row)

                                <div class="card">
                                    <div class="card-header" id="heading{{$k}}">
                                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$k}}" aria-expanded="true" aria-controls="collapse{{$k}}">
                                            {{$row['question'] ?? ''}}
                                        </button>
                                    </div>

                                    <div id="collapse{{$k}}" class="collapse" aria-labelledby="heading{{$k}}" data-parent="#faq-accordion">
                                        <div class="card-body">
                                            {{$row['answer'] ?? ''}}
                                        </div>
                                    </div>
                                </div>

                                @endforeach

                            </div>

                        </div>
                        <!-- faq-wrapper - end -->


                    </div>
                </div>
                <!-- sidebar-section - end -->

            </div>
        </div>
    </section>
    <!-- event-details-section - end
    ================================================== -->
    @include('shared.frontend.add-cart')
@endsection

@section('style')
    <link href="{{asset('public/css/jquery-gmaps-latlon-picker.css')}}" rel="stylesheet" type="text/css">
@endsection
@section('script2')
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCJ7FU3y6klDKrt1w1tnmWf2rEdkRydW3A&sensor=false"></script>
    <script type="text/javascript" src="{{asset('public/js/jquery-gmaps-latlon-picker.js')}}"></script>
@endsection

@section('script')
    <script type="text/javascript">

        $(function () {
            $('.lightBoxCart').click(function () {
                var id = $(this).data('id');
                var searchType = $(this).data('searchtype');
                var serviceType = $(this).data('servicetype');
                var bookingDate = $(this).data('bookingdate');
                var timeSlotID = $(this).data('timeslotid');
                var partyType = $(this).data('partytype');
                var guestNumber = $(this).data('guestnumber');
                var cardNumber = $(this).data('cardnumber');

                $.get( "{{route('front.service-show-box')}}", {id : id, searchType : searchType, serviceType : serviceType, bookingDate : bookingDate, timeSlotID : timeSlotID, partyType : partyType, guestNumber : guestNumber, cardNumber : cardNumber}, function( data ) {
                    $('#show_form_box').html(data);
                });

            });
        });


    </script>
@endsection