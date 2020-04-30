@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

<!-- map style-->
<style>
    #map {
        overflow: hidden;

        width: 100% !important;
        max-height: 100% !important;


    }
</style>

<section class="section-main bg padding-y-sm">
    <div class="container">
        <div class="card pb-4">
            <div class="card-body">
                <div class="row row-sm">
                    <aside class="col-md-3">
                        <h5 class="text-uppercase">My Markets</h5>
                        <ul class="menu-category">
                            <li> <a href="#">Shoes </a></li>

                            <li> <a href="#">Clothe </a>

                            </li>

                            <li> <a href="#">Electronics</a>

                            </li>

                        </ul>

                    </aside>

                    <!-- col.// -->
                    <div class="col-md-6">
                        <!-- ================= main slide ================= -->
                        <div class="owl-init slider-main owl-carousel" data-items="1" data-nav="true" data-dots="false">
                            <div class="item-slide">
                                <img src="{{ asset('storage/img/frontend/banners/slide1.jpg') }}">
                            </div>
                            <div class="item-slide">
                                <img src="{{ asset('storage/img/frontend/banners/slide2.jpg') }}">
                            </div>
                            <div class="item-slide">
                                <img src="{{ asset('storage/img/frontend/banners/slide3.jpg') }}">
                            </div>
                        </div>
                        <!-- ============== main slidesow .end // ============= -->
                    </div>
                    <!-- col.// -->
                    <aside class="col-md-3">

                        <h6 class="title-bg bg-secondary"> Qualified Suppliers</h6>
                        @if ($shop_datas)
                        <div style="height:280px;">
                            @foreach ($shop_datas as $shop_data)

                            <figure class="itemside has-bg border-bottom m-1 img-fluid" style="height: 33%;">
                                <img class="img-bg img-fluid"
                                    src="{{ asset('storage/shop_image/shop_logo/'.$shop_data->Shop_logo) }} ">
                                <figcaption class="p-2">
                                    <h6 class="title">{{ ucwords($shop_data->shop_name) }} </h6>
                                    <a href="/oneshop/{{ $shop_data->id }}">Shop link</a>
                                </figcaption>
                            </figure>

                            @endforeach
                        </div>
                        @endif


                    </aside>
                </div>
                <!-- row.// -->
            </div>
            <!-- card-body .// -->
        </div>
        <!-- card.// -->

        <figure class="mt-3 banner p-3 bg-secondary">
            <div class="text-lg text-center white">Useful banner can be here</div>
        </figure>

    </div>
    <!-- container .//  -->
</section>
<!-- ========================= SECTION MAIN END// ========================= -->

<!-- ========================= SECTION ITEMS ========================= -->
<section class="section-request bg padding-y-sm">
    <div class="container">
        <header class="section-heading heading-line"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
            <h4 class="title-section bg text-uppercase">Recommended items</h4>
        </header>

        <div class="row-sm">
            @if (count($product_datas) > 0)
            @foreach ($product_datas as $product_data)


            <div class="col-md-2">
                <figure class="card card-product">
                    <div class="img-wrap"> <img
                            src="{{ asset('storage/shop_image/product_image/'.$product_data->product_image) }}"></div>
                    <figcaption class="info-wrap">
                        <h6 class="title"><a
                                href="product-detail/{{ $product_data->id }}">{{ ucwords($product_data->product_name) }}</a>
                        </h6>

                        <div class="price-wrap">
                            <span class="price-new">{{ $product_data->price }}</span>
                            <del
                                class="price-old">{{ (int)(($product_data->price) +($product_data->price * (8/100))) }}</del>
                        </div>
                        <!-- price-wrap.// -->

                    </figcaption>
                </figure>
                <!-- card // -->
            </div>
            @endforeach
            @endif
            <!-- col // -->
        </div>
        <!-- row.// -->


    </div>
    <!-- container // -->
</section>
<!-- ========================= SECTION ITEMS .END// ========================= -->
<!-- ========================= SECTION CONTENT ========================= -->

<section class="section-content padding-y-sm bg">
    <div class="container">

        <header class="section-heading heading-line">
            <h4 class="title-section bg">Near By Shop</h4>
        </header>

        <div class="card">
            <div class="row no-gutters">
                <div class="col-md-3">

                    <article href="#" class="card-banner h-100 bg2">
                        <div class="card-body zoom-wrap">
                            <h5 class="title">Near By Shop Location </h5>
                            <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                                magna
                                aliqua. Lorem ipsum dolor sit amet, cLorem ipsum dolor sit amet, cLorem ipsum dolor
                                sit
                                amet, cLorem ipsum dolor sit amet, c</p>
                            <a href="#" class="btn btn-warning">Explore</a>
                            <img src="{{ asset('storage/img/frontend/items/item-sm.png') }}" height="200" class="img-bg
