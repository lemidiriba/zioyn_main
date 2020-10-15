@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . 'School Home')

@section('content')





<main>
   <!-- Hero Start-->
   <div class="slider-area slider-bg ">
      <div class="single-slider d-flex align-items-center slider-height2 ">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="hero-cap text-center pt-50">
                     <h2>{{ $school_name }} School</h2>
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
   <!--================Blog Area =================-->
   <section class="blog_area single-post-area pt-2 mt-2 pt-2 mb-2">
      <div class="container">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  <div class="blog_details">
                     @if ($school_data == null)
                     <li>
                        <a href="" class="d-flex">
                           <p>No School Registerd</p>
                        </a>
                     </li>
                     @else
                     <h3 class="mb-30">School Grade</h3>

                     @foreach ($school_data as $item)
                     <div class="card">
                        <div class="card-header">
                           <a class="collapsed" type="button" data-toggle="collapse"
                              data-target="#{{ str_replace(' ','', $item['school_grade']) }}" aria-expanded="false"
                              aria-controls="{{ str_replace(' ','', $item['school_grade']) }}">
                              {{ $item['school_grade'] }}
                           </a>
                        </div>
                        <div id="{{ str_replace(' ','', $item['school_grade']) }}" class="collapse"
                           data-parent="#accordionExample">
                           @if ($item['school_subject'] == null)
                           no data
                           @else

                           <div class="card-body bg-gray-dark">
                              <div class="row">
                                 @foreach ($item['school_subject'] as $subjectdata)
                                 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">

                                    <div class="box-part text-center">


                                       <div class="title">
                                          <h4>{{ $subjectdata['school_subject'] }}</h4>
                                       </div>

                                       <div class="text">
                                          <span>Total school material (<b>{{ $subjectdata['total_subject_files'] }}</b>)
                                          </span>
                                       </div>

                                       <a href="{{ route('frontend.subject' , [Str::afterLast(url()->current(), '/'),$item['school_grade'], $subjectdata['school_subject']])  }}
                                          " style="color:#eb566c !important;">Get Material</a>

                                    </div>

                                 </div>
                                 @endforeach

                              </div>
                           </div>

                           @endif


                        </div>
                     </div>
                     @endforeach
                     @endif
                  </div>
               </div>
            </div>

            <div class="col-lg-4">
               <div class="blog_right_sidebar">

                  {{-- <aside class="single_sidebar_widget post_category_widget">
                  <h4 class="widget_title">School </h4>
                  <ul class="list cat-list">
                     @if ($school_data == null)
                     <li>
                        <a href="" class="d-flex">
                           <p>No School Registerd</p>
                        </a>
                     </li>
                     @else
                     @foreach ($school_data as $item)
                     <li>
                        <a href="#" class="d-flex">
                           <p>{{ $item['school_grade'] }}</p>
                  <p>&nbsp({{ $item['total_files'] }})</p>
                  </a>
                  </li>
                  @endforeach
                  @endif


                  </ul>
                  </aside> --}}
                  {{-- <aside class="single_sidebar_widget popular_post_widget">
                     <h3 class="widget_title">Recent Post</h3>
                     <div class="media post_item">
                        <img src="assets/img/post/post_1.png" alt="post">
                        <div class="media-body">
                           <a href="blog_details.html">
                              <h3>From life was you fish...</h3>
                           </a>
                           <p>January 12, 2019</p>
                        </div>
                     </div>
                     <div class="media post_item">
                        <img src="assets/img/post/post_2.png" alt="post">
                        <div class="media-body">
                           <a href="blog_details.html">
                              <h3>The Amazing Hubble</h3>
                           </a>
                           <p>02 Hours ago</p>
                        </div>
                     </div>
                     <div class="media post_item">
                        <img src="assets/img/post/post_3.png" alt="post">
                        <div class="media-body">
                           <a href="blog_details.html">
                              <h3>Astronomy Or Astrology</h3>
                           </a>
                           <p>03 Hours ago</p>
                        </div>
                     </div>
                     <div class="media post_item">
                        <img src="assets/img/post/post_4.png" alt="post">
                        <div class="media-body">
                           <a href="blog_details.html">
                              <h3>Asteroids telescope</h3>
                           </a>
                           <p>01 Hours ago</p>
                        </div>
                     </div>
                  </aside>
                  <aside class="single_sidebar_widget tag_cloud_widget">
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

                  {{-- <aside class="single_sidebar_widget newsletter_widget">
                     <h4 class="widget_title">Newsletter</h4>
                     <form action="#">
                        <div class="form-group">
                           <input type="email" class="form-control" onfocus="this.placeholder = ''"
                              onblur="this.placeholder = 'Enter email'" placeholder='Enter email' required>
                        </div>
                        <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                           type="submit">Subscribe</button>
                     </form>
                  </aside> --}}
               </div>
            </div>
         </div>

      </div>
      </div>
   </section>
   <!--================ Blog Area end =================-->
</main>

<div id="back-top">
   <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>



@endsection