<div class="sidebar sidebar-main sidebar-fixed">
    <div class="sidebar-content">
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">

                    <!-- Main -->
                    <li class="{{-- (Request::is('/') ? 'active' : '') --}}"><a href=""><i class="icon-home4"></i> <span>@lang('site.aside.dashboard')</span></a></li>

                    <li class="navigation-divider"></li>

                    <li class="{{-- (Request::is('branch') ? 'active' : '') --}}"><a href=""><i class="icon-office"></i> <span>Branch</span></a></li>

                    <li class="navigation-divider"></li>
                    <li class=""><a href="#"><i class="icon-user"></i> <span>All Users</span></a></li>
                    <li class="navigation-divider"></li>

                    <li class="{{-- (Request::is('reports/*','reports') ? 'active' : '') --}}">
                        <a href=""><i class="icon-cog2"></i> <span> @lang('site.aside.settings')</span></a>
                        <ul>
                            <li class="{{-- (Request::is('report/collection','') ? 'active' : '') --}}"><a href=""><i class="icon-diamond3"></i> @lang('site.aside.location')</a></li>
                            <li class="{{-- (Request::is('report/income','') ? 'active' : '') --}}"><a href=""><i class="icon-diamond3"></i> @lang('site.aside.facility')</a></li>
                            <li class="{{-- (Request::is('report/income','') ? 'active' : '') --}}"><a href=""><i class="icon-diamond3"></i> @lang('site.aside.time_slot')</a></li>
                            <li class="{{-- (Request::is('report/income','') ? 'active' : '') --}}"><a href=""><i class="icon-diamond3"></i> @lang('site.aside.rules')</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /main navigation -->
    </div>
</div>
