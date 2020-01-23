<div class="header-altranative">
    <div class="container">
        <div class="logo-area float-left">
            <a href="{{route('front.home')}}">
                <img src="{{asset('public/frontend/assets/images/1.site-logo.png')}}" alt="logo_not_found">
            </a>
        </div>

        <button type="button" id="sidebarCollapse" class="alt-menu-btn float-right">
            <i class="fas fa-bars"></i>
        </button>
    </div>

    <!-- sidebar menu - start -->
    <div class="sidebar-menu-wrapper">
        <div id="sidebar" class="sidebar">
					<span id="sidebar-dismiss" class="sidebar-dismiss">
						<i class="fas fa-arrow-left"></i>
					</span>

            <div class="sidebar-header">
                <a href="{{route('front.home')}}">
                    <img src="{{asset('public/frontend/assets/images/2.site-logo.png')}}" alt="logo_not_found">
                </a>
            </div>

            <!-- sidebar-form - start -->
            <div class="sidebar-form">
                <form action="#">
                    <input id="altmenu-sidebar-search" type="search" placeholder="Search">
                    <label for="altmenu-sidebar-search"><i class="fas fa-search"></i></label>
                </form>
            </div>
            <!-- sidebar-form - end -->

            <!-- main-pages-links - start -->
            <div class="menu-link-list main-pages-links">
                <ul>
                    <li>
                        <a href="{{route('front.home')}}">home</a>
                    </li>
                    <li>
                        <a href="{{route('front.about')}}">about</a>
                    </li>
                    <li>
                        <a href="{{route('front.service')}}">services</a>
                    </li>
                    <li>
                        <a href="{{route('front.gallery')}}">gallery</a>
                    </li>
                    <li>
                        <a href="{{route('front.contact')}}">contact</a>
                    </li>
                </ul>
            </div>
            <!-- main-pages-links - end -->

            <!-- login-btn-group - start -->
            <div class="login-btn-group">
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
            <!-- login-btn-group - end -->

            <!-- social-links - start -->
            <div class="social-links">
                <h2 class="menu-title">get in touch</h2>
                <div class="mb-15">
                    <h3 class="contact-info">
                        <i class="fas fa-phone"></i>
                        01675-870047
                    </h3>
                    <h3 class="contact-info">
                        <i class="fas fa-envelope"></i>
                        info@harmoni.com
                    </h3>
                </div>
                <ul>
                    <li>
                        <a href="#!"><i class="fab fa-facebook-f"></i></a>
                    </li>
                    <li>
                        <a href="#!"><i class="fab fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#!"><i class="fab fa-twitch"></i></a>
                    </li>
                    <li>
                        <a href="#!"><i class="fab fa-google-plus-g"></i></a>
                    </li>
                    <li>
                        <a href="#!"><i class="fab fa-instagram"></i></a>
                    </li>
                </ul>
                <a href="{{route('front.contact')}}" class="contact-btn">contact us</a>
            </div>
            <!-- social-links - end -->

            <div class="overlay"></div>
        </div>
    </div>
    <!-- sidebar menu - end -->
</div>