@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.passwords.reset_password_box_title'))

@section('content')
<main>
    <!-- Hero Start-->
    <div class="slider-area slider-bg ">
        <div class="single-slider d-flex align-items-center slider-height2 ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center pt-50">
                            <h2>Reset Password</h2>
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
                    <h2 class="contact-title">@lang('labels.frontend.passwords.reset_password_box_title')</h2>
                </div>
                <div class="col-lg-12">


                    @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    {{ html()->form('POST', route('frontend.auth.password.email.post'))->class('form-contact contact_form')->open() }}
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                {{ html()->label(__('validation.attributes.frontend.email'))->for('email') }}

                                {{ html()->email('email')
                                        ->class('form-control')
                                        ->placeholder(__('validation.attributes.frontend.email'))
                                        ->attribute('maxlength', 191)
                                        ->required()
                                        ->autofocus() }}
                            </div>
                            <!--form-group-->
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->

                    <div class="row">
                        <div class="col">
                            <div class="form-group mb-0 clearfix">
                                {{ form_submit(__('labels.frontend.passwords.send_password_reset_link_button'))->class('button button-contactForm boxed-btn')->style('color:white !important;') }}
                            </div>
                            <!--form-group-->
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->
                    {{ html()->form()->close() }}

                </div>
            </div>
        </div>
    </section>
</main>
@endsection