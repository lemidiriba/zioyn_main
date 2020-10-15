@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.login_box_title'))

@section('content')
<main>

    <!-- Hero Start-->
    <div class="slider-area slider-bg ">
        <div class="single-slider d-flex align-items-center slider-height2 ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center pt-50">
                            <h2>Sign in</h2>
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
    <section class="contact-section mt-1 pt-1 pb-0 mb-0">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-12">
                    <h2 class="contact-title"></h2>
                </div>
                <div class="col-lg-6 align-self-center">
                    <div>


                        {{ html()->form('POST', route('frontend.auth.login.post'))->open() }}
                        <div class="row">
                            <div class="col">
                                <div class="form-group">

                                    {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required() }}
                                </div>
                                <!--form-group-->
                            </div>
                            <!--col-->
                        </div>
                        <!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">

                                    {{ html()->password('password')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password'))
                                        ->required() }}
                                </div>
                                <!--form-group-->
                            </div>
                            <!--col-->
                        </div>
                        <!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="checkbox">
                                        {{ html()->label(html()->checkbox('remember', true, 1) . ' ' . __('labels.frontend.auth.remember_me'))->for('remember') }}
                                    </div>
                                </div>
                                <!--form-group-->
                            </div>
                            <!--col-->
                        </div>
                        <!--row-->

                        <div class="row">
                            <div class="col">
                                <div class="form-group clearfix">
                                    {{ form_submit(__('labels.frontend.auth.login_button'))->class('button button-contactForm boxed-btn')->style('color:white !important;') }}
                                </div>
                                <!--form-group-->
                            </div>
                            <!--col-->
                        </div>
                        <!--row-->

                        @if(config('access.captcha.login'))
                        <div class="row">
                            <div class="col">
                                @captcha
                                {{ html()->hidden('captcha_status', 'true') }}
                            </div>
                            <!--col-->
                        </div>
                        <!--row-->
                        @endif

                        <div class="row">
                            <div class="col">
                                <div class="form-group text-right">
                                    <a
                                        href="{{ route('frontend.auth.password.reset') }}">@lang('labels.frontend.passwords.forgot_password')</a>
                                </div>
                                <!--form-group-->
                            </div>
                            <!--col-->
                        </div>
                        <!--row-->
                        {{ html()->form()->close() }}

                        <div class="row">
                            <div class="col">
                                <div class="text-center">
                                    @include('frontend.auth.includes.socialite')
                                </div>
                            </div>
                            <!--col-->
                        </div>
                        <!--row-->
                    </div>
                    <!--card body-->
                </div>


            </div>
    </section>
</main>
@endsection

@push('after-scripts')
@if(config('access.captcha.login'))
@captchaScripts
@endif
@endpush