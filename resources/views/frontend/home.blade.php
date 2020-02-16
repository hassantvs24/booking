@extends('layouts.frontend')

@section('title')
    Home
@endsection

@section('content')

    <!-- slide-section - start
		================================================== -->
    <section id="main-carousel2" class="main-carousel2 clearfix">

        <div class="item" style="background-image: url({{asset('public/frontend/assets/images/slider/slide-2.jpg')}});">
            <div class="overlay-black">
                <div class="container">
                    <div class="row">

                        <!-- slider-content - start -->
                        <div class="col-lg-8">
                            <div class="slider-content">
                                <h1 class="title-text">
                                    we are
                                </h1>
                                <strong class="bold-text">Event Planner</strong>
                                <a href="#!" class="custom-btn">Exclusive Venues</a>
                            </div>
                        </div>
                        <!-- slider-content - end -->

                    </div>
                </div>
            </div>
        </div>

        <div class="item" style="background-image: url({{asset('public/frontend/assets/images/slider/slide-3.jpg')}});">
            <div class="overlay-black">
                <div class="container">
                    <div class="row">
                        <!-- slider-content - start -->
                        <div class="col-lg-8">
                            <div class="slider-content">
                                <h1 class="title-text">
                                    we are
                                </h1>
                                <strong class="bold-text">Event Organizer</strong>
                                <a href="#!" class="custom-btn">Exclusive Venues</a>
                            </div>
                        </div>
                        <!-- slider-content - end -->
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- slide-section - end
    ================================================== -->


    <!-- absolute-eventmake-section - start
    ================================================== -->

    @include('shared.frontend.event-tab')

    <!-- absolute-eventmake-section - end
    ================================================== -->


    <!-- about-section2 - start
    ================================================== -->
    <section id="about-section2" class="about-section2 sec-ptb-100 bg-gray-light clearfix">
        <div class="container">

            <div class="mb-50">
                <div class="row">

                    <!-- section-pragraph - start -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="section-pragraph text-right">
                            <p>
                                Lorem ipsum dollor site amet the consectuer adipiscing elites sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat insignia the consectuer adipiscing elit.
                            </p>
                        </div>
                    </div>
                    <!-- section-pragraph - end -->

                    <!-- section-title - start -->
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="section-title text-left">
                            <span class="line-style"></span>
                            <small class="sub-title">we are harmoni</small>
                            <h2 class="big-title"><strong>No.1</strong> Events Management</h2>
                        </div>
                    </div>
                    <!-- section-title - end -->

                </div>
            </div>

            <div class="services-list">
                <ul>

                    <li>
                        <a href="#!">
								<span class="icon">
									<i class="flaticon-handshake"></i>
								</span>
                            <strong class="title-text">friendly team</strong>
                            <small class="sub-title">more than 200 teams</small>
                        </a>
                    </li>
                    <li>
                        <a href="#!">
								<span class="icon">
									<i class="flaticon-two-balloons"></i>
								</span>
                            <strong class="title-text">perfect venues</strong>
                            <small class="sub-title">the best & perfect venues</small>
                        </a>
                    </li>
                    <li>
                        <a href="#!">
								<span class="icon">
									<i class="flaticon-cheers"></i>
								</span>
                            <strong class="title-text">Unique Scenario</strong>
                            <small class="sub-title">We thinking out of the box</small>
                        </a>
                    </li>

                    <li>
                        <a href="#!">
								<span class="icon">
									<i class="flaticon-clown-hat"></i>
								</span>
                            <strong class="title-text">Unforgettable Time</strong>
                            <small class="sub-title">We make you perfect event</small>
                        </a>
                    </li>
                    <li>
                        <a href="#!">
								<span class="icon">
									<i class="flaticon-speech-bubble"></i>
								</span>
                            <strong class="title-text">24/7 Hours Support</strong>
                            <small class="sub-title">anytime anywhere</small>
                        </a>
                    </li>
                    <li>
                        <a href="#!">
								<span class="icon">
									<i class="flaticon-light-bulb"></i>
								</span>
                            <strong class="title-text">New & Briliant Idea</strong>
                            <small class="sub-title">we have million ideas</small>
                        </a>
                    </li>

                </ul>
            </div>

        </div>
    </section>
    <!-- about-section2 - end
    ================================================== -->








    <!-- event-expertise-section - start
    ================================================== -->
    <section id="event-expertise-section" class="event-expertise-section bg-gray-light sec-ptb-100 clearfix">
        <div class="container">

            <!-- section-title - start -->
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="section-title mb-50">
                        <small class="sub-title">5+ Cities Accros in Bangladesh</small>
                        <h2 class="big-title">Cities We Are  <strong>Present In</strong></h2>
                    </div>
                </div>
            </div>
            <!-- section-title - end -->

            <!-- event-expertise-carousel - start -->
            <div id="event-expertise-carousel" class="event-expertise-carousel owl-carousel owl-theme">

                <!-- expertise-item - start -->
                <div class="item">
                    <div class="expertise-item">
                        <div class="image image-wrapper">
                            <img src="{{asset('public/frontend/assets/images/experties/img1.jpg')}}" alt="Image_not_found">
                            <a href="#!" class="plus-effect"></a>
                        </div>
                    </div>
                </div>
                <!-- expertise-item - end -->

            </div>
            <!-- event-expertise-carousel - end -->

        </div>
    </section>
    <!-- event-expertise-section - end
    ================================================== -->



    <!-- conference-section - start
    ================================================== -->
    <section id="conference-section" class="conference-section clearfix">
        <div class="jarallax" style="background-image: url({{asset('public/frontend/assets/images/conference/pexels-photo-262669.jpg')}});">
            <div class="overlay-black sec-ptb-100">

                <div class="mb-50">
                    <div class="container">
                        <div class="row">

                            <!-- section-title - start -->
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="section-title text-left">
                                    <span class="line-style"></span>
                                    <small class="sub-title">harmoni venues</small>
                                    <h2 class="big-title">Conference <strong>Rooms & Hotels</strong></h2>
                                </div>
                            </div>
                            <!-- section-title - end -->

                            <!-- conference-location - start -->
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="conference-location ul-li clearfix">
                                    <ul>

                                        <!-- country-select - start -->
                                        <li class="country-select">
                                            <form action="#!">
                                                <label for="country">Country :</label>
                                                <select class="custom-select" id="country">
                                                    <option selected>Netherland</option>
                                                    <option value="1">USA</option>
                                                    <option value="2">england</option>
                                                    <option value="3">germany</option>
                                                </select>
                                            </form>
                                        </li>
                                        <!-- country-select - end -->

                                        <!-- city-select - start -->
                                        <li class="city-select">
                                            <form action="#!">
                                                <label for="city">city :</label>
                                                <select class="custom-select" id="city">
                                                    <option selected>Amsterdam</option>
                                                    <option value="1">washington</option>
                                                    <option value="2">london</option>
                                                    <option value="3">berlin</option>
                                                </select>
                                            </form>
                                        </li>
                                        <!-- city-select - end -->

                                    </ul>
                                </div>
                            </div>
                            <!-- conference-location - end -->

                        </div>
                    </div>
                </div>

                <!-- conference-content-wrapper - start -->
                <div class="tab-wrapper">

                    <!-- tab-menu - start -->
                    <div class="container">
                        <div class="row justify-content-lg-start">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <div class="tab-menu">
                                    <ul class="nav tab-nav mb-50">

                                        <li class="nav-item">
                                            <a class="nav-link active" id="nav-one-tab" data-toggle="tab" href="#nav-one" aria-expanded="true">
													<span class="image">
														<img src="{{asset('public/frontend/assets/images/conference/RCJAKPP_00016_coddddnversion.jpg')}}" alt="Image_not_found">
													</span>
                                                <span class="title">
														<strong class="yellow-color">5 <i class="fas fa-star"></i> Chocolato </strong>
														Hotel
													</span>
                                                <small class="sub-title">Party Room 2.500 seats</small>
                                                <small class="price yellow-color">Price from $52/night</small>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="nav-two-tab" data-toggle="tab" href="#nav-two" aria-expanded="false">
													<span class="image">
														<img src="{{asset('public/frontend/assets/images/conference/fresh-conference-room-microphones-decoration-ideas-collection-gallery-to-conference-room-microphones-home-ideas.jpg')}}" alt="Image_not_found">
													</span>
                                                <span class="title">
														<strong class="yellow-color">4 <i class="fas fa-star"></i> Vanila </strong>
														Hotel
													</span>
                                                <small class="sub-title">Party Room 2.500 seats</small>
                                                <small class="price yellow-color">Price from $52/night</small>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="nav-three-tab" data-toggle="tab" href="#nav-three" aria-expanded="false">
													<span class="image">
														<img src="{{asset('public/frontend/assets/images/conference/RCTORON_00047ss.jpg')}}" alt="Image_not_found">
													</span>
                                                <span class="title">
														<strong class="yellow-color">3 <i class="fas fa-star"></i> Pear </strong>
														Hotel
													</span>
                                                <small class="sub-title">Party Room 2.500 seats</small>
                                                <small class="price yellow-color">Price from $52/night</small>
                                            </a>
                                        </li>

                                        <li class="nav-item">
                                            <a class="nav-link" id="nav-four-tab" data-toggle="tab" href="#nav-four" aria-expanded="false">
													<span class="image">
														<img src="{{asset('public/frontend/assets/images/conference/clayton-hotel-leopardstown-meeting-room-1.jpg')}}" alt="Image_not_found">
													</span>
                                                <span class="title">
														<strong class="yellow-color">5 <i class="fas fa-star"></i> Chocolato </strong>
														Hotel
													</span>
                                                <small class="sub-title">Party Room 2.500 seats</small>
                                                <small class="price yellow-color">Price from $52/night</small>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="nav-five-tab" data-toggle="tab" href="#nav-five" aria-expanded="false">
													<span class="image">
														<img src="{{asset('public/frontend/assets/images/conference/conference-room-with-projection-facilities-3d-model-max.jpg')}}" alt="Image_not_found">
													</span>
                                                <span class="title">
														<strong class="yellow-color">4 <i class="fas fa-star"></i> Vanila </strong>
														Hotel
													</span>
                                                <small class="sub-title">Party Room 2.500 seats</small>
                                                <small class="price yellow-color">Price from $52/night</small>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="nav-six-tab" data-toggle="tab" href="#nav-six" aria-expanded="false">
													<span class="image">
														<img src="{{asset('public/frontend/assets/images/conference/midlands-park-hotel-meeting-rooms.jpg')}}" alt="Image_not_found">
													</span>
                                                <span class="title">
														<strong class="yellow-color">3 <i class="fas fa-star"></i> pear </strong>
														Hotel
													</span>
                                                <small class="sub-title">Party Room 2.500 seats</small>
                                                <small class="price yellow-color">Price from $52/night</small>
                                            </a>
                                        </li>

                                    </ul>
                                    <div class="more-btn">
                                        <a href="#!">
                                            <strong class="yellow-color">VIEW ALL</strong> HOTEL & RESORT
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- tab-menu - end -->

                    <!-- tab-content - start -->
                    <div class="tab-content">
                        <!-- tab-pane - start -->
                        <div class="tab-pane fade active show" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab" aria-expanded="true">
                            <div class="image">
                                <img src="{{asset('public/frontend/assets/images/conference/RCJAKPP_00016_coddddnversion.jpg')}}" alt="Image_not_found">
                                <a href="#!" class="custom-btn">
                                    booking now
                                </a>
                                <div class="badge-item">
                                    <div class="content">
                                        <i class="fas fa-star"></i>
                                        <strong>5.0</strong>
                                        <small>featured hotel</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab-pane - end -->

                        <!-- tab-pane - start -->
                        <div class="tab-pane fade" id="nav-two" role="tabpanel" aria-labelledby="nav-two-tab" aria-expanded="false">
                            <div class="image">
                                <img src="{{asset('public/frontend/assets/images/conference/fresh-conference-room-microphones-decoration-ideas-collection-gallery-to-conference-room-microphones-home-ideas.jpg')}}" alt="Image_not_found">
                                <a href="#!" class="custom-btn">
                                    booking now
                                </a>
                                <div class="badge-item">
                                    <div class="content">
                                        <i class="fas fa-star"></i>
                                        <strong>5.0</strong>
                                        <small>featured hotel</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab-pane - end -->

                        <!-- tab-pane - start -->
                        <div class="tab-pane fade" id="nav-three" role="tabpanel" aria-labelledby="nav-three-tab" aria-expanded="false">
                            <div class="image">
                                <img src="{{asset('public/frontend/assets/images/conference/RCTORON_00047ss.jpg')}}" alt="Image_not_found">
                                <a href="#!" class="custom-btn">
                                    booking now
                                </a>
                                <div class="badge-item">
                                    <div class="content">
                                        <i class="fas fa-star"></i>
                                        <strong>5.0</strong>
                                        <small>featured hotel</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab-pane - end -->

                        <!-- tab-pane - start -->
                        <div class="tab-pane fade" id="nav-four" role="tabpanel" aria-labelledby="nav-four-tab" aria-expanded="false">
                            <div class="image">
                                <img src="{{asset('public/frontend/assets/images/conference/clayton-hotel-leopardstown-meeting-room-1.jpg')}}" alt="Image_not_found">
                                <a href="#!" class="custom-btn">
                                    booking now
                                </a>
                                <div class="badge-item">
                                    <div class="content">
                                        <i class="fas fa-star"></i>
                                        <strong>5.0</strong>
                                        <small>featured hotel</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab-pane - end -->

                        <!-- tab-pane - start -->
                        <div class="tab-pane fade" id="nav-five" role="tabpanel" aria-labelledby="nav-five-tab" aria-expanded="false">
                            <div class="image">
                                <img src="{{asset('public/frontend/assets/images/conference/conference-room-with-projection-facilities-3d-model-max.jpg')}}" alt="Image_not_found">
                                <a href="#!" class="custom-btn">
                                    booking now
                                </a>
                                <div class="badge-item">
                                    <div class="content">
                                        <i class="fas fa-star"></i>
                                        <strong>5.0</strong>
                                        <small>featured hotel</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab-pane - end -->

                        <!-- tab-pane - start -->
                        <div class="tab-pane fade" id="nav-six" role="tabpanel" aria-labelledby="nav-six-tab" aria-expanded="false">
                            <div class="image">
                                <img src="{{asset('public/frontend/assets/images/conference/midlands-park-hotel-meeting-rooms.jpg')}}" alt="Image_not_found">
                                <a href="#!" class="custom-btn">
                                    booking now
                                </a>
                                <div class="badge-item">
                                    <div class="content">
                                        <i class="fas fa-star"></i>
                                        <strong>5.0</strong>
                                        <small>featured hotel</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tab-pane - end -->

                    </div>
                    <!-- tab-content - end -->

                </div>
                <!-- conference-content-wrapper - end -->

            </div>
        </div>
    </section>
    <!-- conference-section - end
    ================================================== -->












    <!-- event-gallery-section - start
    ================================================== -->
    <section id="event-gallery-section" class="event-gallery-section sec-ptb-100 clearfix">
        <div class="container">

            <!-- section-title - start -->
            <div class="section-title text-center mb-80">
                <small class="sub-title">harmoni gallery</small>
                <h2 class="big-title">Beautiful & <strong>Unforgettable Times</strong></h2>
            </div>
            <!-- section-title - end -->

            <div class="button-group filters-button-group mb-30">
                <button class="button is-checked" data-filter="*">
                    <i class="fas fa-star"></i>
                    <strong>all</strong> gallery
                </button>
                <button class="button" data-filter=".video-gallery">
                    <i class="fas fa-play-circle"></i>
                    <strong>video</strong> gallery
                </button>
                <button class="button" data-filter=".photo-gallery">
                    <i class="far fa-image"></i>
                    <strong>photo</strong> gallery
                </button>
            </div>

            <div class="grid zoom-gallery clearfix mb-80" data-isotope="{ &quot;masonry&quot;: { &quot;columnWidth&quot;: 0 } }">
                <div class="grid-item grid-item--height2 photo-gallery " data-category="photo-gallery">
                    <a class="popup-link" href="{{asset('public/frontend/assets/images/gallery/1.image.jpg')}}">
                        <img src="{{asset('public/frontend/assets/images/gallery/1.image.jpg')}}" alt="Image_not_found">
                    </a>
                    <div class="item-content">
                        <h3>John Doe Wedding day</h3>
                        <span>Wedding Party, 24 June 2016</span>
                    </div>
                </div>
                <div class="grid-item grid-item--width2 video-gallery " data-category="video-gallery">
                    <a class="popup-youtube" href="https://youtu.be/-haiaZ011OM">
                        <img src="{{asset('public/frontend/assets/images/gallery/2.image.jpg')}}" alt="Image_not_found">
                    </a>
                    <div class="item-content">
                        <h3>Business Conference in Dubai</h3>
                        <span>Food Festival, 24 June 2016</span>
                    </div>
                </div>
                <div class="grid-item photo-gallery " data-category="photo-gallery">
                    <a class="popup-link" href="{{asset('public/frontend/assets/images/gallery/3.image.jpg')}}">
                        <img src="{{asset('public/frontend/assets/images/gallery/3.image.jpg')}}" alt="Image_not_found">
                    </a>
                    <div class="item-content">
                        <h3>Envato Author Fun Hiking</h3>
                        <span>Food Festival, 24 June 2016</span>
                    </div>
                </div>

                <div class="grid-item photo-gallery " data-category="photo-gallery">
                    <a class="popup-link" href="{{asset('public/frontend/assets/images/gallery/4.image.jpg')}}">
                        <img src="{{asset('public/frontend/assets/images/gallery/4.image.jpg')}}" alt="Image_not_found">
                    </a>
                    <div class="item-content">
                        <h3>John Doe Wedding day</h3>
                        <span>Wedding Party, 24 June 2016</span>
                    </div>
                </div>
                <div class="grid-item grid-item--width2 video-gallery " data-category="video-gallery">
                    <a class="popup-youtube" href="https://youtu.be/-haiaZ011OM">
                        <img src="{{asset('public/frontend/assets/images/gallery/5.image.jpg')}}" alt="Image_not_found">
                    </a>
                    <div class="item-content">
                        <h3>New Year Celebration</h3>
                        <span>Food Festival, 24 June 2016</span>
                    </div>
                </div>

                <div class="grid-item grid-item--width2 photo-gallery " data-category="photo-gallery">
                    <a class="popup-link" href="{{asset('public/frontend/assets/images/gallery/6.image.jpg')}}">
                        <img src="{{asset('public/frontend/assets/images/gallery/6.image.jpg')}}" alt="Image_not_found">
                    </a>
                    <div class="item-content">
                        <h3>John Doe Wedding day</h3>
                        <span>Wedding Party, 24 June 2016</span>
                    </div>
                </div>
                <div class="grid-item video-gallery " data-category="video-gallery">
                    <a class="popup-youtube" href="https://youtu.be/-haiaZ011OM">
                        <img src="{{asset('public/frontend/assets/images/gallery/7.image.jpg')}}" alt="Image_not_found">
                    </a>
                    <div class="item-content">
                        <h3>New Year Celebration</h3>
                        <span>Food Festival, 24 June 2016</span>
                    </div>
                </div>
                <div class="grid-item photo-gallery " data-category="photo-gallery">
                    <a class="popup-link" href="{{asset('public/frontend/assets/images/gallery/8.image.jpg')}}">
                        <img src="{{asset('public/frontend/assets/images/gallery/8.image.jpg')}}" alt="Image_not_found">
                    </a>
                    <div class="item-content">
                        <h3>Envato Author Fun Hiking</h3>
                        <span>Food Festival, 24 June 2016</span>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a href="{{route('front.gallery')}}" class="custom-btn">view all gallery</a>
            </div>

        </div>
    </section>
    <!-- event-gallery-section - end
    ================================================== -->

    <section id="news-update-section" class="news-update-section sec-ptb-100 clearfix">
        <div class="container">
            <div class="row">

                <!-- faq-accordion - start -->
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <!-- section-title - start -->
                    <div class="section-title mb-30">
                        <span class="line-style"></span>
                        <small class="sub-title">find your answer</small>
                        <h2 class="big-title">ask &amp; <strong>questions</strong></h2>
                    </div>
                    <!-- section-title - end -->
                    <div id="faq-accordion" class="faq-accordion">

                        <div class="card">
                            <div class="card-header" id="headingone">
                                <button class="btn collapsed" data-toggle="collapse" data-target="#collapseone" aria-expanded="true" aria-controls="collapseone">
                                    <span>01.</span> How to join Harmoni Event Management?
                                </button>
                            </div>

                            <div id="collapseone" class="collapse" aria-labelledby="headingone" data-parent="#faq-accordion">
                                <div class="card-body">
                                    <h3>answer</h3>
                                    Bring people together, or turn your passion into a business. Harmoni gives you everything you need to host your best event yet. lorem ipsum diamet.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingtwo">
                                <button class="btn" data-toggle="collapse" data-target="#collapsetwo" aria-expanded="false" aria-controls="collapsetwo">
                                    <span>02.</span> How to make my own event?
                                </button>
                            </div>
                            <div id="collapsetwo" class="collapse show" aria-labelledby="headingtwo" data-parent="#faq-accordion">
                                <div class="card-body">
                                    <h3>answer</h3>
                                    Bring people together, or turn your passion into a business. Harmoni gives you everything you need to host your best event yet. lorem ipsum diamet.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingthree">
                                <button class="btn collapsed" data-toggle="collapse" data-target="#collapsethree" aria-expanded="false" aria-controls="collapsethree">
                                    <span>03.</span> About the price to make new event?
                                </button>
                            </div>
                            <div id="collapsethree" class="collapse" aria-labelledby="headingthree" data-parent="#faq-accordion">
                                <div class="card-body">
                                    <h3>answer</h3>
                                    Bring people together, or turn your passion into a business. Harmoni gives you everything you need to host your best event yet. lorem ipsum diamet.
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header" id="headingfour">
                                <button class="btn collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                    <span>04.</span> About the price to make new event?
                                </button>
                            </div>
                            <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#faq-accordion">
                                <div class="card-body">
                                    <h3>answer</h3>
                                    Bring people together, or turn your passion into a business. Harmoni gives you everything you need to host your best event yet. lorem ipsum diamet.
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- faq-accordion - end -->

                <!-- latest-blog-wrapper - start -->
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="latest-blog-wrapper">

                        <!-- section-title - start -->
                        <div class="section-title mb-30">
                            <span class="line-style"></span>
                            <small class="sub-title">upcoming events</small>
                            <h2 class="big-title">latest <strong>news</strong></h2>
                        </div>
                        <!-- section-title - end -->

                        <!-- latest-blog - start -->
                        <div class="latest-blog clearfix">
                            <div class="blog-image">
                                <img src="{{asset('public/frontend/assets/images/blog/1.latest-blog.jpg')}}" alt="Image_not_found">
                                <a href="#!" class="plus-effect"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-title mb-30">
                                    <h3>Barcelona Friday Food Truck Festival 26 Mei 2019</h3>
                                    <span>26 June 2018</span>
                                </div>
                                <p class="m-0">
                                    Harmoni gives you everything you need to host your best event yet. lorem ipsum diamet.
                                </p>
                            </div>
                        </div>
                        <!-- latest-blog - end -->

                        <!-- latest-blog - start -->
                        <div class="latest-blog clearfix">
                            <div class="blog-image">
                                <img src="{{asset('public/frontend/assets/images/blog/1.latest-blog.jpg')}}" alt="Image_not_found">
                                <a href="#!" class="plus-effect"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-title mb-30">
                                    <h3>Barcelona Friday Food Truck Festival 26 Mei 2019</h3>
                                    <span>26 June 2018</span>
                                </div>
                                <p class="m-0">
                                    Harmoni gives you everything you need to host your best event yet. lorem ipsum diamet.
                                </p>
                            </div>
                        </div>
                        <!-- latest-blog - end -->

                    </div>
                </div>
                <!-- latest-blog-wrapper - end -->

            </div>
        </div>
    </section>


    <!-- testimonial5-section - start
        ================================================== -->
    <section id="testimonial5-section" class="testimonial5-section clearfix">
        <div class="jarallax" style="background-image: url({{asset('public/frontend/assets/images/testimonial-bg.jpg')}});">
            <div class="overlay-black sec-ptb-100">
                <div class="container">

                    <!-- testimonial5-carousel - start -->
                    <div id="testimonial5-carousel" class="testimonial5-carousel owl-carousel owl-theme">

                        <div class="item text-center">
								<span class="quote-icon">
									<i class="fas fa-quote-right"></i>
								</span>
                            <p class="clients-comment">
                                “Bring people together, or turn your passion into a business. Harmoni gives you everything you need to host your best event yet. lorem ipsum diamet. Bring people together, or turn your passion into a business. Harmoni gives you everything you need to host your best event yet.”
                            </p>
                            <div class="client-info">
                                <h3 class="client-name">Jenni Hernandes</h3>
                                <span class="client-sub-title">Graphic Designer</span>
                            </div>
                        </div>

                        <div class="item text-center">
								<span class="quote-icon">
									<i class="fas fa-quote-right"></i>
								</span>
                            <p class="clients-comment">
                                “Bring people together, or turn your passion into a business. Harmoni gives you everything you need to host your best event yet. lorem ipsum diamet. Bring people together, or turn your passion into a business. Harmoni gives you everything you need to host your best event yet.”
                            </p>
                            <div class="client-info">
                                <h3 class="client-name">Jenni Hernandes</h3>
                                <span class="client-sub-title">Graphic Designer</span>
                            </div>
                        </div>

                        <div class="item text-center">
								<span class="quote-icon">
									<i class="fas fa-quote-right"></i>
								</span>
                            <p class="clients-comment">
                                “Bring people together, or turn your passion into a business. Harmoni gives you everything you need to host your best event yet. lorem ipsum diamet. Bring people together, or turn your passion into a business. Harmoni gives you everything you need to host your best event yet.”
                            </p>
                            <div class="client-info">
                                <h3 class="client-name">Jenni Hernandes</h3>
                                <span class="client-sub-title">Graphic Designer</span>
                            </div>
                        </div>

                        <div class="item text-center">
								<span class="quote-icon">
									<i class="fas fa-quote-right"></i>
								</span>
                            <p class="clients-comment">
                                “Bring people together, or turn your passion into a business. Harmoni gives you everything you need to host your best event yet. lorem ipsum diamet. Bring people together, or turn your passion into a business. Harmoni gives you everything you need to host your best event yet.”
                            </p>
                            <div class="client-info">
                                <h3 class="client-name">Jenni Hernandes</h3>
                                <span class="client-sub-title">Graphic Designer</span>
                            </div>
                        </div>

                    </div>
                    <!-- testimonial5-carousel - end -->

                </div>
            </div>
        </div>
    </section>
    <!-- testimonial5-section - end
    ================================================== -->

    <!-- special-offer-section - start
        ================================================== -->
    <section id="special-offer-section" class="special-offer-section clearfix" style="background-image: url({{asset('public/frontend/assets/images/special-offer-bg.png')}});">
        <div class="container">
            <div class="row">

                <!-- special-offer-content - start -->
                <div class="col-lg-9 col-md-12 col-sm-12">
                    <div class="special-offer-content">
                        <h2><strong>30%</strong> Off in June~July for <span>Birthday Events</span></h2>
                        <p class="m-0">
                            Contact us now and we will make your event unique & unforgettable
                        </p>
                    </div>
                </div>
                <!-- special-offer-content - end -->

                <!-- event-makeing-btn - start -->
                <div class="col-lg-3 col-md-12 col-sm-12">
                    <div class="event-makeing-btn">
                        <a href="#!">make an event now</a>
                    </div>
                </div>
                <!-- event-makeing-btn - end -->

            </div>
        </div>
    </section>
    <!-- special-offer-section - end
    ================================================== -->

@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('public/frontend/assets/css/gijgo.min.css')}}">
@endsection

@section('script')
    <script src="{{asset('public/frontend/assets/js/gijgo.min.js')}}"></script>

    <script type="text/javascript">

        $(function () {
            $(".locationSet option").hide();
            var city_select = $('.citySet').val();
            $(".locationSet option[data-city='"+city_select+"']").show();

            $('.citySet').change(function () {
                $(".locationSet").val('');
                $(".locationSet option").hide();
                var city_select = $(this).val();
                $(".locationSet option[data-city='"+city_select+"']").show();
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

    </script>
@endsection
