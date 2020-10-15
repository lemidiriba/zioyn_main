@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('labels.frontend.contact.box_title'))

@section('content')
<main>

    <!-- Hero Start-->
    <div class="slider-area slider-bg ">
        <div class="single-slider d-flex align-items-center slider-height2 ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center pt-50">
                            <h2>Contact us</h2>
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
                    <h2 class="contact-title">Get in Touch</h2>
                </div>
                <div class="col-lg-8">
                    {{-- <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate"> --}}
                    {{ html()->form('POST', route('frontend.contact.send'))->class('form-contact contact_form')->open() }}

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">

                                {{ html()->textarea('message')
                                                                            ->class('form-control')
                                                                            ->placeholder(__('validation.attributes.frontend.message'))
                                                                            ->attribute('rows', 3)
                                                                            ->required() }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">

                                {{ html()->text('name', optional(auth()->user())->name)
                                                                            ->class('form-control')
                                                                            ->placeholder(__('validation.attributes.frontend.name'))
                                                                            ->attribute('maxlength', 191)
                                                                            ->required()
                                                                            ->autofocus() }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">

                                {{ html()->email('email', optional(auth()->user())->email)
                                                                        ->class('form-control')
                                                                        ->placeholder(__('validation.attributes.frontend.email'))
                                                                        ->attribute('maxlength', 191)
                                                                        ->required() }}
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">

                                {{ html()->text('phone')
                                                                            ->class('form-control')
                                                                            ->placeholder(__('validation.attributes.frontend.phone'))
                                                                            ->attribute('maxlength', 191)
                                                                            ->required() }}
                            </div>
                        </div>
                    </div>
                    @if(config('access.captcha.contact'))
                    <div class="row">
                        <div class="col">
                            @captcha
                            {{ html()->hidden('captcha_status', 'true') }}
                        </div>
                        <!--col-->
                    </div>
                    <!--row-->
                    @endif
                    <div class="form-group mt-3">
                        {{ form_submit(__('labels.frontend.contact.button'))->class('button button-contactForm boxed-btn')->style('color:white !important;') }}
                        {{-- <button type="submit" class="button button-contactForm boxed-btn">Send</button> --}}
                    </div>
                    {{ html()->form()->close() }}
                </div>


                <div class="col-lg-3 offset-lg-1">
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-home"></i></span>
                        <div class="media-body">
                            <h3>Adiss Abeba, Mesico.</h3>
                            <p>Rosemead, CA 91770</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                        <div class="media-body">
                            <h3>+251 911 113 099</h3>
                            <h3>+251 920 573 344 </h3>
                            <p>Mon to Fri 9am to 6pm</p>
                        </div>
                    </div>
                    <div class="media contact-info">
                        <span class="contact-info__icon"><i class="ti-email"></i></span>
                        <div class="media-body">
                            <h3>info@zioyn.com</h3>
                            <p>Send us your query anytime!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--row-->
    </section>
</main>
@endsection

@push('after-scripts')
@if(config('access.captcha.contact'))
@captchaScripts
@endif
@endpush