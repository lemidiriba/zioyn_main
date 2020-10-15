@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')




<main>

    <!-- Slider Area Start-->
    <div class="slider-area slider-bg ">
        <div class="slider-active dot-style">
            <div class="single-slider d-flex align-items-center slider-height ">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6 col-md-9 ">
                            <div class="hero__caption">
                                <h1 data-animation="fadeInLeft" data-delay=".3s">Ziyon <br> Stay Home Be Safe digital
                                    library
                                </h1>
                                <p data-animation="fadeInLeft" data-delay=".6s">Preparing responsible citizens and
                                    effective leaders.</p>
                                <!-- Slider btn -->
                                <div class="col-xl-12">
                                    <!-- Search Box -->
                                    <form action="{{ route('frontend.search') }}" class="search-box">
                                        <div class="input-form">
                                            <input name="searchword" type="text"
                                                placeholder="Search School By Name Here!">
                                        </div>

                                        <button class="btn search-form"
                                            style="border-top-left-radius: 0px !important;overflow: hidden;
                                        border-bottom-left-radius: 0px !important;width:35% !important; background: #eb566c; " role="button"
                                            type="submit">search now</button>
                                    </form>
                                    <!-- Search Box End-->
                                </div>
                                {{-- <div class="slider-btns">
                                    <!-- Hero-btn -->
                                    <a data-animation="fadeInLeft" data-delay="1s" href="industries.html"
                                        class="btn radius-btn">get started</a>
                                </div> --}}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="hero__img d-none d-lg-block f-right">
                                <img src="{{ asset('../img/hero/hero_right.webp') }}" alt="" data-animation="fadeInRight"
                                    data-delay="1s">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- Slider Shape -->
        <div class="slider-shape d-none d-lg-block">
            <img class="slider-shape1" src="{{ asset('/img/hero/top-left-shape.png') }}" alt="">
            <img class="slider-shape2" src="{{ asset('/img/hero/right-top-shape.png') }}" alt="">
            <img class="slider-shape3" src="{{ asset('/img/hero/left-botom-shape.png') }}" alt="">
        </div>
        <!-- slider Social -->
        {{-- <div class="slider-social d-none d-md-block">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fas fa-globe"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
        </div> --}}

    </div>
    <!-- Slider Area End -->
    <!--Services Area Start -->
    <div class="services-area section-padding30 fix">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center mb-100">
                        <span>Oue Best Services</span>
                        <h2>What we have for you</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="services-wrapper mb-50">
                        <div class="single-services">
                            <div class="services-icon">
                                <span class="fa fa-book"></span>
                            </div>
                            <div class="services-cap">
                                <h3><a href="services.html">Original School Material</a></h3>
                                <p>Provide you all the school materials that are posted by your school administration, right from your school</p>
                                {{-- <a href="services.html" class="get-btn"><i class="ti-arrow-right"></i> get
                                    started</a> --}}
                            </div>
                        </div>
                        <div class="services-shape">
                            <span>.01</span>
                            <img src="{{ asset('/img/gallery/shape-services.png') }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-8 col-sm-10">
                    <div class="services-wrapper mb-50">
                        <div class="single-services">
                            <div class="services-icon">
                                <span class="fa fa-home"></span>
                            </div>
                            <div class="services-cap">
                                <h3><a href="services.html">Advanced School Resource</a></h3>
                                <p>Any kind of student can get access from several Schools for futher stydy!</p>
                                {{-- <a href="services.html" class="get-btn"><i class="ti-arrow-right"></i> get
                                    started</a> --}}
                            </div>
                        </div>
                        <div class="services-shape">
                            <span>.02</span>
                            <img src="{{ asset('/img/gallery/shape-services.png') }}" alt="">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- Services Area End -->
    <!-- Search domain Start -->
    <section class="search-domain-area section-bg pt-140 pb-140"
        data-background="{{ asset('/img/gallery/section_bg02.webp') }}">
        <div class="container">
            <div class="row align-items-end mb-80">
                <div class="col-xl-4">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle2">
                        <span>Get your Material</span>
                        <h2>Search school material you want</h2>
                    </div>
                </div>
                <div class="col-xl-8">
                    <!-- Search Box -->
                    <form action="{{ route('frontend.search') }}" class="search-box">
                        <div class="input-form">
                            <input name="searchword" type="text" placeholder="Search your School name here">
                        </div>

                        <button class="btn search-form" style="border-top-left-radius: 0px !important;overflow: hidden;
                        border-bottom-left-radius: 0px !important;width:35% !important; background: #eb566c; "
                            role="button" type="submit">search now</button>
                    </form>
                    <!-- Search Box End-->
                </div>
            </div>
            {{-- <!-- Domain List -->
            <div class="row">
                <div class="domain-list">
                    <div class="single-domain">
                        <span>.com</span>
                        <p>$3.99/Year</p>
                    </div>
                    <div class="single-domain">
                        <span>.net</span>
                        <p>$2.99/Year</p>
                    </div>
                    <div class="single-domain">
                        <span>.com</span>
                        <p>$3.99/Year</p>
                    </div>
                    <div class="single-domain">
                        <span>.co</span>
                        <p>$5.99/Year</p>
                    </div>
                    <div class="single-domain">
                        <span>.org</span>
                        <p>$2.99/Year</p>
                    </div>
                    <div class="single-domain">
                        <span>.live</span>
                        <p>$1.99/Year</p>
                    </div>
                </div>
            </div>
            <!-- Domain List  End--> --}}
        </div>
    </section>
    <!-- Search domain End -->
    <!--All startups Start -->
    <section class="all-starups-area section-padding2">
        <!-- left Contents -->
        <div class="starups">
            <div class="starups-details">
                <!-- Section Tittle -->
                <div class="section-tittle section-tittle3">
                    <span>Get your Book</span>
                    <h2>We are with you every step of the way</h2>
                </div>
                <!-- details caption -->
                <div class="details-caption">
                    <p>Studying can become an appealing and proactive experience for students. You can share the following studying strategies and tips as suggestions to help make that happen for all students.</p>
                    <ul>
                        <li>Link to the Real World</li>
                        <li>Encourage Group Communication</li>
                        <li>Find Out How They Learn Best</li>
                        <li>Focus on Exploration and Problem Solving</li>
                        <li>Have Students Teach Each Other</li>
                        </ul>
                    
                </div>
                <a href="{{ route('frontend.student') }}" class="btn">get started</a>
            </div>
        </div>
        <!--Right Contents  -->
        <div class="starups-img">
            <img src="{{ asset('/img/gallery/visit_bg.webp') }}" alt="">
        </div>
    </section>
    <!--All startups End -->
    <!-- work company Start-->
    <section class="work-company">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <!-- Section Tittle -->
                    <div class="section-tittle section-tittle3">
                        <span>Get your Book</span>
                        <h2>We are with you every step of the way</h2>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="logo-area">
                        <div class="row">
                           
                           
                            
                            
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="single-logo">
                                    <img src="{{ asset('/img/gallery/cisco_brand5.png') }}" alt="">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- work company End-->

    <!-- Testimonial Start -->
    <div class="testimonial-area testimonial-padding">
        <div class="container ">
            <div class="row align-items-center">
                <div class="col-lg-7 col-md-7">
                    <div class="h1-testimonial-active">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center mb-30">
                                    <div class="founder-img">
                                        <img src="{{ asset('/img/testmonial/Homepage_testi.png') }}" alt="">
                                    </div>
                                    <div class="founder-text">
                                        <span>Willi Diriba</span>
                                        <p>Student, Getesemane School</p>
                                    </div>
                                </div>
                                <div class="testimonial-top-cap">
                                    <p>I found it eassy to use and it is very use full during this Covid padmic, I recomand every studnt shuld us it get good use form it.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <!--<div class="single-testimonial">-->
                            <!-- Testimonial Content -->
                        <!--    <div class="testimonial-caption ">-->
                                <!-- founder -->
                        <!--        <div class="testimonial-founder d-flex align-items-center mb-30">-->
                        <!--            <div class="founder-img">-->
                        <!--                <img src="{{ asset('/img/testmonial/Homepage_testi.png') }}" alt="">-->
                        <!--            </div>-->
                        <!--            <div class="founder-text">-->
                        <!--                <span>Liyu Demisse</span>-->
                        <!--                <p>CEO, Zioyn</p>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <div class="testimonial-top-cap">-->
                        <!--            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod-->
                        <!--                tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse-->
                        <!--                ultrice.</p>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
                <div class="col-lg-5 col-md-5">
                    <div class="testimonial-banner">
                        <img src="{{ asset('/img/gallery/testimonail.webp') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
        <!-- Shape -->
        <img src="{{ asset('/img/testmonial/shape-testimonial.webp') }}" class="testimonial-shape d-none d-lg-block"
            alt="">
    </div>
    <!-- Testimonial End -->
    <!-- Support Area Start -->
    <section class="support-area section-bg pt-150 pb-150"
        data-background="{{ asset('./img/gallery/section_bg03.webp') }}">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5">
                    <div class="support-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle5">
                            <span>Get your Book</span>
                            <h2>24/7 Support</h2>
                            <p class="support-details">Our expert team is always on hand to help answer your
                                questions, get you started, and grow your presence online. You can call, chat or
                                email us any time!</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="support-number">
                        <!-- Single contact -->
                        <div class="single-contact text-center">
                            <div class="contact-icon">
                                <i class="fas fa-phone-volume"></i>
                            </div>
                            <div class="contact-number text-wrap">
                                <span>09 111 130 99</span>
                            </div>
                        </div>
                        <!-- Single contact -->
                        <div class="single-contact text-center">
                            <div class="contact-icon">
                                <i class="far fa-comment"></i>
                            </div>
                            <div class="contact-number ">
                                <span c>liyu@zioyn.com</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Support Area End -->
    {{-- <!-- Blog Area Start -->
    <section class="blogs-area section-padding30">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle text-center mb-80">
                        <span>Our Blog</span>
                        <h2>Our latest news</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-blogs mb-100">
                        <div class="blog-img">
                            <img src="{{ asset('/img/gallery/blog1.png') }}" alt="">
    </div>
    <div class="blog-cap">
        <span class="color1">23 Dec, 2020</span>
        <h4><a href="#">Addiction When Gambling Becomes</a></h4>
    </div>
    </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="single-blogs mb-100">
            <div class="blog-img">
                <img src="{{ asset('/img/gallery/blog2.png') }}" alt="">
            </div>
            <div class="blog-cap">
                <span class="color1">23 Dec, 2020</span>
                <h4><a href="#">Addiction When Gambling Becomes</a></h4>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="single-blogs mb-100">
            <div class="blog-img">
                <img src="{{ asset('/img/gallery/blog3.png') }}" alt="">
            </div>
            <div class="blog-cap">
                <span class="color1">23 Dec, 2020</span>
                <h4><a href="#">Addiction When Gambling Becomes</a></h4>
            </div>
        </div>
    </div>
    </div>
    </div>
    </section>
    <!-- Blog Area End --> --}}

</main>

<!-- Scroll Up -->
<div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>






{{-- <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-home"></i> @lang('navs.general.home')
                </div>
                <div class="card-body">
                    @lang('strings.frontend.welcome_to', ['place' => app_name()])
                </div>
            </div><!--card-->
        </div><!--col-->
    </div><!--row-->

    <div class="row mb-4">
        <div class="col">
            <example-component></example-component>
        </div><!--col-->
    </div><!--row-->

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fab fa-font-awesome-flag"></i> Font Awesome @lang('strings.frontend.test')
                </div>
                <div class="card-body">
                    <i class="fas fa-home"></i>
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-pinterest"></i>
                </div><!--card-body-->
            </div><!--card-->
        </div><!--col-->
    </div><!--row--> --}}
@endsection