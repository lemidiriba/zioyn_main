@extends("frontend.layouts.app",['title'=>$title])
@section("content")
<!-- Hero Start-->
        <div class="slider-area slider-bg ">
            <div class="single-slider d-flex align-items-center slider-height2 ">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center pt-50">
                                <h2>Single Blog</h2>
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
        <section class="blog_area section-padding">
        <div class="container">
    <div class="row">
        <div class="col-sm-10 blogetc_container">
            @can(\WebDevEtc\BlogEtc\Gates\GateTypes::MANAGE_BLOG_ADMIN)
                <div class="float-right">
                   
                  
                        <a href="{{route("blogetc.admin.index")}}"
                           class="btn " style="padding: 8px !important; background-color: #f32a48 !important; color:white !important; margin: 10px !important;">
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                            Blog Panel
                        </a>
                    
                </div>
            @endcan

            @if(isset($blogetc_category) && $blogetc_category)
                <h2 class="text-center">
                    Viewing Category: {{$blogetc_category->category_name}}
                </h2>
                @if($blogetc_category->category_description)
                    <p class="text-center">{{$blogetc_category->category_description}}</p>
                @endif
            @endif

            @forelse($posts as $post)
                @include("blogetc::partials.index_loop")
            @empty
                <div class="alert alert-danger">No posts</div>
            @endforelse

            <!--<div class="text-center col-sm-4 mx-auto">-->
                <nav class="blog-pagination justify-content-center d-flex">
                {{$posts->appends( [] )->links()}}
                </nav>
            <!--</div>-->
            @include("blogetc::sitewide.search_form")
        </div>
    </div>
    </div>
    </section>
@endsection
