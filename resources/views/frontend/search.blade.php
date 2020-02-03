@extends('layouts.frontend')

@section('title')
    Search Result
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
                                <span class="sub-title">Search Result</span>
                                <h2 class="big-title">Search <strong>{{$searchType}}</strong></h2>
                            </div>
                            <!-- breadcrumb-title - end -->

                            <!-- breadcrumb-list - start -->
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-item"><a href="{{route('front.home')}}" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{$searchType}} listing</li>
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




    <!-- event-search-section - start
    ================================================== -->
    <section id="event-search-section" class="event-search-section clearfix" style="background-image: url({{asset('public/frontend/assets/images/special-offer-bg.png')}});">
        <div class="container">
            <div class="row">

                <!-- section-title - start -->
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="section-title">
                        <small class="sub-title">Find best Venue on Harmoni</small>
                        <h2 class="big-title">Venue <strong>Search</strong></h2>
                    </div>
                </div>
                <!-- section-title - end -->

            </div>
        </div>
    </section>
    <!-- event-search-section - end
    ================================================== -->

    <section class="event-search-tab">
        @include('shared.frontend.event-tab')

    </section>

    <!-- event-section - start
    ================================================== -->
    <section id="event-section" class="event-section bg-gray-light sec-ptb-100 clearfix">
        <div class="container">
            <div class="row justify-content-center">

                <!-- - start -->
                <div class="col-lg-12 col-md-12 col-sm-12">

                    <div class="search-result-form">
                        <form action="#!">
                            <ul>

                                <li>
                                    <span class="result-text">{{$table->count()}} Search results from {{$total_event}} services</span>
                                </li>
                            </ul>
                        </form>
                    </div>

                    <div class="tab-content">
                        <div id="list-style" class="tab-pane fade in active show">

                            @foreach($table as $row)

                                @php

                                    $photos = json_decode($row->photos, true);

                                    $facility_json = json_decode($row->facility, true);

                                    $additional = json_decode($row->additional, true);

                                    $pricings = json_decode($row->pricing, true);

                                    $prices = [];
                                    foreach ($pricings as $pricing){
                                        $prices[] = $pricing['price'];
                                    }
                                    $pricingx = Arr::sort($prices);

                                @endphp

                            <!-- event-item - start -->
                            <div class="event-list-item clearfix">

                                <!-- event-image - start -->
                                <div class="event-image">
                                    <img src="{{asset('public/gallery/'.$photos[0]['photo'])}}" alt="{{$photos[0]['name'] ?? 'Image Not Found'}}">
                                </div>
                                <!-- event-image - end -->

                                <!-- event-content - start -->
                                <div class="event-content">
                                    <div class="event-title mb-15">
                                        <h3 class="title">
                                            <a href="{{route('front.single', ['id' => $row->id])}}?{{build_http_query(request()->query())}}">{{$row->name}}</a>
                                        </h3>

                                    </div>
                                    <div class="event-info-list ul-li clearfix">
                                        <ul>

                                            @php
                                                $comment = $row->review()->count();
                                            @endphp

                                            <li>
                                                <span class="icon">
                                                    <i class="fas fa-map-marker-alt"></i>
                                                </span>
                                                <div class="info-content">
                                                    <h3>Near {{$row->landmark}}, {{$row->address}}</h3>
                                                </div>
                                            </li>
                                            <li>
                                                <span class="icon">
                                                    <i class="fas fa-chart-line"></i>
                                                </span>
                                                <div class="info-content">
                                                    <h3>Rating: {{$row->rating}}/5 ({{$comment}})</h3>
                                                </div>
                                            </li>
                                            @if($searchType == 'Venue' || $searchType == 'Food & Catering' || $searchType == 'Event Planer' )
                                            <li>
                                                <span class="icon">
                                                    <i class="fas fa-users"></i>
                                                </span>
                                                <div class="info-content">
                                                    <h3>{{$row->minGuest}} - {{$row->maxGuest}}</h3>
                                                </div>

                                            </li>
                                            @endif
                                            <li>
                                                <span class="icon">
                                                    <i class="fas fa-dollar-sign"></i>
                                                </span>
                                                <div class="info-content">
                                                    <p>{{money_c($pricingx[0]) ?? 0.00}}</p>
                                                </div>
                                            </li>
                                        </ul>
                                        <p>
                                            {{$additional['description'] ?? ''}}
                                        </p>
                                        @if(count($facility_json) > 0)
                                        <div class="event-icon">

                                            <ul>
                                                @foreach ($facility_json as $rows)
                                                    @php
                                                        $facilitys = $row->get_facility($rows);

                                                    @endphp
                                                    <li><img src="{{asset('public/facility/'.$facilitys['icon'])}}" style="width: 48px;" alt=""><span>{{$facilitys['name'] ?? ''}}</span> </li>
                                                @endforeach

                                            </ul>
                                        </div>
                                        @endif
                                        <ul>
                                            <li>
                                                <a href="#addcart-modal" data-id="{{$row->id}}"
                                                   data-searchtype="{{$searchType ?? ''}}"
                                                   data-servicetype="{{$serviceType ?? ''}}"
                                                   data-bookingdate="{{$bookingDate ?? ''}}"
                                                   data-timeslotid="{{$timeSlotID ?? ''}}"
                                                   data-partytype="{{$partyType ?? ''}}"
                                                   data-guestnumber="{{$guestNumber ?? ''}}"
                                                   data-cardnumber="{{$cardNumber ?? ''}}"
                                                   class="tickets-details-btn lightBoxCart">
                                                    <i class="fas fa-shopping-cart"></i> add to my cart
                                                </a>

                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- event-content - end -->

                            </div>
                            <!-- event-item - end -->

                            @endforeach

                            <!-- Pagination -->
                                {!! $table->appends(request()->query())->render() !!}
                            <!-- /Pagination -->
                        </div>

                    </div>

                </div>
                <!-- - end -->

            </div>
        </div>
    </section>
    <!-- event-section - end
    ================================================== -->
    @include('shared.frontend.add-cart')
