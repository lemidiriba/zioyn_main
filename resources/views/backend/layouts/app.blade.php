<!DOCTYPE html>
@langrtl
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
@else
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@endlangrtl

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', app_name())</title>
    <meta name="description" content="@yield('meta_description', 'Laravel Boilerplate')">
    <meta name="author" content="@yield('meta_author', 'Anthony Rappa')">
    @yield('meta')

    {{-- See https://laravel.com/docs/5.5/blade#stacks for usage --}}
    @stack('before-styles')

    <!-- Check if the language is set to RTL, so apply the RTL layouts -->
    <!-- Otherwise apply the normal LTR layouts -->
    {{ style(mix('css/backend.css')) }}
    <link rel="stylesheet" href="{{ asset('./css/jquery.dataTables.min.css') }}">

    {{-- used for datatable --}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/buttons.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/select.dataTables.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/responsive.dataTables.css') }}" />
    {{-- <script src="{{ asset('./js/template/jquery-2.0.0.min.js') }}" type="text/javascript"></script> --}} --}}
    

    <script src='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.js'></script>
    <link href='https://api.mapbox.com/mapbox-gl-js/v1.12.0/mapbox-gl.css' rel='stylesheet' />





    @stack('after-styles')
</head>

{{--
     * CoreUI BODY options, add following classes to body to change options
     * // Header options
     * 1. '.header-fixed'					- Fixed Header
     *
     * // Sidebar options
     * 1. '.sidebar-fixed'					- Fixed Sidebar
     * 2. '.sidebar-hidden'				- Hidden Sidebar
     * 3. '.sidebar-off-canvas'		    - Off Canvas Sidebar
     * 4. '.sidebar-minimized'			    - Minimized Sidebar (Only icons)
     * 5. '.sidebar-compact'			    - Compact Sidebar
     *
     * // Aside options
     * 1. '.aside-menu-fixed'			    - Fixed Aside Menu
     * 2. ''			    - Hidden Aside Menu
     * 3. '.aside-menu-off-canvas'	        - Off Canvas Aside Menu
     *
     * // Breadcrumb options
     * 1. '.breadcrumb-fixed'			    - Fixed Breadcrumb
     *
     * // Footer options
     * 1. '.footer-fixed'					- Fixed footer
--}}

<body class="app header-fixed sidebar-fixed aside-menu-off-canvas sidebar-lg-show">
    @include('backend.includes.header')

    <div class="app-body">
        @include('backend.includes.sidebar')

        <main class="main">
            @include('includes.partials.read-only')
            @include('includes.partials.logged-in-as')
            {!! Breadcrumbs::render() !!}

            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="content-header">
                        @yield('page-header')
                    </div>
                    <!--content-header-->

                    @include('includes.partials.messages')
                    @include('sweetalert::alert')

                    @yield('content')
                </div>
                <!--animated-->
            </div>
            <!--container-fluid-->
        </main>
        <!--main-->

        @include('backend.includes.aside')
    </div>
    <!--app-body-->

    @include('backend.includes.footer')

    <!-- Scripts -->
    @stack('before-scripts')
    {!! script(mix('js/manifest.js')) !!}
    {!! script(mix('js/vendor.js')) !!}
    {!! script(mix('js/backend.js')) !!}
    @stack('after-scripts')
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('./js/template/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('./js/template/popper.min.js') }}"></script>
    <script src="{{ asset('./js/template/bootstrap.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('./js/template/datatables.min.js') }}"></script>
    {{-- <script src="{{ asset('./js/template/jquery.dataTables.min.js') }}"></script> --}}

    <script type="text/javascript" src="{{ asset('./js/template/dataTables.buttons.js') }}"></script>
    <script type="text/javascript" src="{{ asset('./js/template/dataTables.select.js') }}"></script>
    <script type="text/javascript" src="{{ asset('./js/template/dataTables.responsive.js') }}"></script>
    <script type="text/javascript" src="{{ asset('./js/template/dataTables.altEditor.free.js') }}"></script>

    <script src="{{ asset('./js/template/dataTables.altEditor.free.js') }}"></script>
    
    

<script>
  const beamsClient = new PusherPushNotifications.Client({
    instanceId: '44abaf83-88f3-4cdd-b5af-9dd99b7e0fd7',
  });

  beamsClient.start()
    .then(() => beamsClient.addDeviceInterest('hello'))
    .then(() => console.log('Successfully registered and subscribed!'))
    .catch(console.error);
</script>





</body>

</html>