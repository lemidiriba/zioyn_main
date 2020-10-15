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
                            <h2>Reser Password</h2>
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
                    <div class="row justify-content-center align-items-center">
                        <div class="col col-sm-6 align-self-center">
                            <div class="card">
                                <div class="card-header">
                                    <strong>

                                    </strong>
                                </div>
                                <!--card-header-->

                                <div class="card-body">

                                    @if(session('status'))
                                    <div class="alert alert-success">
                                        {{ session('status') }}
                                    </div>
                                    @endif

                                    {{ html()->form('POST', route('frontend.auth.password.reset'))->class('form-horizontal')->open() }}
                                    {{ html()->hidden('token', $token) }}

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

                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group mb-0 clearfix">
                                                {{ form_submit(__('labels.frontend.passwords.reset_password_button')) }}
                                            </div>
                                            <!--form-group-->
                                        </div>
                                        <!--col-->
                                    </div>
                                    <!--row-->
                                    {{ html()->form()->close() }}
                                </div><!-- card-body -->
                            </div><!-- card -->
                        </div><!-- col-6 -->
                    </div><!-- row -->
                </div>
            </div>
        </div>
    </section>
</main>
@endsection