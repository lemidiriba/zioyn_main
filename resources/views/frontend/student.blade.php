@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' .'Student')

@section('content')





<main>
   <!-- Hero Start-->
   <div class="slider-area slider-bg ">
      <div class="single-slider d-flex align-items-center slider-height2 ">
         <div class="container">
            <div class="row">
               <div class="col-xl-12">
                  <div class="hero-cap text-center pt-50">
                     <h2>Student</h2>
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
   <section class="blog_area single-post-area ">
      <div class="container pt-3">
         <div class="row">
            <div class="col-lg-8 posts-list">
               <div class="single-post">
                  @if ($search_result != null)
                  @include('frontend.includes.searchresult')
                  <hr>
                  @endif

                  {{-- <div class="feature-img">
                     <img class="img-fluid w-75 h-75" src="{{ asset('./img/blog/single_blog_0.png') }}" alt="">
               </div> --}}
               <div class="blog_details">
                  <h2>Why Ethiopia values STEM education? Ministry of Education
                  </h2>
                  <ul class="blog-info-link mt-3 mb-4">
                     <!--   <li><a href="#"><i class="fa fa-user"></i> Travel, Lifestyle</a></li>-->
                     <!--   <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>-->
                     <!--</ul>-->
                     <p class="excert">
                        Ethiopia focuses on Science, Technology, Engineering and Mathematics (STEM) education
                        targeting to offer students problem-solving, creativity, and skill building education and
                        enable youth engineer of their country, to foster poverty reduction.
                     </p>
                     <p>
                        To this effect, transforming STEM for Innovation purpose has the potential to speed up
                        nation’s economic competitiveness. But STEM education not only addresses the demand for
                        scientists and engineers, but it is also a key component to bear a responsible and goal
                        oriented citizens. Hence, to be competitive in the global economy; to pursue an aggressive
                        yet sustainable development; stressing on STEM education values most.
                     </p>
                     <div class="quote-wrapper w-100">
                        <div class="quotes">
                           STEM Synergy prepares younger generation to embrace creativity, invention and innovation.
                           It has been believed that STEM is the engine that can power growth. Therefore, STEM
                           education has to begin during the early childhood when children are curious and creative
                           and should continue through college.
                        </div>
                     </div>


               </div>
            </div>

         </div>
         <div class="col-lg-4">
            <div class="blog_right_sidebar">
               <aside class="single_sidebar_widget search_widget">
                  <form action="{{ route('frontend.search') }}">
                     <div class="form-group">
                        <div class="input-group mb-3">
                           <input name="searchword" type="text" class="form-control" placeholder='Enter Keyword'
                              onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Keyword'">
                           <div class="input-group-append">
                              <button class="btns" type="submit"><i class="ti-search"></i></button>
                           </div>
                        </div>
                     </div>
                     <button class="button rounded-0 primary-bg text-white w-100 btn_1 boxed-btn"
                        type="submit">Search</button>
                  </form>
               </aside>
               <aside class="single_sidebar_widget post_category_widget">
                  <h4 class="widget_title">School </h4>
                  <ul class="list cat-list">
                     @if ($school_data == null)
                     <li>
                        <a href="" class="d-flex">
                           <p>No School Registerd</p>
                        </a>
                     </li>
                     @else
                     @for ($i = 0; $i < count($school_data); $i++) @if ($i < count($school_data) && $i < 10) <li>
                        <a href="#" class="d-flex">
                           <p>{{ $school_data[$i]['school_name'] }}</p>
                           <p>({{ $school_data[$i]['total_files'] }})</p>
                        </a>
                        </li>
                        @endif

                        @endfor
                        {{-- @foreach ($school_data as $item)
                           <li>
                              <a href="" class="d-flex">
                                 <p>{{ $item['school_name'] }}</p>
                        <p>({{ $item['total_files'] }})</p>
                        </a>
                        </li>
                        @endforeach --}}
                        @endif


                  </ul>
               </aside>
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
                  </aside>
                  <aside class="single_sidebar_widget instagram_feeds">
                     <h4 class="widget_title">Instagram Feeds</h4>
                     <ul class="instagram_row flex-wrap">
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="assets/img/post/post_5.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="assets/img/post/post_6.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="assets/img/post/post_7.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="assets/img/post/post_8.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="assets/img/post/post_9.png" alt="">
                           </a>
                        </li>
                        <li>
                           <a href="#">
                              <img class="img-fluid" src="assets/img/post/post_10.png" alt="">
                           </a>
                        </li>
                     </ul>
                  </aside>
                  <aside class="single_sidebar_widget newsletter_widget">
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
   </section>
   <!--================ Blog Area end =================-->
</main>

<div id="back-top">
   <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>



@endsection