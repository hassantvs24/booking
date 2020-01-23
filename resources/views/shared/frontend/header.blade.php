<header id="header-section" class="header-section default-header-section auto-hide-header clearfix">
    <!-- header-top - start -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- basic-contact - start -->
                <div class="col-lg-6">
                    <div class="basic-contact">
                        <ul>
                            <li>
                                <a href="#!">
                                    <i class="fas fa-envelope"></i>
                                    info@infinityflamesoft.com
                                </a>
                            </li>
                            <li>
                                <a href="#!">
                                    <i class="fas fa-phone"></i>
                                    01675-870047
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- basic-contact - end -->
                <!-- register-login-group - start -->
                <div class="col-lg-6">
                    <div class="register-login-group">
                        <ul>
                            <li>
                                @if(Auth::check())
                                    <a href="{{route('front.user')}}" class="">
                                        <i class="fas fa-user"></i>
                                        {{Auth::user()->name}}
                                    </a>
                                    @else
                                    <a href="{{route('front.login-register')}}" class="">
                                        <i class="fas fa-bookmark"></i>
                                        Register
                                    </a>
                                @endif
                            </li>
                            <li>
                                @if(Auth::check())
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    <i class="fas fa-lock"></i>
                                    Logout
                                </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                @else
                                    <a href="{{route('front.login-register')}}" class="">
                                        <i class="fas fa-unlock"></i>
                                        Login
                                    </a>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- register-login-group - end -->

            </div>
        </div>
    </div>
    <!-- header-top - end -->

    <!-- header-bottom - start -->
    <div class="header-bottom">
        <div class="container">
            <div class="row">

                <!-- site-logo-wrapper - start -->
                <div class="col-lg-3">
                    <div class="site-logo-wrapper">
                        <a href="{{route('front.home')}}" class="logo">
                            <img src="{{asset('public/frontend/assets/images/0.site-logo.png')}}" alt="logo_not_found">
                        </a>
                    </div>
                </div>
                <!-- site-logo-wrapper - end -->

                <!-- mainmenu-wrapper - start -->
                <div class="col-lg-9">
                    <div class="mainmenu-wrapper">
                        <div class="row">

                            <!-- menu-item-list - start -->
                            <div class="col-lg-10">
                                <div class="menu-item-list ul-li clearfix">
                                    <ul>
                                        <li class="menu-item-has-children {{ Request::routeIs('front.home') ? 'active' : '' }}">
                                            <a href="{{route('front.home')}}">home</a>
                                        </li>
                                        <li class="menu-item-has-children {{ Request::routeIs('front.about') ? 'active' : '' }}">
                                            <a href="{{route('front.about')}}">about</a>
                                        </li>
                                        <li class="menu-item-has-children {{ Request::routeIs('front.service') ? 'active' : '' }}">
                                            <a href="{{route('front.service')}}">services</a>
                                        </li>
                                        <li class="menu-item-has-children {{ Request::routeIs('front.gallery') ? 'active' : '' }}">
                                            <a href="{{route('front.gallery')}}">gallery</a>
                                        </li>
                                        <li class="menu-item-has-children {{ Request::routeIs('front.contact') ? 'active' : '' }}">
                                            <a href="{{route('front.contact')}}">contact</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- menu-item-list - end -->

                            <!-- menu-item-list - start -->
                            <div class="col-lg-2">
                                <div class="user-search-btn-group ul-li clearfix">
                                    <ul>
                                        <li>
                                            @if($temp_cart->count() > 0)
                                            <span class="badge badge-info" style="position: absolute; border-radius: 15px;">{{$temp_cart->count()}}</span>
                                            @endif
                                            <button type="button" class="toggle-overlay search-btn">

                                                <i class="fas fa-shopping-cart"></i>
                                            </button>
                                            <!-- search-body - start -->
                                                @if($temp_cart->count() > 0)
                                            <div class="search-body" style="width: auto;">
                                                <div class="search-form">
                                                    <table class="table table-bordered">
                                                        @php
                                                            $total_temp_value = 0;
                                                        @endphp
                                                        @foreach($temp_cart as $row)

                                                            <tr>
                                                                <td>{{$row->services['name']}}</td>
                                                                <td>{{$row->services['serviceType']}}</td>
                                                                <td style="white-space: nowrap;"><i class="fas fa-dollar-sign"></i> {{money_c($row->pricing * $row->qty)}}</td>
                                                            </tr>
                                                            @php
                                                                $total_temp_value += ($row->pricing * $row->qty);
                                                            @endphp
                                                        @endforeach
                                                        <tr class="text-warning">
                                                            <td><b>Total</b></td>
                                                            <td style="white-space: nowrap;"><i class="fas fa-dollar-sign"></i> {{money_c($total_temp_value)}}</td>
                                                            <td><a href="{{route('front.checkout')}}" class="custom-btn"><i class="fas fa-shopping-cart"></i>checkout</a></td>
                                                        </tr>
                                                    </table>
                                                </div>
                                                @endif
                                            </div>
                                            <!-- search-body - end -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- menu-item-list - end -->

                        </div>
                    </div>
                </div>
                <!-- mainmenu-wrapper - end -->

            </div>
        </div>
    </div>
    <!-- header-bottom - end -->

</header>