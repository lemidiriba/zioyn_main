<header class="section-header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/"><img class="logo" src="{{ asset('storage/img/frontend/logos/logo-alibaba.png') }}"
                    alt="Shemach style e-commerce html
                            template file" title="alibaba e-commerce html css theme"></a>

            <nav class="navbar navbar-expand-lg navbar-light ">


                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="@lang('labels.general.toggle_navigation')">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <!--@if(config('locale.status') && count(config('locale.languages')) > 1)-->
                        <!--<li class="nav-item dropdown">-->
                        <!--    <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLanguageLink"-->
                        <!--        data-toggle="dropdown" aria-haspopup="true"-->
                        <!--        aria-expanded="false">@lang('menus.language-picker.language')-->
                        <!--        ({{ strtoupper(app()->getLocale()) }})</a>-->

                        <!--    @include('includes.partials.lang')-->
                        <!--</li>-->
                        <!--@endif-->

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
                                <a href="{{ route('admin.dashboard') }}"
                                    class="dropdown-item">@lang('navs.frontend.user.administration')</a>
                                @endcan

                                <a href="{{ route('frontend.user.account') }}"
                                    class="dropdown-item {{ active_class(Route::is('frontend.user.account')) }}">@lang('navs.frontend.user.account')</a>
                                <a href="{{ route('frontend.auth.logout') }}"
                                    class="dropdown-item">@lang('navs.general.logout')</a>
                            </div>
                        </li>
                        @endguest

                        <li class="nav-item"><a href="{{route('frontend.contact')}}"
                                class="nav-link {{ active_class(Route::is('frontend.contact')) }}">@lang('navs.frontend.contact')</a>
                        </li>
                    </ul>
                </div>
            </nav>
            {{-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTop"
                aria-controls="navbarTop" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button> --}}

            {{-- <div class="collapse navbar-collapse" id="navbarTop">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item dropdown"><a href="#" class="nav-link
									dropdown-toggle" data-toggle="dropdown"> Sourcing </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Top Suppliers</a></li>
                            <li><a class="dropdown-item" href="#">Suppliers by Regions </a></li>
                            <li><a class="dropdown-item" href="#">Online Retailer </a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link
									dropdown-toggle" data-toggle="dropdown"> Services </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Trade Assurance </a></li>
                            <li><a class="dropdown-item" href="#">Arabic</a></li>
                            <li><a class="dropdown-item" href="#">Logistics Service </a></li>
                            <li><a class="dropdown-item" href="#">Membership Services</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link
									dropdown-toggle" data-toggle="dropdown"> Community </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Help Center</a></li>
                            <li><a class="dropdown-item" href="#">Submit a Dispute </a></li>
                            <li><a class="dropdown-item" href="#">For Suppliers </a></li>
                        </ul>
                    </li>
                </ul> --}}
            {{-- <ul class="navbar-nav">
                    <li class="nav-item"><a href="#" class="nav-link"> Multi Request </a></li>
                    <li class="nav-item"><a href="http://bootstrap-ecommerce.com/" class="nav-link"> Download </a></li>

                </ul> --}}
            <!-- navbar-nav.// -->
        </div>

        <!-- collapse.// -->
        </div>
    </nav>

    <section class="header-main shadow-sm">
        <div class="container">
            <div class="row-sm align-items-center">
                <div class="col-lg-4-24 col-sm-3">
                    <div class="category-wrap dropdown py-1">
                        <button type="button" class="btn btn-light dropdown-toggle" data-toggle="dropdown"><i
                                class="fa fa-bars"></i> Categories</button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Machinery / Mechanical Parts / Tools
                            </a>
                            <a class="dropdown-item" href="#">Consumer Electronics / Home
                                Appliances </a>
                            <a class="dropdown-item" href="#">Auto / Transportation</a>
                            <a class="dropdown-item" href="#">Apparel / Textiles / Timepieces </a>
                            <a class="dropdown-item" href="#">Home & Garden / Construction / Lights
                            </a>
                            <a class="dropdown-item" href="#">Beauty & Personal Care / Health </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-11-24 col-sm-8">
                    <form action="#" class="py-1">
                        <div class="input-group w-100">
                            <select class="custom-select" name="category_name">
                                <option value="">All type</option>
                                <option value="">Special</option>
                                <option value="">Only best</option>
                                <option value="">Latest</option>
                            </select>
                            <input type="text" class="form-control" style="width:50%;" placeholder="Search">
                            <div class="input-group-append">
                                <button class="btn btn-warning" type="submit">
                                    <i class="fa fa-search"></i> Search
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- search-wrap .end// -->
                </div>
                <!-- col.// -->
                <div class="col-lg-9-24 col-sm-12">
                    <div class="widgets-wrap float-right row no-gutters py-1">
                        <div class="col-auto">
                            {{-- <nav class="navbar navbar-expand-lg navbar-light ">


                                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="@lang('labels.general.toggle_navigation')">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                                    <ul class="navbar-nav">
                                        @if(config('locale.status') && count(config('locale.languages')) > 1)
                                        <li class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" id="navbarDropdownLanguageLink"
                                                data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">@lang('menus.language-picker.language')
                                                ({{ strtoupper(app()->getLocale()) }})</a>

                            @include('includes.partials.lang')
                            </li>
                            @endif

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
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="dropdown-item">@lang('navs.frontend.user.administration')</a>
                                    @endcan

                                    <a href="{{ route('frontend.user.account') }}"
                                        class="dropdown-item {{ active_class(Route::is('frontend.user.account')) }}">@lang('navs.frontend.user.account')</a>
                                    <a href="{{ route('frontend.auth.logout') }}"
                                        class="dropdown-item">@lang('navs.general.logout')</a>
                                </div>
                            </li>
                            @endguest

                            <li class="nav-item"><a href="{{route('frontend.contact')}}"
                                    class="nav-link {{ active_class(Route::is('frontend.contact')) }}">@lang('navs.frontend.contact')</a>
                            </li>
                            <li class="nav-item"><a href="{{route('frontend.contact')}}"
                                    class="nav-link {{ active_class(Route::is('frontend.contact')) }}">About</a>
                            </li>
                            </ul>
                        </div>
                        </nav> --}}
                        <!-- widget-header .// -->
                    </div>
                    <!-- col.// -->

                    <!-- col.// -->
                </div>
                <!-- widgets-wrap.// row.// -->
            </div>
            <!-- col.// -->
        </div>
        <!-- row.// -->
        </div>
        <!-- container.// -->
    </section>
    <!-- header-main .// -->
</header>
<!-- section-header.// -->
