@extends('backend.layouts.app')

@section('title', app_name() . ' | ' . __('strings.backend.dashboard.title'))

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="row">

            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card level-card level-emergency level-empty">
                    <div class="card-header">
                        <span class="level-icon"><i class="fa fa-fw fa-bug"></i></span> All Shop
                    </div>
                    <div class="card-body">
                        246 entries - 100%
                        <div class="progress">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card level-card level-emergency level-empty">
                    <div class="card-header">
                        <span class="level-icon"><i class="fa fa-fw fa-bug"></i></span> Total Product
                    </div>
                    <div class="card-body">
                        0 entries - 0%
                        <div class="progress">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card level-card level-alert level-empty">
                    <div class="card-header">
                        <span class="level-icon"><i class="fa fa-fw fa-bullhorn"></i></span> Soled out
                    </div>
                    <div class="card-body">
                        0 entries - 0%
                        <div class="progress">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12 col-sm-12 mb-3">
                <div class="card level-card level-alert level-empty">
                    <div class="card-header">
                        <span class="level-icon"><i class="fa fa-fw fa-map-marker"></i></span>Populated Map location
                    </div>
                    <div class="card-body">
                        <!--Google map-->
                        <div id="map" class="z-depth-1-half map-container" style="height: 400px">

                        </div>
                        <!--Google Maps-->
                    </div>
                </div>

            </div>


            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card level-card level-critical level-empty">
                    <div class="card-header">
                        <span class="level-icon"><i class="fa fa-fw fa-heartbeat"></i></span> Apparel and Shoes 
                    </div>
                    <div class="card-body">
                        0 entries - 0%
                        <div class="progress">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card level-card level-error ">
                    <div class="card-header">
                        <span class="level-icon"><i class="fa fa-fw fa-times-circle"></i></span> Audio Print and Video 
                    </div>
                    <div class="card-body">
                        224 entries - 91.06%
                        <div class="progress">
                            <div class="progress-bar" style="width: 91.06%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card level-card level-warning level-empty">
                    <div class="card-header">
                        <span class="level-icon"><i class="fa fa-fw fa-exclamation-triangle"></i></span> Electronics and
                        Phones
                    </div>
                    <div class="card-body">
                        0 entries - 0%
                        <div class="progress">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card level-card level-notice level-empty">
                    <div class="card-header">
                        <span class="level-icon"><i class="fa fa-fw fa-exclamation-circle"></i></span> Electronics and
                        Phones
                    </div>
                    <div class="card-body">
                        0 entries - 0%
                        <div class="progress">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card level-card level-info level-empty">
                    <div class="card-header">
                        <span class="level-icon"><i class="fa fa-fw fa-info-circle"></i></span> Electronics and Phones
                    </div>
                    <div class="card-body">
                        0 entries - 0%
                        <div class="progress">
                            <div class="progress-bar" style="width: 0%"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 mb-3">
                <div class="card level-card level-debug ">
                    <div class="card-header">
                        <span class="level-icon"><i class="fa fa-fw fa-life-ring"></i></span> Electronics and Phones
                    </div>
                    <div class="card-body">
                        22 entries - 8.94%
                        <div class="progress">
                            <div class="progress-bar" style="width: 8.94%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

{{-- <div class="row">

    <div class="col-12 col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-body card-print-height">
                <canvas id="shopcategory"></canvas>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-lg-6">
        <div class="card">
            <div class="card-body card-print-height">
                this is one
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body card-print-height">
                this is one
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body card-print-height">
                this is one
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body card-print-height">
                this is one
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body card-print-height">
                this is one
            </div>
        </div>
    </div>

    <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body card-print-height">
                this is one
            </div>
        </div>
    </div>


    <div class="col-12 col-sm-12 col-lg-4">
        <div class="card">
            <div class="card-body card-print-height">
                this is one
            </div>
        </div>
    </div>
</div> --}}

<script>
    // mapboxgl.accessToken =
    // 'pk.eyJ1IjoibGVtaWRpcmliYSIsImEiOiJjazU5NHgyMXQwdHhjM21sajkxbjdqYWZuIn0.BFGZSHoafWfGHtJXEq2XFw';
    // var map = new mapboxgl.Map({
    // container: 'map',
    // zoom: 0.3,
    // center: [0, 20],
    // style: 'mapbox://styles/mapbox/light-v10'
    // });

</script>
<style>

</style>
@endsection
