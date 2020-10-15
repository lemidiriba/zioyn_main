@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')




<main>

    <!-- Hero Start-->
    <div class="slider-area slider-bg ">
        <div class="single-slider d-flex align-items-center slider-height2 ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center pt-50">
                            <h2>Services</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Slider Shape -->
        <div class="slider-shape d-none d-lg-block">
            <img class="slider-shape1" src="assets/img/hero/top-left-shape.png" alt="">
            <img class="slider-shape2" src="assets/img/hero/right-top-shape.png" alt="">
            <img class="slider-shape3" src="assets/img/hero/left-botom-shape.png" alt="">
        </div>
    </div>
    <!--Hero End -->

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
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-wrapper mb-50">
                        <div class="single-services">
                            <div class="services-icon">
                                <span class="flaticon-server"></span>
                            </div>
                            <div class="services-cap">
                                <h3><a href="services.html">Shared Hosting</a></h3>
                                <p>Hunky dory barney fannaround up the duff no biggie loo cup of tea jolly good
                                    ruddy!</p>
                                <a href="services.html" class="get-btn"><i class="ti-arrow-right"></i> get
                                    started</a>
                            </div>
                        </div>
                        <div class="services-shape">
                            <span>.01</span>
                            <img src="assets/img/gallery/shape-services.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-wrapper mb-50">
                        <div class="single-services">
                            <div class="services-icon">
                                <span class="flaticon-green"></span>
                            </div>
                            <div class="services-cap">
                                <h3><a href="services.html">Reseller Hosting</a></h3>
                                <p>Hunky dory barney fannaround up the duff no biggie loo cup of tea jolly good
                                    ruddy!</p>
                                <a href="services.html" class="get-btn"><i class="ti-arrow-right"></i> get
                                    started</a>
                            </div>
                        </div>
                        <div class="services-shape">
                            <span>.02</span>
                            <img src="assets/img/gallery/shape-services.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-wrapper mb-50">
                        <div class="single-services">
                            <div class="services-icon">
                                <span class="flaticon-servers"></span>
                            </div>
                            <div class="services-cap">
                                <h3><a href="services.html">Cloud Hosting</a></h3>
                                <p>Hunky dory barney fannaround up the duff no biggie loo cup of tea jolly good
                                    ruddy!</p>
                                <a href="services.html" class="get-btn"><i class="ti-arrow-right"></i> get
                                    started</a>
                            </div>
                        </div>
                        <div class="services-shape">
                            <span>.03</span>
                            <img src="assets/img/gallery/shape-services.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-wrapper mb-50">
                        <div class="single-services">
                            <div class="services-icon">
                                <span class="flaticon-servers"></span>
                            </div>
                            <div class="services-cap">
                                <h3><a href="services.html">Shared Hosting</a></h3>
                                <p>Hunky dory barney fannaround up the duff no biggie loo cup of tea jolly good
                                    ruddy!</p>
                                <a href="services.html" class="get-btn"><i class="ti-arrow-right"></i> get
                                    started</a>
                            </div>
                        </div>
                        <div class="services-shape">
                            <span>.04</span>
                            <img src="assets/img/gallery/shape-services.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-wrapper mb-50">
                        <div class="single-services">
                            <div class="services-icon">
                                <span class="flaticon-green"></span>
                            </div>
                            <div class="services-cap">
                                <h3><a href="services.html">Reseller Hosting</a></h3>
                                <p>Hunky dory barney fannaround up the duff no biggie loo cup of tea jolly good
                                    ruddy!</p>
                                <a href="services.html" class="get-btn"><i class="ti-arrow-right"></i> get
                                    started</a>
                            </div>
                        </div>
                        <div class="services-shape">
                            <span>.05</span>
                            <img src="assets/img/gallery/shape-services.png" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="services-wrapper mb-50">
                        <div class="single-services">
                            <div class="services-icon">
                                <span class="flaticon-server"></span>
                            </div>
                            <div class="services-cap">
                                <h3><a href="services.html">Cloud Hosting</a></h3>
                                <p>Hunky dory barney fannaround up the duff no biggie loo cup of tea jolly good
                                    ruddy!</p>
                                <a href="services.html" class="get-btn"><i class="ti-arrow-right"></i> get
                                    started</a>
                            </div>
                        </div>
                        <div class="services-shape">
                            <span>.06</span>
                            <img src="assets/img/gallery/shape-services.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services Area End -->

</main>

<!-- Scroll Up -->
<div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>


@endsection