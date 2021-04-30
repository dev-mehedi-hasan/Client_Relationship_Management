<style>
    .sub_menu_list>li {
        list-style: none;
    }
    .subMenuActive{
        border-right: 4px solid #19aaf8;
    }
</style>
<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <div class="full_width_logo hide-menu justify_content">
                <img src="{{URL::asset('public/assets/images/full_width_logo.png')}}">
            </div>
            <div class="mobile_logo 1">
                <img src="{{URL::asset('public/assets/images/mobile_logo.png')}}">
            </div>
            <!-- end logo -->
            @php
                $user = Auth::user();
            @endphp
            <!-- admin avatar -->
            <div class="avatar">
                <img class="rounded-circle shadow-sm border" src="{{ isset($user) ? $user->getFirstMediaUrl('avatar') : asset('public/assets/images/avatar.png') }}">
                <h5 class="hide-menu">
                    @if (Auth::user()->name == NULL)
                        Dterms
                    @else
                        {{ Auth::user()->name }}
                    @endif
                </h5>
            </div>
            <!-- end admin avartar -->
        </div>

        <ul class="list-unstyled components">
            {{-- Dashboard --}}
            {{-- Admin Dashboard --}}
            @if(auth()->user()->user_type == 1)
            <li class="{{ Request::segment(1) === 'admin' && Request::segment(2) === 'dashboard' ? 'active subMenuActive' : null }}">
                <a href="{{route('admin.dashboard')}}">
                    <i class="fas fa-home"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>

            {{-- Worker Dashboard --}}
            @elseif(auth()->user()->user_type == 2)
            <li class="{{ Request::segment(1) === 'worker' && Request::segment(2) === 'dashboard' ? 'active subMenuActive' : null }}">
                <a href="{{route('worker.dashboard')}}">
                    <i class="fas fa-home"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            {{-- Client Dashboard --}}
            @elseif(auth()->user()->user_type == 3)
            <li class="{{ Request::segment(1) === 'client' && Request::segment(2) === 'dashboard' ||  Request::segment(1) === 'client' && Request::segment(2) === 'feedback' ? 'active subMenuActive' : null }}">
                <a href="{{route('client.dashboard')}}">
                    <i class="fas fa-home"></i>
                    <span class="hide-menu">Dashboard</span>
                </a>
            </li>
            @endif
            {{-- End Dashboard --}}

            {{-- Order --}}
            {{-- Admin Order --}}
            @if(auth()->user()->user_type == 1)
            <li class="{{ Request::segment(1) === 'admin' && Request::segment(2) === 'order' ? 'active subMenuActive' : null }}">
                <a href="{{route('admin.order.index')}}">
                    <i class="fas fa-sort-amount-up"></i>
                    <span class="hide-menu">Orders</span>
                </a>
            </li>
            {{-- Worker Order --}}
            @elseif(auth()->user()->user_type == 2)
            <li class="{{ Request::segment(1) === 'worker' && Request::segment(2) === 'order' ? 'active subMenuActive' : null }}">
                <a href="{{route('worker.order.index')}}">
                    <i class="fas fa-sort-amount-up"></i>
                    <span class="hide-menu">Orders</span>
                </a>
            </li>
            {{-- Client Order --}}
            @elseif(auth()->user()->user_type == 3)
            <li class="{{ Request::segment(1) === 'client' && Request::segment(2) === 'order' ? 'active subMenuActive' : null }}">
                <a href="{{route('client.order.index')}}">
                    <i class="fas fa-sort-amount-up"></i>
                    <span class="hide-menu">Orders</span>
                </a>
            </li>
            @endif
            {{-- End Order --}}

            {{-- Free Trials --}}
            {{-- Admin Free Trials --}}
            @if(auth()->user()->user_type == 1)
            <li class="{{ Request::segment(1) === 'admin' && Request::segment(2) === 'freetrials' ? 'active subMenuActive' : null }}">
                <a href="{{route('admin.freetrials.index')}}">
                    <i class="fas fa-th-list"></i>
                    <span class="hide-menu">Free Trials</span>
                </a>
            </li>
            @endif
            {{-- End Free Trials --}}
            {{-- Spacification --}}
            {{-- Admin Free Trials --}}
            @if(auth()->user()->user_type == 1)
            <li class="arrow_dropdown_btn {{ Request::segment(1) === 'admin' && Request::segment(2) === 'specification' || Request::segment(1) === 'admin' && Request::segment(2) === 'specifications' ? 'active' : null }}">
                <a href="#specificationSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-tasks"></i>
                    <span class="hide-menu">Specification</span>
                </a>
                <ul class="collapse list-unstyled {{ Request::segment(1) === 'admin' && Request::segment(2) === 'specification' || Request::segment(2) === 'specifications' ? 'show' : null }}" id="specificationSubmenu">
                    <li class="{{ Request::segment(1) === 'admin' && Request::segment(2) === 'specification' ? 'subMenuActive' : null }}">
                        <a href="{{ route('admin.specification.index') }}"><i class="fa fa-user-check"></i><span
                                class="hide-menu">Client Specification</span></a>
                    </li>

                    <li class="{{ Request::segment(1) === 'admin' && Request::segment(2) === 'specifications' || Request::segment(3) === 'create' ? 'subMenuActive' : null }}">
                        <a href="{{ route('admin.specifications.index') }}"><i class="far fa-plus-square"></i>&nbsp;<span class="hide-menu">Create New</span></a>
                    </li>
                </ul>
            </li>

            {{-- Client Free Trials --}}
            @elseif(auth()->user()->user_type == 3)
            <li class="{{ Request::segment(1) === 'client' && Request::segment(2) === 'specification' || Request::segment(1) === 'client' && Request::segment(2) === 'specification-marketplace' || Request::segment(1) === 'client' && Request::segment(2) === 'specification-stepbystep' ? 'active subMenuActive' : null }}">
                <a href="{{route('client.specification.index')}}">
                    <i class="fas fa-th-list"></i>
                    <span class="hide-menu">Specification</span>
                </a>
            </li>

            @endif
            {{-- End Spacification --}}
            {{-- Record --}}
            @if(auth()->user()->user_type == 1)
            <li class="arrow_dropdown_btn {{ Request::segment(1) === 'admin' && Request::segment(2) === 'record' ? 'active' : null }}">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                    <i class="fas fa-clipboard"></i>
                    <span class="hide-menu">Records</span>
                </a>
                <ul class="collapse list-unstyled {{ Request::segment(1) === 'admin' && Request::segment(2) === 'record' ? 'show' : null }}" id="homeSubmenu">
                    <li class="{{ Request::segment(1) === 'admin' && Request::segment(2) === 'record' && Request::segment(3) === 'billing' ? 'subMenuActive' : null }}">
                        <a href="{{ route('admin.billing.index') }}"><i class="fas fa-hand-holding-usd"></i>&nbsp;<span
                                class="hide-menu">Client Billing</span></a>
                    </li>

                    <li class="{{ Request::segment(1) === 'admin' && Request::segment(2) === 'record' && Request::segment(3) === 'worker' ? 'subMenuActive' : null }}">
                        <a href="{{ route('admin.worker.index') }}"><i class="fas fa-users"></i><span class="hide-menu">Worker Billing</span></a>
                    </li>
                    
                    {{-- <li class="{{ Request::segment(1) === 'admin' && Request::segment(2) === 'record' && Request::segment(3) === 'client' ? 'subMenuActive' : null }}">
                        <a href="{{ route('admin.client.index') }}"><i class="fas fa-user-tie"></i>&nbsp;<span class="hide-menu">Client</span></a>
                    </li> --}}
                    
                </ul>
            </li>
            @endif
            {{-- End Record --}}
            {{-- Admin Account --}}
            @if(auth()->user()->user_type == 1)
            <li class="{{ Request::segment(1) === 'admin' && Request::segment(2) === 'users' ? 'active subMenuActive' : null }}">
                <a href="{{ route('admin.users.index') }}">
                    <i class="fas fa-users"></i>
                    <span class="hide-menu">Users</span>
                </a>
            </li>

            @endif

            <li>
                <a href="{{ url('/') }}" target="_blank">
                    <i class="fas fa-globe-asia"></i>
                    <span class="hide-menu">Website</span>
                </a>
            </li>

        </ul>
    </nav>
    <style>
        .btn.focus, .btn:focus{
            box-shadow: none !important;
        }
    </style>
    <!-- Page Content  -->
    <div id="content">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">

                <button type="button" id="sidebarCollapse" class="btn">
                    <i class="fas fa-align-left"></i>
                </button>
                
                    <div class="dropdown ml-auto">
                        
                       @php
                           $user = Auth::user();
                       @endphp
                            <img style="width: 50px; height: 50px; cursor: pointer;" id="dropdownMenuButton" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle rounded-circle float-left position-relative" src="
                            {{ isset($user) ? $user->getFirstMediaUrl('avatar') : asset('public/assets/images/avatar.png') }}"> 
                            <div class="float-left ml-2">
                                <p style="color: #333; opacity: 0.8; font-weight: 600; font-size: 15px;" class="text-font-family m-0">{{ $user->name }}</p>
                                @if ($user->user_type === 1)
                                    <span style="font-size: 13px; opacity: 0.8;" class="text-secondary">Admin</span>
                                @elseif ($user->user_type === 2)
                                    <span style="font-size: 13px; opacity: 0.8;" class="text-secondary">Worker</span>
                                @else
                                    <span style="font-size: 13px; opacity: 0.8;" class="text-secondary">Client</span>
                                @endif
                            </div>

                        <div class="dropdown-menu fade dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="{{ route('user.profile.index') }}"><i class="fa fa-user-circle fa-sm" style="color: #ccc;"></i>&nbsp; Profile</a>

                            <a href="{{ route('user.profile.security') }}" class="dropdown-item"><i style="color: #ccc;" class="fas fa-key fa-sm"></i>&nbsp; Password Change</a>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"><i class="fas fa-sign-out-alt fa-sm" style="color: #cccccc;"></i>&nbsp; Logout</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
            </div>
        </nav>
