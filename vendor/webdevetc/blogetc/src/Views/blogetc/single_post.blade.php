@extends("layouts.app",['title'=>$post->genSeoTitle()])
@section("content")
<!-- Hero Start-->
        <div class="slider-area slider-bg ">
            <div class="single-slider d-flex align-items-center slider-height2 ">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center pt-50">
                                <h2>Blog Detail</h2>
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
    {{--https://webdevetc.com/laravel/packages/blogetc-blog-system-for-your-laravel-app/help-documentation/laravel-blog-package-blogetc#guide_to_views--}}
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                @include("blogetc::partials.show_errors")
                @include("blogetc::partials.full_post_details")

                @if(config("blogetc.comments.type_of_comments_to_show","built_in") !== 'disabled')
                    <div id="maincommentscontainer">
                        <h2 class="text-center" id="blogetccomments">Comments</h2>
                        @include("blogetc::partials.show_comments")
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection

