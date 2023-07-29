<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="{{ route('admin.index') }}"><img class="img-fluid for-light" width="60"
                    height="60" src="{{ asset(\App\Models\Setting::query()->pluck('logo')[0]) }}" alt=""></a>
            <div class="back-btn"><i data-feather="grid"></i></div>
            <div class="toggle-sidebar icon-box-sidebar"><i class="status_toggle middle sidebar-toggle"
                    data-feather="grid"> </i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="{{ route('admin.index') }}">
                <div class="icon-box-sidebar"><i data-feather="grid"></i></div>
            </a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.index') }}">
                            <i data-feather="home"> </i><span>@lang('Dashboard')</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.users.index') }}">
                            <i data-feather="users"> </i><span>@lang('Users')</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.car-size.index') }}">
                            <i class="fa fa-car pe-3 text-light"> </i><span>@lang('Car Sizes')</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.services.index') }}">
                            <i class="fa fa-tv pe-3 text-light"> </i><span>@lang('Services')</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.brand.index') }}">
                            <i class="fa fa-car pe-3 text-light"> </i><span>@lang('Car Brands')</span>
                        </a>
                    </li>
                    <li class="sidebar-list">
                        <a class="sidebar-link sidebar-title link-nav" href="{{ route('admin.settings.index') }}">
                            <i data-feather="settings"> </i><span>@lang('Settings')</span>
                        </a>
                    </li>
                    <li class="sidebar-list"><i class="fa fa-thumb-tack"></i><a class="sidebar-link sidebar-title"
                            href="javascript:void(0)"><i data-feather="layout"></i><span class="lan-7">Page
                                layout</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="box-layout.html">Boxed</a></li>
                            <li><a href="layout-rtl.html">RTL</a></li>
                            <li><a href="layout-dark.html">Dark Layout</a></li>
                            <li><a href="hide-on-scroll.html">Hide Nav Scroll</a></li>
                            <li><a href="footer-light.html">Footer Light</a></li>
                            <li><a href="footer-dark.html">Footer Dark</a></li>
                            <li><a href="footer-fixed.html">Footer Fixed</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>
