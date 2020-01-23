@extends('layouts.frontend')

@section('title')
    Event
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
                                <span class="sub-title">harmoni events</span>
                                <h2 class="big-title">harmoni <strong>event</strong></h2>
                            </div>
                            <!-- breadcrumb-title - end -->

                            <!-- breadcrumb-list - start -->
                            <div class="breadcrumb-list">
                                <ul>
                                    <li class="breadcrumb-item"><a href="{{route('front.home')}}" class="breadcrumb-link">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">event listing</li>
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
                                    <span class="result-text">5 Search results from 20 events</span>
                                </li>
                                <li>
                                    <label for="year-select">Years:</label>
                                    <select id="year-select">
                                        <option selected="">2018</option>
                                        <option value="1">2019</option>
                                        <option value="2">2020</option>
                                        <option value="3">2021</option>
                                    </select>
                                </li>
                                <li>
                                    <label for="munth-select">Months:</label>
                                    <select id="munth-select">
                                        <option selected="">June</option>
                                        <option value="1">July</option>
                                        <option value="2">August</option>
                                    </select>
                                </li>

                            </ul>
                        </form>

                        <ul class="nav event-layout-btngroup">
                            <li><a class="active" data-toggle="tab" href="#list-style"><i class="fas fa-th-list"></i></a></li>
                            <li><a data-toggle="tab" href="#grid-style"><i class="fas fa-th"></i></a></li>
                        </ul>
                    </div>

                    <div class="tab-content">
                        <div id="list-style" class="tab-pane fade in active show">

                            <!-- event-item - start -->
                            <div class="event-list-item clearfix">

                                <!-- event-image - start -->
                                <div class="event-image">

                                    <img src="{{asset('public/frontend/assets/images/event/event-1.jpg')}}" alt="Image_not_found">
                                </div>
                                <!-- event-image - end -->

                                <!-- event-content - start -->
                                <div class="event-content">
                                    <div class="event-title mb-15">
                                        <h3 class="title">
                                            <a href="">Barcelona <strong>Food truck Festival 2018</strong></a>
                                        </h3>

                                    </div>
                                    <div class="event-info-list ul-li clearfix">
                                        <ul>
                                            <li>
													<span class="icon">
														<i class="fas fa-map-marker-alt"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>Near Canara Bank, Sikandra </h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
														<i class="fas fa-users"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>100 - 1000 </h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
														<i class="fas fa-home"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>Terrace</h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
														<i class="fas fa-beer"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>Liquor served</h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
													<i class="fas fa-ellipsis-v"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>PA system</h3>
                                                </div>
                                            </li>
                                            <li>
                                                @include('shared.frontend.add-cart')
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- event-content - end -->

                            </div>
                            <!-- event-item - end -->

                            <!-- event-item - start -->
                            <div class="event-list-item clearfix">

                                <!-- event-image - start -->
                                <div class="event-image">

                                    <img src="{{asset('public/frontend/assets/images/event/event-2.jpg')}}" alt="Image_not_found">
                                </div>
                                <!-- event-image - end -->

                                <!-- event-content - start -->
                                <div class="event-content">
                                    <div class="event-title mb-15">
                                        <h3 class="title">
                                            <a href="">Barcelona <strong>Food truck Festival 2018</strong></a>
                                        </h3>

                                    </div>
                                    <div class="event-info-list ul-li clearfix">
                                        <ul>
                                            <li>
													<span class="icon">
														<i class="fas fa-map-marker-alt"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>Near Canara Bank, Sikandra </h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
														<i class="fas fa-users"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>100 - 1000 </h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
														<i class="fas fa-home"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>Terrace</h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
														<i class="fas fa-beer"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>Liquor served</h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
													<i class="fas fa-ellipsis-v"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>PA system</h3>
                                                </div>
                                            </li>
                                            <li>
                                                @include('shared.frontend.add-cart')
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- event-content - end -->

                            </div>
                            <!-- event-item - end -->

                            <!-- event-item - start -->
                            <div class="event-list-item clearfix">

                                <!-- event-image - start -->
                                <div class="event-image">

                                    <img src="{{asset('public/frontend/assets/images/event/event-3.jpg')}}" alt="Image_not_found">
                                </div>
                                <!-- event-image - end -->

                                <!-- event-content - start -->
                                <div class="event-content">
                                    <div class="event-title mb-15">
                                        <h3 class="title">
                                            <a href="">Barcelona <strong>Food truck Festival 2018</strong></a>
                                        </h3>

                                    </div>
                                    <div class="event-info-list ul-li clearfix">
                                        <ul>
                                            <li>
													<span class="icon">
														<i class="fas fa-map-marker-alt"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>Near Canara Bank, Sikandra </h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
														<i class="fas fa-users"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>100 - 1000 </h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
														<i class="fas fa-home"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>Terrace</h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
														<i class="fas fa-beer"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>Liquor served</h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
													<i class="fas fa-ellipsis-v"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>PA system</h3>
                                                </div>
                                            </li>
                                            <li>
                                                @include('shared.frontend.add-cart')
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- event-content - end -->

                            </div>
                            <!-- event-item - end -->

                            <!-- event-item - start -->
                            <div class="event-list-item clearfix">

                                <!-- event-image - start -->
                                <div class="event-image">

                                    <img src="{{asset('public/frontend/assets/images/event/event-4.jpg')}}" alt="Image_not_found">
                                </div>
                                <!-- event-image - end -->

                                <!-- event-content - start -->
                                <div class="event-content">
                                    <div class="event-title mb-15">
                                        <h3 class="title">
                                            <a href="">Barcelona <strong>Food truck Festival 2018</strong></a>
                                        </h3>

                                    </div>
                                    <div class="event-info-list ul-li clearfix">
                                        <ul>
                                            <li>
													<span class="icon">
														<i class="fas fa-map-marker-alt"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>Near Canara Bank, Sikandra </h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
														<i class="fas fa-users"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>100 - 1000 </h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
														<i class="fas fa-home"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>Terrace</h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
														<i class="fas fa-beer"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>Liquor served</h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
													<i class="fas fa-ellipsis-v"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>PA system</h3>
                                                </div>
                                            </li>
                                            <li>
                                                @include('shared.frontend.add-cart')
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- event-content - end -->

                            </div>
                            <!-- event-item - end -->

                            <!-- event-item - start -->
                            <div class="event-list-item clearfix">

                                <!-- event-image - start -->
                                <div class="event-image">

                                    <img src="{{asset('public/frontend/assets/images/event/event-5.jpg')}}" alt="Image_not_found">
                                </div>
                                <!-- event-image - end -->

                                <!-- event-content - start -->
                                <div class="event-content">
                                    <div class="event-title mb-15">
                                        <h3 class="title">
                                            <a href="">Barcelona <strong>Food truck Festival 2018</strong></a>
                                        </h3>

                                    </div>
                                    <div class="event-info-list ul-li clearfix">
                                        <ul>
                                            <li>
													<span class="icon">
														<i class="fas fa-map-marker-alt"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>Near Canara Bank, Sikandra </h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
														<i class="fas fa-users"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>100 - 1000 </h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
														<i class="fas fa-home"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>Terrace</h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
														<i class="fas fa-beer"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>Liquor served</h3>
                                                </div>
                                            </li>
                                            <li>
													<span class="icon">
													<i class="fas fa-ellipsis-v"></i>
													</span>
                                                <div class="info-content">
                                                    <h3>PA system</h3>
                                                </div>
                                            </li>
                                            <li>
                                                @include('shared.frontend.add-cart')
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- event-content - end -->

                            </div>
                            <!-- event-item - end -->

                            <div class="pagination ul-li clearfix">
                                <ul>
                                    <li class="page-item prev-item">
                                        <a class="page-link" href="#!">Prev</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#!">01</a></li>
                                    <li class="page-item active"><a class="page-link" href="#!">02</a></li>
                                    <li class="page-item"><a class="page-link" href="#!">03</a></li>
                                    <li class="page-item"><a class="page-link" href="#!">04</a></li>
                                    <li class="page-item"><a class="page-link" href="#!">05</a></li>
                                    <li class="page-item next-item">
                                        <a class="page-link" href="#!">Next</a>
                                    </li>
                                </ul>
                            </div>

                        </div>

                        <div id="grid-style" class="tab-pane fade">
                            <div class="row justify-content-center">

                                <!-- event-grid-item - start -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="event-grid-item">
                                        <!-- event-image - start -->
                                        <div class="event-image">
                                            <img src="{{asset('public/frontend/assets/images/event/1.event-grid.jpg')}}" alt="Image_not_found">
                                        </div>
                                        <!-- event-image - end -->

                                        <!-- event-content - start -->
                                        <div class="event-content">
                                            <div class="event-title mb-30">
                                                <h3 class="title">
                                                    <a href="">Barcelona <strong>Food truck Festival 2018</strong></a>
                                                </h3>

                                            </div>
                                            <div class="event-post-meta ul-li-block mb-30">
                                                <ul>
                                                    <li>
															<span class="icon">
																<i class="fas fa-map-marker-alt"></i>
															</span>
                                                        Near Canara Bank, Sikandra
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-users"></i>
															</span>
                                                        100 - 1000
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-home"></i>
															</span>
                                                        Terrace
                                                    </li>
                                                    <li>
															<span class="icon">
															<i class="fas fa-beer"></i>
															</span>
                                                        Liquor served
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-ellipsis-v"></i>
															</span>
                                                        PA system
                                                    </li>
                                                </ul>
                                            </div>
                                            @include('shared.frontend.add-cart')
                                        </div>
                                        <!-- event-content - end -->
                                    </div>
                                </div>
                                <!-- event-grid-item - end -->

                                <!-- event-grid-item - start -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="event-grid-item">
                                        <!-- event-image - start -->
                                        <div class="event-image">
                                            <img src="{{asset('public/frontend/assets/images/event/2.event-grid.jpg')}}" alt="Image_not_found">
                                        </div>
                                        <!-- event-image - end -->

                                        <!-- event-content - start -->
                                        <div class="event-content">
                                            <div class="event-title mb-30">
                                                <h3 class="title">
                                                    <a href="">Barcelona <strong>Food truck Festival 2018</strong></a>
                                                </h3>

                                            </div>
                                            <div class="event-post-meta ul-li-block mb-30">
                                                <ul>
                                                    <li>
															<span class="icon">
																<i class="fas fa-map-marker-alt"></i>
															</span>
                                                        Near Canara Bank, Sikandra
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-users"></i>
															</span>
                                                        100 - 1000
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-home"></i>
															</span>
                                                        Terrace
                                                    </li>
                                                    <li>
															<span class="icon">
															<i class="fas fa-beer"></i>
															</span>
                                                        Liquor served
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-ellipsis-v"></i>
															</span>
                                                        PA system
                                                    </li>
                                                </ul>
                                            </div>
                                            @include('shared.frontend.add-cart')
                                        </div>
                                        <!-- event-content - end -->
                                    </div>
                                </div>
                                <!-- event-grid-item - end -->

                                <!-- event-grid-item - start -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="event-grid-item">
                                        <!-- event-image - start -->
                                        <div class="event-image">
                                            <img src="{{asset('public/frontend/assets/images/event/1.event-grid.jpg')}}" alt="Image_not_found">
                                        </div>
                                        <!-- event-image - end -->

                                        <!-- event-content - start -->
                                        <div class="event-content">
                                            <div class="event-title mb-30">
                                                <h3 class="title">
                                                    <a href="">Barcelona <strong>Food truck Festival 2018</strong></a>
                                                </h3>

                                            </div>
                                            <div class="event-post-meta ul-li-block mb-30">
                                                <ul>
                                                    <li>
															<span class="icon">
																<i class="fas fa-map-marker-alt"></i>
															</span>
                                                        Near Canara Bank, Sikandra
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-users"></i>
															</span>
                                                        100 - 1000
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-home"></i>
															</span>
                                                        Terrace
                                                    </li>
                                                    <li>
															<span class="icon">
															<i class="fas fa-beer"></i>
															</span>
                                                        Liquor served
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-ellipsis-v"></i>
															</span>
                                                        PA system
                                                    </li>
                                                </ul>
                                            </div>
                                            @include('shared.frontend.add-cart')
                                        </div>
                                        <!-- event-content - end -->
                                    </div>
                                </div>
                                <!-- event-grid-item - end -->

                                <!-- event-grid-item - start -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="event-grid-item">
                                        <!-- event-image - start -->
                                        <div class="event-image">
                                            <img src="{{asset('public/frontend/assets/images/event/2.event-grid.jpg')}}" alt="Image_not_found">
                                        </div>
                                        <!-- event-image - end -->

                                        <!-- event-content - start -->
                                        <div class="event-content">
                                            <div class="event-title mb-30">
                                                <h3 class="title">
                                                    <a href="">Barcelona <strong>Food truck Festival 2018</strong></a>
                                                </h3>

                                            </div>
                                            <div class="event-post-meta ul-li-block mb-30">
                                                <ul>
                                                    <li>
															<span class="icon">
																<i class="fas fa-map-marker-alt"></i>
															</span>
                                                        Near Canara Bank, Sikandra
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-users"></i>
															</span>
                                                        100 - 1000
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-home"></i>
															</span>
                                                        Terrace
                                                    </li>
                                                    <li>
															<span class="icon">
															<i class="fas fa-beer"></i>
															</span>
                                                        Liquor served
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-ellipsis-v"></i>
															</span>
                                                        PA system
                                                    </li>
                                                </ul>
                                            </div>
                                            @include('shared.frontend.add-cart')
                                        </div>
                                        <!-- event-content - end -->
                                    </div>
                                </div>
                                <!-- event-grid-item - end -->

                                <!-- event-grid-item - start -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="event-grid-item">
                                        <!-- event-image - start -->
                                        <div class="event-image">
                                            <img src="{{asset('public/frontend/assets/images/event/1.event-grid.jpg')}}" alt="Image_not_found">
                                        </div>
                                        <!-- event-image - end -->

                                        <!-- event-content - start -->
                                        <div class="event-content">
                                            <div class="event-title mb-30">
                                                <h3 class="title">
                                                    <a href="">Barcelona <strong>Food truck Festival 2018</strong></a>
                                                </h3>

                                            </div>
                                            <div class="event-post-meta ul-li-block mb-30">
                                                <ul>
                                                    <li>
															<span class="icon">
																<i class="fas fa-map-marker-alt"></i>
															</span>
                                                        Near Canara Bank, Sikandra
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-users"></i>
															</span>
                                                        100 - 1000
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-home"></i>
															</span>
                                                        Terrace
                                                    </li>
                                                    <li>
															<span class="icon">
															<i class="fas fa-beer"></i>
															</span>
                                                        Liquor served
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-ellipsis-v"></i>
															</span>
                                                        PA system
                                                    </li>
                                                </ul>
                                            </div>
                                            @include('shared.frontend.add-cart')
                                        </div>
                                        <!-- event-content - end -->
                                    </div>
                                </div>
                                <!-- event-grid-item - end -->

                                <!-- event-grid-item - start -->
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="event-grid-item">
                                        <!-- event-image - start -->
                                        <div class="event-image">
                                            <img src="{{asset('public/frontend/assets/images/event/2.event-grid.jpg')}}" alt="Image_not_found">
                                        </div>
                                        <!-- event-image - end -->

                                        <!-- event-content - start -->
                                        <div class="event-content">
                                            <div class="event-title mb-30">
                                                <h3 class="title">
                                                    <a href="">Barcelona <strong>Food truck Festival 2018</strong></a>
                                                </h3>

                                            </div>
                                            <div class="event-post-meta ul-li-block mb-30">
                                                <ul>
                                                    <li>
															<span class="icon">
																<i class="fas fa-map-marker-alt"></i>
															</span>
                                                        Near Canara Bank, Sikandra
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-users"></i>
															</span>
                                                        100 - 1000
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-home"></i>
															</span>
                                                        Terrace
                                                    </li>
                                                    <li>
															<span class="icon">
															<i class="fas fa-beer"></i>
															</span>
                                                        Liquor served
                                                    </li>
                                                    <li>
															<span class="icon">
																<i class="fas fa-ellipsis-v"></i>
															</span>
                                                        PA system
                                                    </li>
                                                </ul>
                                            </div>
                                            @include('shared.frontend.add-cart')
                                        </div>
                                        <!-- event-content - end -->
                                    </div>
                                </div>
                                <!-- event-grid-item - end -->

                                <!-- pagination - start -->
                                <div class="pagination ul-li clearfix">
                                    <ul>
                                        <li class="page-item prev-item">
                                            <a class="page-link" href="#!">Prev</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#!">01</a></li>
                                        <li class="page-item active"><a class="page-link" href="#!">02</a></li>
                                        <li class="page-item"><a class="page-link" href="#!">03</a></li>
                                        <li class="page-item"><a class="page-link" href="#!">04</a></li>
                                        <li class="page-item"><a class="page-link" href="#!">05</a></li>
                                        <li class="page-item next-item">
                                            <a class="page-link" href="#!">Next</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- pagination - end -->

                            </div>
                        </div>
                    </div>

                </div>
                <!-- - end -->

            </div>
        </div>
    </section>
    <!-- event-section - end
    ================================================== -->

@endsection


@section('script')
    <script type="text/javascript">



    </script>
@endsection