@endsection


@section('style')
    <link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/gijgo.min.css')}}">
@endsection

@section('script')
    <script src="{{asset('public/frontend/assets/js/gijgo.min.js')}}"></script>

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
        
        
        

        $(function () {
            $('#datepic1').datepicker({
                format: 'dd/mm/yyyy',
                minDate: new Date(),
                icons: { rightIcon: null }
            });

            $('#datepic2').datepicker({
                format: 'dd/mm/yyyy',
                minDate: new Date(),
                icons: { rightIcon: null }
            });

            $('#datepic3').datepicker({
                format: 'dd/mm/yyyy',
                minDate: new Date(),
                icons: { rightIcon: null }
            });

            $('#datepic4').datepicker({
                format: 'dd/mm/yyyy',
                minDate: new Date(),
                icons: { rightIcon: null }
            });

            $('#datepic5').datepicker({
                format: 'dd/mm/yyyy',
                minDate: new Date(),
                icons: { rightIcon: null }
            });

            $('#datepic6').datepicker({
                format: 'dd/mm/yyyy',
                minDate: new Date(),
                icons: { rightIcon: null }
            });

            $('#datepic7').datepicker({
                format: 'dd/mm/yyyy',
                minDate: new Date(),
                icons: { rightIcon: null }
            });
        });

        
        $(function () {

            switch ("{{$searchType}}") {
                case "Food &amp; Catering":
                    $('#bBook').trigger('click');
                    $('#foodctaering [name=bookingDate]').val("{{$bookingDate}}");
                    $('#foodctaering [name=timeSlot]').val({{$timeSlotID}});
                    $('#foodctaering [name=partyType]').val({{$partyType}});
                    $('#foodctaering [name=guestNumber]').val({{$guestNumber}});
                    break;
                case "Photographer":
                    $('#cBook').trigger('click');
                    $('#photographer [name=bookingDate]').val("{{$bookingDate}}");
                    $('#photographer [name=timeSlot]').val({{$timeSlotID}});
                    $('#photographer [name=partyType]').val({{$partyType}});
                    break;
                case "Makeup Artist":
                    $('#dBook').trigger('click');
                    $('#makeupartist [name=bookingDate]').val("{{$bookingDate}}");
                    $('#makeupartist [name=timeSlot]').val({{$timeSlotID}});
                    $('#makeupartist [name=partyType]').val({{$partyType}});
                    break;
                case "Henna Artist":
                    $('#eBook').trigger('click');
                    $('#hennaartist [name=bookingDate]').val("{{$bookingDate}}");
                    $('#hennaartist [name=timeSlot]').val({{$timeSlotID}});
                    $('#hennaartist [name=partyType]').val({{$partyType}});
                    break;
                case "Event Planer":
                    $('#fBook').trigger('click');
                    $('#eventplanner [name=bookingDate]').val("{{$bookingDate}}");
                    $('#eventplanner [name=timeSlot]').val({{$timeSlotID}});
                    $('#eventplanner [name=partyType]').val({{$partyType}});
                    $('#eventplanner [name=guestNumber]').val({{$guestNumber}});
                    break;
                case "Invitation Card":
                    $('#gBook').trigger('click');
                    $('#invitationcard [name=partyType]').val({{$partyType}});
                    $('#invitationcard [name=cardNumber]').val({{$cardNumber}});
                    break;
                case "Venue":
                    $('#aBook').trigger('click');
                    $('#venuebooking [name=bookingDate]').val("{{$bookingDate}}");
                    $('#venuebooking [name=timeSlot]').val({{$timeSlotID}});
                    $('#venuebooking [name=partyType]').val({{$partyType}});
                    $('#venuebooking [name=guestNumber]').val({{$guestNumber}});
            }
        });


    </script>
@endsection