zoom-in">
                        </div>
                    </article>

                </div>
                <!-- col.// -->
                <div class="col-md-9">
                    <ul class="row no-gutters border-cols">
                        <li class="col-6 col-md-3">
                            <a href="#" class="itembox">
                                <div class="card-body">
                                    <p class="word-limit">Home and kitchen electronic stuff collection
                                    </p>
                                    <img class="img-sm" src="{{ asset('storage/img/frontend/items/1.jpg') }}">
                                </div>
                            </a>
                        </li>

                    </ul>
                    <ul class="row no-gutters border-cols">
                        <li class="col-6 col-md-3">
                            <a href="#" class="itembox">
                                <div class="card-body">
                                    <p class="word-limit">Home and kitchen electronic stuff </p>
                                    <img class="img-sm" src="{{ asset('storage/img/frontend/items/1.jpg') }}">
                                </div>
                            </a>
                        </li>

                    </ul>
                </div>
                <!-- col.// -->
            </div>
            <!-- row.// -->

        </div>
        <!-- card.// -->

    </div>
    <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION REQUEST ========================= -->

<section class="section-request bg padding-y-sm">
    <div class="container">
        <header class="section-heading heading-line">
            <h4 class="title-section bg text-uppercase">Request for Quotation</h4>
        </header>

        <div class="row">
            <div class="col-md-8">
                <figure class="card-banner banner-size-lg">
                    <figcaption class="overlay left">
                        <br>
                        <h2 style="max-width: 300px;">Big boundle or collection of featured items
                        </h2>
                        <br>
                        <a class="btn btn-warning" href="#">Detail info » </a>
                    </figcaption>
                    <img src="{{ asset('storage/img/frontend/banners/banner-request.jpg') }}">
                </figure>
            </div>
            <!-- col // -->
            <div class="col-md-4">

                <div class="card card-body">
                    <h5 class="title py-4">One Request, Multiple Quotes.</h5>
                    <form>
                        <div class="form-group">
                            <input class="form-control" name="" type="text">
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <input class="form-control" name="" type="text">
                                <span class="input-group-btn" style="border:0; width: 0;"></span>
                                <select class="form-control">
                                    <option>Pieces</option>
                                    <option>Litres</option>
                                    <option>Tons</option>
                                    <option>Gramms</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group text-muted">
                            <p>Select template type:</p>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="option1">
                                <span class="form-check-label">Request price</span>
                            </label>
                            <label class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" value="option2">
                                <span class="form-check-label">Request a sample</span>
                            </label>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-warning">Request for quote</button>
                        </div>
                    </form>
                </div>

            </div>
            <!-- col // -->
        </div>
        <!-- row // -->

    </div>
    <!-- container // -->
</section>
<!-- ========================= SECTION REQUEST .END// ========================= -->

<!-- ========================= SECTION LINKS ========================= -->
<section class="section-links bg padding-y-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <header class="section-heading heading-line">
                    <h4 class="title-section bg text-uppercase">Suppliers by Region</h4>
                </header>

                <ul class="list-icon row">
                    <li class="col-md-4">
                        <a href="#"><img src="{{ asset('storage/img/frontend/icons/flag-usa.png') }}"><span>United
                                States</span></a>
                    </li>

                </ul>
            </div>
            <!-- col // -->

            <div class="col-sm-6">
                <header class="section-heading heading-line">
                    <h4 class="title-section bg text-uppercase">Trade services</h4>
                </header>
                <ul class="list-icon row">
                    <li class="col-md-4"><a href="#"><i class="icon fa fa-comment"></i><span>Trade
                                Assistance</span></a></li>

                </ul>
            </div>
            <!-- col // -->
        </div>
        <!-- row // -->

        <figure class="mt-3 banner p-3 bg-secondary">
            <div class="text-lg text-center white">Another banner can be here</div>
        </figure>

    </div>
    <!-- container // -->
</section>
<!-- ========================= SECTION LINKS END.// ========================= -->
<!-- ========================= SECTION SUBSCRIBE ========================= -->
<section class="section-subscribe bg-secondary padding-y-lg">
    <div class="container">

        <p class="pb-2 text-center white">Delivering the latest product trends and industry news straight to your
            inbox
        </p>

        <div class="row justify-content-md-center">
            <div class="col-lg-4 col-sm-6">
                <form class="row-sm form-noborder">
                    <div class="col-8">
                        <input class="form-control" placeholder="Your Email" type="email">
                    </div>
                    <!-- col.// -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-block btn-warning"> <i class="fa
    										fa-envelope"></i> Subscribe </button>
                    </div>
                    <!-- col.// -->
                </form>
                <small class="form-text text-white-50">We’ll never share your email
                    address with a third-party. </small>
            </div>
            <!-- col-md-6.// -->
        </div>


    </div>
    <!-- container // -->
