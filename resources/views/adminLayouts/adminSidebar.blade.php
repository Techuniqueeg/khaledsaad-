<!--begin::Aside Menu-->
<div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
    <!--begin::Menu Container-->
    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
         data-menu-dropdown-timeout="500">
        <!--begin::Menu Nav-->
        <ul class="menu-nav">
            <li class="menu-item @if(request()->segment(1) == 'dashboard') menu-item-active  @endif"
                aria-haspopup="true">
                <a href="{{url('/dashboard')}}" class="menu-link">
                    <i class="menu-icon flaticon-home">
                        <span></span>
                    </i>
                    <span class="menu-text">الصفحة الرئيسية</span>
                </a>
            </li>
            <li class="menu-item menu-item-submenu @if(request()->segment(1) == 'projects') menu-item-open @endif "
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{route('projects')}}" class="menu-link menu-toggle">
                    <i class="menu-icon  flaticon2-cup"></i>
                    <span class="menu-text">المنتجات</span>
                </a>
            </li>
            <li class="menu-item menu-item-submenu @if(request()->segment(1) == 'categories') menu-item-open @endif "
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{route('categories')}}" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-pie-chart"></i>
                    <span class="menu-text">الاقسام</span>
                </a>
            </li>
            <li class="menu-item menu-item-submenu @if(request()->segment(1) == 'addons') menu-item-open @endif "
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{route('addons')}}" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-app"></i>
                    <span class="menu-text">الاضافات</span>
                </a>
            </li>
            <li class="menu-item menu-item-submenu @if(request()->segment(1) == 'sliders') menu-item-open @endif "
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{route('sliders')}}" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-layers"></i>
                    <span class="menu-text">صور العرض</span>
                </a>
            </li>
            <li class="menu-item menu-item-submenu @if(request()->segment(1) == 'user') menu-item-open @endif "
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{route('users')}}" class="menu-link menu-toggle">
                    <i class="menu-icon fas fa-user"></i>
                    <span class="menu-text">العملاء</span>
                </a>
            </li>
            <li class="menu-item menu-item-submenu @if(request()->segment(1) == 'services') menu-item-open @endif "
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{route('services')}}" class="menu-link menu-toggle">
                    <i class="menu-icon flaticon-squares-3"></i>
                    <span class="menu-text">الخدمات</span>
                </a>
            </li>
            <li class="menu-item @if(request()->segment(1) == 'aboutUs') menu-item-active  @endif"
                aria-haspopup="true">
                <a href="{{route('about.edit','1')}}" class="menu-link">
                    <i class="menu-icon flaticon-user-settings">
                        <span></span>
                    </i>
                    <span class="menu-text">من نحن</span>
                </a>
            </li>
            @php($new=\App\Models\Inbox::where('seen','0')->count())
            <li class="menu-item menu-item-submenu @if(request()->segment(1) == 'inboxes') menu-item-open @endif "
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{url('/inboxes')}}" class="menu-link menu-toggle">
                    <i class="menu-icon fas fa-envelope"></i>
                    <span class="menu-text">الرسائل</span>
                    <span class="menu-label">
                    @if($new>0)<span class="label label-danger label-inline">{{$new}}</span>@endif
													</span>
                </a>

            </li>
            <li class="menu-item menu-item-submenu @if(request()->segment(1) == 'settings') menu-item-open @endif "
                aria-haspopup="true" data-menu-toggle="hover">
                <a href="{{route('settings')}}" class="menu-link menu-toggle">
                    <i class="menu-icon fas fa-cog"></i>
                    <span class="menu-text">الاعدادات</span>
                </a>
            </li>
        </ul>
        <!--end::Menu Nav-->
    </div>
    <!--end::Menu Container-->
</div>
<!--end::Aside Menu-->
</div>
<!--end::Aside-->
<!--begin::Wrapper-->
<div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
    <!--begin::Header-->
    <div id="kt_header" class="header header-fixed">
        <!--begin::Container-->
        <div class="container-fluid d-flex align-items-stretch justify-content-between">
            <!--begin::Header Menu Wrapper-->
            <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                <!--begin::Header Menu-->
            </div>
            <!--end::Header Menu Wrapper-->
            <!--begin::Topbar-->
            <div class="topbar">
                <!--begin::User-->
                <div class="topbar-item">
                    <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                         id="kt_quick_user_toggle">
                        {{--                        <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>--}}
                        <span
                            class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{auth()->user()->name}}</span>
                        <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
											<span class="symbol-label font-size-h5 font-weight-bold">
                                            </span>
										</span>
                    </div>
                </div>
                <!--end::User-->
            </div>
            <!--end::Topbar-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Header-->

    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Subheader-->
        <div class="subheader py-2 py-lg-6 subheader-solid" id="kt_subheader">
            <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
                <!--begin::Info-->
                <div class="d-flex align-items-center flex-wrap mr-1">
                    <!--begin::Page Heading-->
                @yield('breadcrumb')
                <!--end::Page Heading-->
                </div>
                <!--end::Info-->
            </div>
        </div>
        <!--end::Subheader-->


        <!--begin::Entry-->
        <div class="d-flex flex-column-fluid">
            <!--begin::Container-->
            <div class="container">
