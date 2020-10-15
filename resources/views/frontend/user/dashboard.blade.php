@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')

<body>


    <main>
        <!-- Hero Start-->
        <div class="slider-area slider-bg ">
            <div class="single-slider d-flex align-items-center slider-height2 ">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="hero-cap text-center pt-50">
                                <h2>Dashborad</h2>
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

        </div>
        <!--Hero End -->
        <!--================Blog Area =================-->
        <section class="blog_area mt-1 pt-1">

            <div class="container pt-3">
                <div class="row">
                    <div class="col-lg-12 mb-5 mb-lg-0">
                        @if ($hasschool)
                        <div class="alert alert-info alert-dismissible fade show " role="alert">
                            <h4 class="alert-heading">Quick Note!</h4>
                            <p>Follow the following folder structure for better result
                                Example:-
                                <div class="col-md-12">
                                    <h3 class="mb-20">Folder Structure</h3>
                                    <div class="">
                                        <ul class="unordered-list">
                                            <li>Grade 10
                                                <ul>
                                                    <li>Maths
                                                        <ul>
                                                            <li>Maths Chapter 1</li>
                                                            <li>Maths Chapter 2</li>
                                                        </ul>
                                                    </li>


                                                </ul>
                                            </li>
                                            <li>Grade 11
                                                <ul>
                                                    <li>English
                                                        <ul>
                                                            <li>English chapter 1 File</li>
                                                            <li>English chapter 2 File</li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <hr>
                                <p class="mb-0">Whenever you need to, Contact us
                                    <a style="color:'#eb566c';" href="{{ route('frontend.contact') }}">Contact as</a>.
                                </p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <iframe src="/filemanager"
                            style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
                        @else
                         <!--Button trigger modal -->
                        <button type="button" class="float-right btn btn-primary btn-lg" data-toggle="modal"
                            data-target="#modelId">
                            Create School
                        </button>

                         <!--Modal -->
                        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
                            aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">School Information</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('frontend.schoolregister') }}" method="POST">

                                        <div class="modal-body">
                                            <div class="container-fluid">
                                                @method('POST')
                                                @csrf
                                                <div class="mt-10">
                                                    <input type="text" name="school_name" placeholder="School Name"
                                                        onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'School Name'" required
                                                        class="single-input">
                                                </div>
                                                <div class="mt-10">
                                                    <input type="text" name="school_address"
                                                        placeholder="School Address" onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'School Address'" required
                                                        class="single-input">
                                                </div>
                                                <div class="mt-10">
                                                    <input type="tel" name="school_phone" placeholder="School Phone"
                                                        onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Shool Phone'" required
                                                        class="single-input">
                                                </div>
                                                <div class="mt-10">
                                                    <input type="email" name="school_email" placeholder="Email address"
                                                        onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Email address'" required
                                                        class="single-input">
                                                </div>



                                                <div class="mt-10">
                                                    <input type="text" name="ministry_of_education_id"
                                                        placeholder="Ministry of education Id"
                                                        onfocus="this.placeholder = ''"
                                                        onblur="this.placeholder = 'Ministry of education Id'" required
                                                        class="single-input">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Register</button>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>

                        @endif





                    </div>
                    <div class="col-lg-12">
                        <div class="blog_right_sidebar">
                            {{-- <aside class=" single_sidebar_widget search_widget">
                                <div class="single-element-widget mt-30">
                                    <h3 class="mb-30">Display Grade Data</h3>
                                    <div class="dropdown align-content-center">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" id="triggerId"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Select Grade
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="triggerId">
                                            <div class="col">

                                                <div
                                                    class="col-12 col-sm-12 col-md-6 col-lg-4 switch-wrap d-flex justify-content-between">
                                                    <p>01. </p>
                                                    <div class="primary-radio">
                                                        <input name="grade" type="radio" id="default-radio">
                                                        <label for="default-radio"></label>
                                                    </div>
                                                </div>
                                                <div
                                                    class="col-12 col-sm-12 col-md-6 col-lg-4 switch-wrap d-flex justify-content-between">
                                                    <p>02. </p>
                                                    <div class="primary-radio">
                                                        <input name="grade" type="radio" id="primary-radio" checked>
                                                        <label for="primary-radio"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </aside>
                            <aside class="single_sidebar_widget search_widget">
                                <form action="#">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder='Add Subject Name'
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Add Subject Name'">
                                            <div class="input-group-append">
                                                <button class="btns" type="button"><i class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </aside>

                            <aside class="single_sidebar_widget search_widget">
                                <form action="#">
                                    <div class="form-group">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" placeholder='Add Grade'
                                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Add Grade'">
                                            <div class="input-group-append">
                                                <button class="btns" type="button"><i class="ti-search"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </aside>

                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Category</h4>
                                <ul class="list cat-list">
                                    <li>
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <button class="btns" type="button"><i
                                                            class="ti-search"></i></button>
                                                </div>
                                                <a href="#" class="d-flex">
                                                    <p>&nbsp Resaurant food</p>
                                                    <p>(37)</p>
                                                </a>

                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <a href="#" class="d-flex">
                                            <p>Travel news</p>
                                            <p>(10)</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex">
                                            <p>Modern technology</p>
                                            <p>(03)</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex">
                                            <p>Product</p>
                                            <p>(11)</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex">
                                            <p>Inspiration</p>
                                            <p>21</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="d-flex">
                                            <p>Health Care (21)</p>
                                            <p>09</p>
                                        </a>
                                    </li>
                                </ul>
                            </aside> --}}

                            <!--<aside class="single_sidebar_widget popular_post_widget">-->
                            <!--    <h3 class="widget_title">Recent Post</h3>-->
                            <!--    <div class="media post_item">-->
                            <!--        <img src="{{ asset('/img/post/post_1.png') }}" alt="post">-->
                            <!--        <div class="media-body">-->
                            <!--            <a href="blog_details.html">-->
                            <!--                <h3>From life was you fish...</h3>-->
                            <!--            </a>-->
                            <!--            <p>January 12, 2019</p>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="media post_item">-->
                            <!--        <img src="{{ asset('/img/post/post_2.png') }}" alt="post">-->
                            <!--        <div class="media-body">-->
                            <!--            <a href="blog_details.html">-->
                            <!--                <h3>The Amazing Hubble</h3>-->
                            <!--            </a>-->
                            <!--            <p>02 Hours ago</p>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="media post_item">-->
                            <!--        <img src="{{ asset('/img/post/post_3.png') }}" alt="post">-->
                            <!--        <div class="media-body">-->
                            <!--            <a href="blog_details.html">-->
                            <!--                <h3>Astronomy Or Astrology</h3>-->
                            <!--            </a>-->
                            <!--            <p>03 Hours ago</p>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--    <div class="media post_item">-->
                            <!--        <img src="{{ asset('/img/post/post_4.png') }}" alt="post">-->
                            <!--        <div class="media-body">-->
                            <!--            <a href="blog_details.html">-->
                            <!--                <h3>Asteroids telescope</h3>-->
                            <!--            </a>-->
                            <!--            <p>01 Hours ago</p>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</aside>-->
                            {{-- <aside class="single_sidebar_widget tag_cloud_widget">
                                <h4 class="widget_title">Tag Clouds</h4>
                                <ul class="list">
                                    <li>
                                        <a href="#">project</a>
                                    </li>
                                    <li>
                                        <a href="#">love</a>
                                    </li>
                                    <li>
                                        <a href="#">technology</a>
                                    </li>
                                    <li>
                                        <a href="#">travel</a>
                                    </li>
                                    <li>
                                        <a href="#">restaurant</a>
                                    </li>
                                    <li>
                                        <a href="#">life style</a>
                                    </li>
                                    <li>
                                        <a href="#">design</a>
                                    </li>
                                    <li>
                                        <a href="#">illustration</a>
                                    </li>
                                </ul>
                            </aside> --}}

                            {{-- <aside class="single_sidebar_widget instagram_feeds">
                                <h4 class="widget_title">Instagram Feeds</h4>
                                <ul class="instagram_row flex-wrap">
                                    <li>
                                        <a href="#">
                                            <img class="img-fluid" src="{{ asset('/img/post/post_5.png') }}" alt="">
                            </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="{{ asset('/img/post/post_6.png') }}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="{{ asset('/img/post/post_7.png') }}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="{{ asset('/img/post/post_8.png') }}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="{{ asset('/img/post/post_9.png') }}" alt="">
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <img class="img-fluid" src="{{ asset('/img/post/post_10.png') }}" alt="">
                                </a>
                            </li>
                            </ul>
                            </aside> --}}


                            {{-- <aside class="single_sidebar_widget newsletter_widget">
                                <h4 class="widget_title">Newsletter</h4>

                                <form action="#">
                                    <div class="form-group">
                                        <input type="email" class="form-control" onfocus="this.placeholder = ''"
                                            onblur="this.placeholder = 'Enter email'" placeholder='Enter email'
                                            required>
                                    </div>
                                    <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                                        type="submit">Subscribe</button>
                                </form>
                            </aside> --}}

                            <aside class="single_sidebar_widget newsletter_widget">
                                <div class="card-body">
                                    <h4 class="card-title">
                                        {{ $logged_in_user->name }}<br />
                                    </h4>

                                    <p class="card-text">
                                        <small>
                                            <i class="fas fa-envelope"></i> {{ $logged_in_user->email }}<br />
                                            <i class="fas fa-calendar-check"></i>
                                            @lang('strings.frontend.general.joined')
                                            {{ timezone()->convertToLocal($logged_in_user->created_at, 'F jS, Y') }}
                                        </small>
                                    </p>

                                    <p class="card-text">

                                        <a href="{{ route('frontend.user.account')}}" class="btn btn-info btn-sm mb-1">
                                            <i class="fas fa-user-circle"></i> @lang('navs.frontend.user.account')
                                        </a>

                                        @can('view backend')
                                        &nbsp;<a href="{{ route('admin.dashboard')}}"
                                            class="btn btn-danger btn-sm mb-1">
                                            <i class="fas fa-user-secret"></i>
                                            @lang('navs.frontend.user.administration')
                                        </a>
                                        @endcan
                                    </p>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
    </main>

    <!-- Scroll Up -->
    <div id="back-top">
        <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
    </div>




</body>

@push('after-script')
<script>
    // $('#exampleModal').on('show.bs.modal', event => {
    //                                 var button = $(event.relatedTarget);
    //                                 var modal = $(this);
    //                                 // Use above variables to manipulate the DOM

    //                             });
</script>
@endpush

@endsection