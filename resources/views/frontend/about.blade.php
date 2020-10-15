@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' .'About')

@section('content')
<main>

    <!-- Hero Start-->
    <div class="slider-area slider-bg ">
        <div class="single-slider d-flex align-items-center slider-height2 ">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center pt-50">
                            <h2>About us</h2>
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
    <!--All startups Start -->
    <section class="all-starups-area pt-2 mt-2 pb-2 mb-2">
        <!-- left Contents -->
        <div class="starups">
            <div class="starups-details">
                <!-- Section Tittle -->
                <div class="section-tittle section-tittle3">
                    <span>Get your Book</span>
                    <h2>Stay Home Be Safe! digital library</h2>
                </div>
                <!-- details caption -->
                <div class="details-caption">
                    <p>Welcome to zioyn, your number one source for all School Education Material. We're dedicated to giving you the very best of hand outs, with a focus on right from the school and form primery resources.

Founded in 2019 by Liyu Demisse and Lemi Diriba, zioyn has come a long way from its beginnings in Sebeta. </br> When we first started out, our passion for fast and reliable school study materia drove them to put on hold our day job, do tons of research.

so that zioyn can offer you resources right from the orign. We now serve customers all over Ethiopia, and are thrilled that we're able to turn our passion into our own website.

,</p>
                    <p>
                        we hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.

Sincerely
                    </p>
                </div>
                <a href="{{ route('frontend.contact') }}" class="btn">Contact us</a>
            </div>
        </div>
        <!--Right Contents  -->
        <div class="starups-img">
            <img src="{{ asset('./img/gallery/visit_bg.jpg') }}" alt="">
        </div>
    </section>
    <!--All startups End -->



</main>
@endsection