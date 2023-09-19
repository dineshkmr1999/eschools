@extends('layouts.super_master')
<!-- partial:../../partials/_navbar.html -->
@if(Session::get('locale'))
{{app()->setLocale(Session::get('locale'))}}
@endif
<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ URL::to('/') }}"> <img src="{{ env('LOGO1') ? url(Storage::url(env('LOGO1'))) : url('assets/logo.svg') }}" alt="logo"> </a> <a class="navbar-brand brand-logo-mini" href="{{ URL::to('/') }}"> <img src="{{ asset('storage/' . env('FAVICON')) }}" alt="logo"> </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="fa fa-bars"></span>
        </button>

      
            <li class="nav-item dropdown">
                <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-language"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                    @foreach (get_language() as $key => $language)
                    <a class="dropdown-item preview-item" href="{{url('set-language').'/'.$language->code}}">
                        <div class="preview-thumbnail">
                            {{-- <img src="../../../assets/images/faces/face3.jpg" alt="image" class="profile-pic"> --}}
                        </div>
                        <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
                            <h6 class="preview-subject ellipsis mb-1 font-weight-normal">{{$language->name}}</h6>
                            {{-- <p class="text-gray mb-0"> 18 Minutes ago </p> --}}
                        </div>
                    </a>
                    <div class="dropdown-divider"></div>
                    @endforeach
                </div>
            </li>
            <li class="nav-item nav-profile dropdown">
                <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="true">
                    <div class="nav-profile-img">
                        <img src="{{ Auth::user()->image }}" alt="image" onerror="onErrorImage(event)">
                    </div>
                    <div class="nav-profile-text">
                        <p class="mb-1 text-black">{{ Auth::user()->first_name }}</p>
                    </div>
                </a>
                <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                    @can('update-admin-profile')
                    <a class="dropdown-item" href="{{ route('edit-profile-super-admin') }}">
                        <i class="fa fa-user mr-2"></i>{{ __('update_profile') }}</a>
                    <div class="dropdown-divider"></div>
                    @endcan
                    <a class="dropdown-item" href="{{ route('resetpassword-super-admin') }}">
                        <i class="fa fa-refresh mr-2 text-success"></i>{{ __('change_password') }}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ route('logout') }}">
                        <i class="fa fa-sign-out mr-2 text-primary"></i> {{ __('signout') }}
                    </a>
                </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="fa fa-bars"></span>
        </button>
    </div>
</nav>
