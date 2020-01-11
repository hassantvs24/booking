<div class="sidebar sidebar-main sidebar-fixed">
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="{{-- (Request::is('/') ? 'active' : '') --}}"><a href=""><i class="icon-home4"></i> <span>@lang('site.aside.dashboard')</span></a></li>

                    <li class="navigation-divider"></li>

                    <li class="{{ Request::routeIs('service') ? 'active' : '' }}"><a href="{{route('service')}}"><i class="icon-user"></i> <span>@lang('site.aside.service_list')</span></a></li>


                    <li class="navigation-divider"></li>

                    <li class="{{ (Request::is('settings/*','settings') ? 'active' : '') }}">
                        <a href="#"><i class="icon-cog2"></i> <span> @lang('site.aside.settings')</span></a>
                        <ul>
                            <li class="{{ Request::routeIs('party') ? 'active' : '' }}"><a href="{{route('party')}}"><i class="icon-diamond3"></i> @lang('site.aside.party')</a></li>
                            <li class="{{ Request::routeIs('location') ? 'active' : '' }}"><a href="{{route('location')}}"><i class="icon-diamond3"></i> @lang('site.aside.location')</a></li>
                            <li class="{{ Request::routeIs('facility') ? 'active' : '' }}"><a href="{{route('facility')}}"><i class="icon-diamond3"></i> @lang('site.aside.facility')</a></li>
                            <li class="{{ Request::routeIs('time-slot') ? 'active' : '' }}"><a href="{{route('time-slot')}}"><i class="icon-diamond3"></i> @lang('site.aside.time_slot')</a></li>
                            <li class="{{ Request::routeIs('rules') ? 'active' : '' }}"><a href="{{route('rules')}}"><i class="icon-diamond3"></i> @lang('site.aside.rules')</a></li>
                        </ul>
                    </li>

                    <li class="navigation-divider"></li>

                    <li class="{{ (Request::is('users/*','users') ? 'active' : '') }}">
                        <a href="#"><i class="icon-user"></i> <span> @lang('site.aside.user')</span></a>
                        <ul>
                            <li class="{{ Request::routeIs('users') ? 'active' : '' }}"><a href="{{route('users')}}"><i class="icon-diamond3"></i> @lang('site.aside.all_user')</a></li>
                            <li class="{{ Request::routeIs('user-role') ? 'active' : '' }}"><a href="{{route('user-role')}}"><i class="icon-diamond3"></i> @lang('site.aside.user_role')</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>
