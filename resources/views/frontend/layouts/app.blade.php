<!DOCTYPE html>
@langrtl
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl

<head>
  <meta name="google-site-verification" content="JydJ3hFLTx3fgXaJtEVtTWw9srW6kvOpGeg43pOhIZc" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta property="og:image" content="{{ asset('/img/logo/logo1.png')}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title', app_name())</title>
  <meta name="description" content="@yield('meta_description', 'Laravel Boilerplate')">
  <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
  @yield('meta')

  {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
  @stack('before-styles')

  <!-- Check if the language is set to RTL, so apply the RTL layouts -->
  <!-- Otherwise apply the normal LTR layouts -->
  <!--{{ style(mix('css/frontend.css')) }}-->
  <!--<link rel="shortcut icon" type="image/jpg" href="{{ asset('/img/logo/logo.png')}}"/>-->
  <link rel="stylesheet" href="{{ asset('./css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('./css/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('./css/slicknav.css') }}">
  <link rel="stylesheet" href="{{ asset('./css/flaticon.css') }}">
  <link rel="stylesheet" href="{{ asset('./css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('./css/magnific-popup.css') }}">
  <link rel="stylesheet" href="{{ asset('./css/fontawesome-all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('./css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('./css/slick.css') }}">
  <link rel="stylesheet" href="{{ asset('./css/nice-select.css') }}">
  <link rel="stylesheet" href="{{ asset('./css/style.css') }}">


  <link rel="shortcut icon" type="image/png" href="{{ asset('./img/logo/logo1.png') }}">
  @stack('after-styles')

  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-161490620-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-161490620-1');
  </script>
  <script data-ad-client="ca-pub-5117271133951732" async
    src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>



</head>

<body>
  <!-- Preloader Start -->
  <div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
      <div class="preloader-inner position-relative">
        <div class="preloader-circle"></div>
        <div class="preloader-img pere-text">
          <img src="{{ asset('/img/logo/loder.jpg') }}" alt="">
        </div>
      </div>
    </div>
  </div>
  <!-- Preloader Start -->
  @include('includes.partials.read-only')

  <div id="app">
    @include('includes.partials.logged-in-as')
    @include('frontend.includes.nav')



    @yield('content')
    @include('includes.partials.messages')
    @include('frontend.includes.footer')
  </div><!-- #app -->
  @include('sweetalert::alert')

  <!-- Scripts -->
  @stack('before-scripts')
  {!! script(mix('js/manifest.js')) !!}
  {!! script(mix('js/vendor.js')) !!}
  {!! script(mix('js/frontend.js')) !!}
  <!-- JS here -->
  @stack('after-scripts')

  <!-- All JS Custom Plugins Link Here here -->
  <script src="{{ asset('./js/template/vendor/modernizr-3.5.0.min.js') }}"></script>
  <!-- Jquery, Popper, Bootstrap -->
  <script src="{{ asset('./js/template/vendor/jquery-1.12.4.min.js') }}"></script>
  <script src="{{ asset('./js/template/popper.min.js') }}"></script>
  <script src="{{ asset('./js/template/bootstrap.min.js') }}"></script>
  <!-- Jquery Mobile Menu -->
  <script src="{{ asset('./js/template/jquery.slicknav.min.js') }}"></script>

  <!-- Jquery Slick , Owl-Carousel Plugins -->
  <script src="{{ asset('./js/template/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('./js/template/slick.min.js') }}"></script>
  <!-- One Page, Animated-HeadLin -->
  <script src="{{ asset('./js/template/wow.min.js') }}"></script>
  <script src="{{ asset('./js/template/animated.headline.js') }}"></script>
  <script src="{{ asset('./js/template/jquery.magnific-popup.js') }}"></script>

  <!-- Nice-select, sticky -->
  <script src="{{ asset('./js/template/jquery.nice-select.min.js') }}"></script>
  <script src="{{ asset('./js/template/jquery.sticky.js') }}"></script>

  <!-- contact js -->
  {{-- <script src="{{ asset('./js/template/contact.js') }}"></script> --}}
  <script src="{{ asset('./js/template/jquery.form.js') }}"></script>
  <script src="{{ asset('./js/template/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('./js/template/mail-script.js') }}"></script>
  <script src="{{ asset('./js/template/jquery.ajaxchimp.min.js') }}"></script>

  <!-- Jquery Plugins, main Jquery -->
  <script src="{{ asset('./js/template/plugins.js') }}"></script>
  <script src="{{ asset('./js/template/main.js') }}"></script>



  {{-- file manage --}}

  <script src="{{ asset('./js/template/jquery.min.js') }}"></script>
  <script src="{{ asset('./js/template/popper.min.js') }}"></script>
  <script src="{{ asset('./js/template/bootstrap.min.js') }}"></script>

  <script src="{{ asset('js/share.js') }}"></script>
  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script> --}}

  {{-- @include('sweet::alert') --}}


  @push('after-script')
  <script>
    var route_prefix = "/filemanager";
  </script>
  <script>
    {!! \File::get(base_path('vendor/unisharp/laravel-filemanager/public/js/stand-alone-button.js')) !!}
  </script>
  <script>
    $('#lfm').filemanager('image', {prefix: route_prefix});
        // $('#lfm').filemanager('file', {prefix: route_prefix});
  </script>
  <script>
    var lfm = function(id, type, options) {
          let button = document.getElementById(id);
          button.addEventListener('click', function () {
            var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
            var target_input = document.getElementById(button.getAttribute('data-input'));
            var target_preview = document.getElementById(button.getAttribute('data-preview'));
            window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
            window.SetUrl = function (items) {
              var file_path = items.map(function (item) {
                return item.url;
              }).join(',');
              // set the value of the desired input to image url
              target_input.value = file_path;
              target_input.dispatchEvent(new Event('change'));
              // clear previous preview
              target_preview.innerHtml = '';
              // set or change the preview image src
              items.forEach(function (item) {
                let img = document.createElement('img')
                img.setAttribute('style', 'height: 5rem')
                img.setAttribute('src', item.thumb_url)
                target_preview.appendChild(img);
              });
              // trigger change event
              target_preview.dispatchEvent(new Event('change'));
            };
          });
        };
        lfm('lfm2', 'file', {prefix: route_prefix});
  </script>

  <script>
    $(document).ready(function(){
            // Define function to open filemanager window
            var lfm = function(options, cb) {
              var route_prefix = (options && options.prefix) ? options.prefix : '/filemanager';
              window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
              window.SetUrl = cb;
            };
            // Define LFM summernote button
            var LFMButton = function(context) {
              var ui = $.summernote.ui;
              var button = ui.button({
                contents: '<i class="note-icon-picture"></i> ',
                tooltip: 'Insert image with filemanager',
                click: function() {
                  lfm({type: 'image', prefix: '/filemanager'}, function(lfmItems, path) {
                    lfmItems.forEach(function (lfmItem) {
                      context.invoke('insertImage', lfmItem.url);
                    });
                  });
                }
              });
              return button.render();
            };
            // Initialize summernote with LFM button in the popover button group
            // Please note that you can add this button to any other button group you'd like
            $('#summernote-editor').summernote({
              toolbar: [
                ['popovers', ['lfm']],
              ],
              buttons: {
                lfm: LFMButton
              }
            })
          });
  </script>
  <script>
    // console.log('lemi');
    $(document).ready(function(){
              $('.page-link')
          });

  </script>
  @endpush
  
  

<script>
  const beamsClient = new PusherPushNotifications.Client({
    instanceId: '44abaf83-88f3-4cdd-b5af-9dd99b7e0fd7',
  });

  beamsClient.start()
    .then(() => beamsClient.addDeviceInterest('hello'))
    .then(() => console.log('Successfully registered and subscribed!'))
    .catch(console.error);
</script>




  {{-- <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script> --}}
  <style>
    .popover {
      top: auto;
      left: auto;
    }
  </style>


  @include('includes.partials.ga')
</body>

</html>