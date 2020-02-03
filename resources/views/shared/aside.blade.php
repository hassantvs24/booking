<div class="sidebar sidebar-main sidebar-fixed">
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="{{ Request::routeIs('dashboard') ? 'active' : '' }}"><a href="{{route('dashboard')}}"><i class="icon-home4"></i> <span>@lang('site.aside.dashboard')</span></a></li>

                    <li class="{{ (Request::is('booking/*','booking') ? 'active' : '') }}">
                        <a href="#"><i class="icon-bookmark"></i> <span> @lang('site.aside.booking')</span></a>
                        <ul>
                            <li class="{{ Request::routeIs('new-booking') ? 'active' : '' }} {{Auth::user()->access_view('new-booking')}}"><a href="{{route('new-booking')}}"><i class="icon-diamond3"></i> @lang('site.aside.new_booking')</a></li>
                            <li class="{{ Request::routeIs('booking-task') ? 'active' : '' }} {{Auth::user()->access_view('booking-task')}}"><a href="{{route('booking-task')}}"><i class="icon-diamond3"></i> @lang('site.aside.booking_task')</a></li>
                            <li class="{{ Request::routeIs('old-booking') ? 'active' : '' }} {{Auth::user()->access_view('old-booking')}}"><a href="{{route('old-booking')}}"><i class="icon-diamond3"></i> @lang('site.aside.booking_archive')</a></li>
                        </ul>
                    </li>

                    <li class="navigation-divider"></li>

                    <li class="{{ Request::routeIs('service') ? 'active' : '' }} {{Auth::user()->access_view('service')}}"><a href="{{route('service')}}"><i class="icon-theater"></i> <span>@lang('site.aside.service_list')</span></a></li>


                    <li class="navigation-divider"></li>

                    <li class="{{ (Request::is('settings/*','settings') ? 'active' : '') }}">
                        <a href="#"><i class="icon-cog2"></i> <span> @lang('site.aside.settings')</span></a>
                        <ul>
                            <li class="{{ Request::routeIs('party') ? 'active' : '' }} {{Auth::user()->access_view('party')}}"><a href="{{route('party')}}"><i class="icon-diamond3"></i> @lang('site.aside.party')</a></li>
                            <li class="{{ Request::routeIs('location') ? 'active' : '' }} {{Auth::user()->access_view('location')}}"><a href="{{route('location')}}"><i class="icon-diamond3"></i> @lang('site.aside.location')</a></li>
                            <li class="{{ Request::routeIs('facility') ? 'active' : '' }} {{Auth::user()->access_view('facility')}}"><a href="{{route('facility')}}"><i class="icon-diamond3"></i> @lang('site.aside.facility')</a></li>
                            <li class="{{ Request::routeIs('time-slot') ? 'active' : '' }} {{Auth::user()->access_view('time-slot')}}"><a href="{{route('time-slot')}}"><i class="icon-diamond3"></i> @lang('site.aside.time_slot')</a></li>
                            <li class="{{ Request::routeIs('rules') ? 'active' : '' }} {{Auth::user()->access_view('rules')}}"><a href="{{route('rules')}}"><i class="icon-diamond3"></i> @lang('site.aside.rules')</a></li>
                        </ul>
                    </li>

                    <li class="navigation-divider"></li>

                    <li class="{{ (Request::is('users/*','users') ? 'active' : '') }}">
                        <a href="#"><i class="icon-user"></i> <span> @lang('site.aside.user')</span></a>
                        <ul>
                            <li class="{{ Request::routeIs('users-list') ? 'active' : '' }} {{Auth::user()->access_view('users-list')}}"><a href="{{route('users-list')}}"><i class="icon-diamond3"></i> @lang('site.aside.all_user')</a></li>
                            <li class="{{ Request::routeIs('user-role') ? 'active' : '' }}" {{Auth::user()->access_view('user-role')}}><a href="{{route('user-role')}}"><i class="icon-diamond3"></i> @lang('site.aside.user_role')</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>
