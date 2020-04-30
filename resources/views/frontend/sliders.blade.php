@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')



    <section class="section-content padding-bottom">
        <div class="container">
            <h4 class="title-text">Basic bootstrap sliders</h4>

            <div class="row">
                <aside class="col-md-12">
                    <!-- ================== 1-carousel bootstrap  ==================  -->
                    <div id="carousel1_indicator" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carousel1_indicator" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel1_indicator" data-slide-to="1"></li>
                            <li data-target="#carousel1_indicator" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="images/banners/slide1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/banners/slide2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="images/banners/slide3.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carousel1_indicator" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carousel1_indicator" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                    <!-- ==================  1-carousel bootstrap ==================  .// -->
                </aside> <!-- col.// -->

            </div> <!-- row.// -->


            <h4 class="title-text">Owl slider items</h4>
            <!-- ============== owl slide items  ============= -->
            <div class="owl-carousel owl-init slide-items" data-items="5" data-margin="20" data-dots="true"
                data-nav="true">
                <div class="item-slide">
                    <figure class="card card-product">
                        <span class="badge-new"> NEW </span>
                        <div class="img-wrap"> <img src="images/items/1.jpg"> </div>
                        <figcaption class="info-wrap text-center">
                            <h6 class="title text-truncate"><a href="#">First item name</a></h6>
                        </figcaption>
                    </figure> <!-- card // -->
                </div>

            </div>
            <!-- ============== owl slide items .end // ============= -->


            <h4 class="title-text">Slick slider items</h4>
            <!-- ============== slick slide items  ============= -->
            <div class="slick-slider" data-slick='{"slidesToShow": 5, "slidesToScroll": 1}'>
                <div class="item-slide p-2">
                    <figure class="card card-product">
                        <span class="badge-new"> NEW </span>
                        <div class="img-wrap"> <img src="images/items/1.jpg"> </div>
                        <figcaption class="info-wrap text-center">
                            <h6 class="title text-truncate"><a href="#">First item name</a></h6>
                        </figcaption>
                    </figure> <!-- card // -->
                </div>
            </div>
            <!-- ============== slick slide items .end // ============= -->

        </div> <!-- container .//  -->
    </section>
    <!-- ========================= SECTION CONTENT END// ========================= -->
@endsection
