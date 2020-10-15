@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.auth.register_box_title'))

@section('content')
<main>
    <!-- Hero Start-->
    <div class="slider-area slider-bg ">
        <div class="single-slider d-flex align-items-center slider-height2 ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center pt-50">
                            <h2>Register User</h2>
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
        <div class="container ">
            <div class="row">
                <div class="col-12">
                    <h2 class="contact-title">Register</h2>
                </div>
                <div class="col-lg-12">

                    <div class="col col-sm-12 align-self-center">

                        <!--card-header-->


                        {{ html()->form('POST', route('frontend.auth.register.post'))->class('form-contact contact_form')->open() }}
                        <div class="row">
                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.first_name'))->for('first_name') }}

                                    {{ html()->text('first_name')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.first_name'))
                                        ->attribute('maxlength', 191)
                                        ->required()}}
                                </div>
                                <!--col-->
                            </div>
                            <!--row-->

                            <div class="col-12 col-md-6">
                                <div class="form-group">
                                    {{ html()->label(__('validation.attributes.frontend.last_name'))->for('last_name') }}

                                    {{ html()->text('last_name')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.last_name'))
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
                                    {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

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
                                    {{ html()->label(__('validation.attributes.frontend.password'))->for('password') }}

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
                                    {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->for('password_confirmation') }}

                                    {{ html()->password('password_confirmation')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                                        ->required() }}
                                </div>
                                <!--form-group-->
                            </div>
                            <!--col-->
                        </div>
                        <!--row-->

                        @if(config('access.captcha.registration'))
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
                                <div class="form-group mb-0 clearfix">
                                    {{ form_submit(__('labels.frontend.auth.register_button'))->class('button button-contactForm boxed-btn')->style('color:white !important;') }}
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
                            <!--/ .col -->
                        </div><!-- / .row -->

                    </div><!-- col-md-12 -->
                </div>
            </div>
        </div>
    </section>
</main>
@endsection

@push('after-scripts')
@if(config('access.captcha.registration'))
@captchaScripts
@endif
@endpush