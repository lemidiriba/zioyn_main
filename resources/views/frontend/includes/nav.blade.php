<header>
    <!-- Header Start -->
    <div class="header-area header-transparent" style="background-color:#020230;">
        <div class="main-header">
            <div class="header-bottom  header-sticky">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <!-- Logo -->
                        <div class="col-xl-2 col-lg-1 col-md-1">
                            <div class="logo">
                                <a href="{{ route('frontend.index') }}"><img src="{{ asset('/img/logo/logo1.png') }}"
                                        alt=""> Zioyn</a>
                            </div>
                        </div>
                        <div class="col-xl-10 col-lg-10 col-md-10">
                            <!-- Main-menu -->
                            <div class="main-menu f-right d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a href="{{ route('frontend.index') }}">Home</a></li>
                                        <li><a href="{{ route('frontend.student') }}">Student</a></li>


                                        {{-- <!--<ul class="submenu">-->
                                        <!--    <li><a href="blog.html">Blog</a></li>-->
                                        <!--    <li><a href="blog_details.html">Blog Details</a></li>-->
                                        <!--</ul>--> --}}
                                        </li>
                                        <li><a href="{{ route("blogetc.index") }}">Blogs</a></li>
                                        <li><a href="{{route('frontend.contact')}}">Contact</a></li>
                                        @auth
                                        <li class="nav-item"><a href="{{route('frontend.user.dashboard')}}"
                                                class="nav-link {{ active_class(Route::is('frontend.user.dashboard')) }}">@lang('navs.frontend.dashboard')</a>
                                        </li>
                                        @endauth

                                        @guest
                                        <li class="nav-item"><a href="{{route('frontend.auth.login')}}"
                                                class="nav-link {{ active_class(Route::is('frontend.auth.login')) }}">@lang('navs.frontend.login')</a>
                                        </li>

                                        @if(config('access.registration'))
                                        <li class="nav-item"><a href="{{route('frontend.auth.register')}}"
                                                class="nav-link {{ active_class(Route::is('frontend.auth.register')) }}">@lang('navs.frontend.register')</a>
                                        </li>
                                        @endif
                                        @else
                                        <li class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownMenuUser"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">{{ $logged_in_user->name }}</a>

                                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuUser">
                                                @can('view backend')
                                                <a style="padding:18px 19px !important;" href="{{ route('admin.dashboard') }}"
                                                    class="dropdown-item text-black-50" >@lang('navs.frontend.user.administration')</a>
                                                    <a style="padding:18px 19px !important;" href="{{ route('blogetc.admin.index') }}"
                                                    class="dropdown-item text-black-50" >Blog Admin</a>
                                                   
                                                @endcan

                                                <a style="padding:18px 19px !important;" href="{{ route('frontend.user.account') }}"
                                                    class="dropdown-item text-black-50 {{ active_class(Route::is('frontend.user.account')) }}">@lang('navs.frontend.user.account')</a>
                                                <a style="padding:18px 19px !important;" href="{{ route('frontend.auth.logout') }}"
                                                    class="dropdown-item text-black-50">@lang('navs.general.logout')</a>
                                            </div>
                                        </li>
                                        @endguest
                                        <li><a href="{{ route('frontend.about') }}">About</a></li>

                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <!--<div class="col-xl-2 col-lg-3 col-md-3">-->
                        <!--    <div class="header-right-btn f-right d-none d-lg-block">-->
                        <!--        <a href="#" class="btn header-btn">-->
                        <!-- iocn -->
                        <!--            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"-->
                        <!--                width="22px" height="25px">-->
                        <!--                <path fill-rule="evenodd" fill="rgb(255, 255, 255)"-->
                        <!--                    d="M17.433,17.550 C20.041,18.419 21.933,21.164 21.933,24.076 C21.933,24.336 21.722,24.547 21.461,24.547 L0.704,24.547 C0.443,24.547 0.232,24.336 0.232,24.076 C0.232,21.164 2.124,18.419 4.731,17.550 L6.974,16.802 L7.778,15.193 C7.707,15.121 7.637,15.047 7.570,14.970 C7.248,14.600 6.984,14.188 6.779,13.744 L6.365,13.744 C5.584,13.744 4.949,13.109 4.949,12.329 L4.949,11.776 C4.400,11.581 4.006,11.057 4.006,10.442 L4.006,7.470 C4.006,3.559 7.170,0.393 11.082,0.393 C14.984,0.393 18.159,3.568 18.159,7.470 L18.159,10.442 C18.159,11.223 17.524,11.857 16.744,11.857 L15.885,11.857 L15.785,12.459 C15.615,13.477 15.111,14.455 14.386,15.192 L15.191,16.802 L17.433,17.550 ZM10.443,22.156 L11.082,23.184 C11.755,22.105 11.722,22.154 11.745,22.122 C12.128,21.613 12.485,21.078 12.812,20.528 L11.039,18.755 L9.357,20.535 C9.681,21.080 10.038,21.613 10.420,22.122 C10.428,22.134 10.435,22.145 10.443,22.156 ZM11.020,17.402 L11.854,16.521 C11.599,16.562 11.340,16.584 11.082,16.584 C10.753,16.584 10.423,16.550 10.099,16.481 L11.020,17.402 ZM8.381,16.097 L7.819,17.222 C8.109,18.061 8.463,18.882 8.875,19.671 L10.372,18.088 L8.381,16.097 ZM11.688,18.069 L13.289,19.671 C13.701,18.884 14.055,18.063 14.346,17.222 L13.704,15.938 L11.688,18.069 ZM7.016,17.783 L5.030,18.445 C2.936,19.143 1.381,21.267 1.194,23.604 L10.233,23.604 L9.652,22.672 C9.181,22.042 8.747,21.379 8.361,20.700 C8.360,20.699 8.359,20.698 8.358,20.696 C7.830,19.767 7.379,18.789 7.016,17.783 ZM5.893,12.329 C5.893,12.589 6.105,12.801 6.365,12.801 L6.450,12.801 C6.423,12.688 6.399,12.574 6.380,12.459 L6.280,11.857 L5.893,11.857 L5.893,12.329 ZM4.949,10.442 C4.949,10.702 5.161,10.914 5.421,10.914 L6.141,10.914 C6.024,10.005 5.945,9.042 5.912,8.096 C5.912,8.095 5.912,8.095 5.912,8.095 C5.912,8.093 5.912,8.092 5.912,8.090 C5.910,8.040 5.909,7.991 5.907,7.941 L4.949,7.941 L4.949,10.442 ZM16.744,10.914 C17.004,10.914 17.215,10.702 17.215,10.442 L17.215,7.941 L16.258,7.941 C16.257,7.969 16.256,7.995 16.255,8.022 C16.223,8.996 16.143,9.985 16.023,10.914 L16.744,10.914 ZM16.271,6.998 L17.197,6.998 C16.956,3.836 14.305,1.337 11.082,1.337 C7.845,1.337 5.206,3.836 4.967,6.998 L5.894,6.998 C5.928,4.393 8.049,2.281 10.660,2.281 L11.505,2.281 C14.115,2.281 16.237,4.393 16.271,6.998 ZM15.328,7.065 C15.329,4.953 13.618,3.224 11.505,3.224 L10.660,3.224 C8.679,3.224 7.055,4.742 6.857,6.663 C7.659,5.688 8.872,5.111 10.139,5.111 C10.264,5.111 10.384,5.160 10.472,5.249 C11.618,6.394 13.131,7.151 14.734,7.380 L15.324,7.464 C15.324,7.463 15.324,7.461 15.324,7.460 C15.327,7.342 15.328,7.213 15.328,7.065 ZM14.854,12.304 C14.941,11.778 14.975,11.590 15.018,11.298 C15.018,11.297 15.018,11.297 15.018,11.297 C15.154,10.387 15.249,9.398 15.296,8.413 L14.601,8.314 C12.865,8.066 11.222,7.268 9.952,6.060 C8.987,6.115 8.080,6.598 7.497,7.375 L6.862,8.222 C6.922,9.703 7.192,12.015 7.428,12.801 L8.804,12.801 C8.993,12.263 9.510,11.857 10.139,11.857 L11.082,11.857 C11.863,11.857 12.498,12.492 12.498,13.273 C12.498,14.054 11.864,14.688 11.082,14.688 L10.139,14.688 C9.524,14.688 8.999,14.293 8.805,13.744 L7.843,13.744 C8.388,14.658 9.233,15.296 10.155,15.526 C10.762,15.678 11.402,15.678 12.010,15.526 C13.486,15.157 14.604,13.802 14.854,12.304 ZM9.667,13.273 C9.667,13.533 9.879,13.744 10.139,13.744 L11.082,13.744 C11.343,13.744 11.554,13.533 11.554,13.273 C11.554,13.012 11.342,12.801 11.082,12.801 L10.139,12.801 C9.878,12.801 9.667,13.012 9.667,13.273 ZM13.820,20.671 C13.820,20.671 13.820,20.672 13.820,20.672 C13.817,20.677 13.815,20.681 13.813,20.685 C13.423,21.372 12.985,22.040 12.512,22.672 L11.932,23.604 L20.970,23.604 C20.784,21.267 19.228,19.143 17.135,18.445 L15.149,17.783 C14.788,18.781 14.342,19.751 13.820,20.671 ZM16.272,20.019 C16.011,20.019 15.800,19.807 15.800,19.547 C15.800,19.287 16.011,19.075 16.272,19.075 C16.532,19.075 16.744,19.287 16.744,19.547 C16.744,19.807 16.532,20.019 16.272,20.019 ZM18.217,20.073 C18.776,20.503 19.237,21.064 19.553,21.695 C19.669,21.928 19.574,22.212 19.341,22.328 C19.109,22.444 18.825,22.350 18.708,22.116 C18.457,21.612 18.088,21.165 17.642,20.822 C17.435,20.663 17.397,20.366 17.556,20.160 C17.714,19.953 18.011,19.914 18.217,20.073 Z" />-->
                        <!--            </svg>(+251)911 113 099-->
                        <!--        </a>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!-- Mobile Menu -->
                        <div class="col-12">
                            <div class="mobile_menu d-block d-lg-none"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>