</section>
<!-- ========================= SECTION SUBSCRIBE END.//========================= -->
<style>
    .mapboxgl-popup {
    max-width: 200px;
    }

    .mapboxgl-popup-content {
    text-align: center;
    font-family: 'Open Sans', sans-serif;
    }

</style>
<script>
    var map, popup, Popup, marker, infowindow;


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(window).load(function () {
        $.ajax({
            method: "GET",
            url: 'https://zioyn.com/shop/location/all',
            cache: true,
        }).done(
            function (e) {
                console.log('success');
                console.log(e);
                for (let i = 0; i < e.length; i++) {
                    const lat = parseFloat(e[i].longitude);
                    const lng = parseFloat(e[i].latitude);
                    const shopinfo = e[i];
                    // addMarker(lat, lng, shopinfo);
                }
            });


    });


    // function initMap() {
    //     console.log('map inti start')
    //     //map options
    //     var options = {
    //         zoom: 11,
    //         center: {
    //             lat: 8.9806,
    //             lng: 38.7578
    //         },
    //         height: "100%"
    //     }
    //     //new map
    //     map = new google.maps.Map(document.getElementById('map'), options);

    // }

    // function addMarker(lat, lng, shopinfo) {
    //     console.log('here')
    //     console.log(shopinfo)
    //     const latLng = {
    //         lat: lat,
    //         lng: lng
    //     }

    //     var marker = new google.maps.Marker({
    //         position: latLng,
    //         label: {
    //             text: 'S'
    //         }
    //     });
    //     var infowindow = new google.maps.InfoWindow({
    //         content: "<h6>" + shopinfo.shop_name + "</h6><br>" + "<p><a href='http://shemach.test/oneshop/" +
    //             shopinfo.id + "' target='_blank'>Visit shop</a></p>"
    //     });

    //     marker.addListener('click', function () {
    //         infowindow.open(map, marker);
    //     });

    //     marker.setMap(map);

    // }



    // mapboxgl.accessToken =
    //     'pk.eyJ1IjoibGVtaWRpcmliYSIsImEiOiJjazU5NHgyMXQwdHhjM21sajkxbjdqYWZuIn0.BFGZSHoafWfGHtJXEq2XFw';
    // var map = new mapboxgl.Map({
    //     container: 'map',
    //     zoom: 0.3,
    //     center: [0, 20],
    //     style: 'mapbox://styles/mapbox/light-v10'
    // });
    // map.addControl(new mapboxgl.GeolocateControl({
    //     positionOptions: {
    //         enableHighAccuracy: true
    //     },
    //     trackUserLocation: true
    // }));

    // // add markers to map
    // geojson.features.forEach(function(marker) {

    // // create a HTML element for each feature
    // var el = document.createElement('div');
    // el.className = 'marker';

    // // make a marker for each feature and add to the map
    // new mapboxgl.Marker(el)
    // .setLngLat(marker.geometry.coordinates)
    // .addTo(map);
    // });

    // new mapboxgl.Marker(el)
    // .setLngLat(marker.geometry.coordinates)
    // .setPopup(new mapboxgl.Popup({ offset: 25 }) // add popups
    // .setHTML('<h3>' + marker.properties.title + '</h3>
    // <p>' + marker.properties.description + '</p>'))
    // .addTo(map);


    //working code to get current location
    // navigator.geolocation.watchPosition(render);

    // function render(pos) {
    //     var lat = pos.coords.latitude;
    //     var lon = pos.coords.longitude;
    //     var map = mapboxgl.map('map', 'examples.map-20v6611k')
    //         .setView([lat, lon], 8);

    //     mapboxgl.markerLayer({
    //         // this feature is in the GeoJSON format: see geojson.org
    //         // for the full specification
    //         type: 'Feature',
    //         geometry: {
    //             type: 'Point',
    //             // coordinates here are in longitude, latitude order because
    //             // x, y is the standard for GeoJSON and many formats
    //             coordinates: [lon, lat]
    //         },
    //         properties: {
    //             title: 'Current Location',
    //             description: lat.toString() + ', ' + lon.toString(),
    //             // one can customize markers by adding simplestyle properties
    //             // http://mapbox.com/developers/simplestyle/
    //             'marker-size': 'large',
    //             'marker-color': '#f0a',
    //         }
    //     }).addTo(map)
    // };

    //    if ("geolocation" in navigator) {
    //        console.log(Geolocation)
    //    }else{
    //        console.log('location not avalable');
    //    }

</script>

@endsection
