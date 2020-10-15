@extends('frontend.layouts.app')

@section('content')
<main>

    <!-- Hero Start-->
    <div class="slider-area slider-bg ">
        <div class="single-slider d-flex align-items-center slider-height2 ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center pt-50">
                            <h2>My Account</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Shape -->
        <div class="slider-shape d-none d-lg-block">
            <img class="slider-shape1" src="{{ asset('./img/hero/top-left-shape.png') }}" alt="">
            <img class="slider-shape2" src="{{ asset('./img/hero/right-top-shape.png') }}" alt="">
            <img class="slider-shape3" src="{{ asset('./img/hero/left-botom-shape.png') }}" alt="">
        </div>
    </div>
    <!--Hero End -->
    <section class="contact-section mt-1 pt-1">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Account</h2>
                </div>
                <div class="col-lg-12">




                    <div role="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item">
                                <a href="#profile" class="nav-link active" aria-controls="profile" role="tab"
                                    data-toggle="tab" style="color:black;">@lang('navs.frontend.user.profile')</a>
                            </li>

                            <li class="nav-item">
                                <a href="#edit" class="nav-link" aria-controls="edit" role="tab" data-toggle="tab"
                                    style="color:black;">@lang('labels.frontend.user.profile.update_information')</a>
                            </li>

                            @if($logged_in_user->canChangePassword())
                            <li class="nav-item">
                                <a href="#password" class="nav-link" aria-controls="password" role="tab"
                                    data-toggle="tab"
                                    style="color:black;">@lang('navs.frontend.user.change_password')</a>
                            </li>
                            @endif
                        </ul>

                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active pt-3" id="profile"
                                aria-labelledby="profile-tab">
                                @include('frontend.user.account.tabs.profile')
                            </div>
                            <!--tab panel profile-->

                            <div role="tabpanel" class="tab-pane fade show pt-3" id="edit" aria-labelledby="edit-tab">
                                @include('frontend.user.account.tabs.edit')
                            </div>
                            <!--tab panel profile-->

                            @if($logged_in_user->canChangePassword())
                            <div role="tabpanel" class="tab-pane fade show pt-3" id="password"
                                aria-labelledby="password-tab">
                                @include('frontend.user.account.tabs.change-password')
                            </div>
                            <!--tab panel change password-->
                            @endif
                        </div>
                        <!--tab content-->
                    </div>
                    <!--tab panel-->

                </div><!-- row -->
            </div>

        </div>
    </section>
</main>
@endsection