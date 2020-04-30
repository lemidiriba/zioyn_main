@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )


@section('content')

<div class="card">
    <div id="jumbotron_home" class="jumbotron text-center">
        <div class="col-sm-6 mx-auto bg-dark-50 white text-center pb-5 text-white">
            <h1 class="display-4">Hello, {{ $logged_in_user->name }}</h1>

            <hr class="my-4">
            <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
            <p class="lead">
                {{--
            <button class="btn btn-warning btn-lg" href="#" role="button" data-toggle="modal"
                data-target="#addshopproduct">Add Product</button> --}}

                <button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#exampleModal">

                    <span role="button">Add Location</span>
                </button>
                <button id="update_shopbtn" type="button" class="btn btn-warning btn-lg" value="{{ $shop->id }}">

                    <span role="button">Update Shop</span>
                </button>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-center" id="exampleModalLabel">
                                    {{ $shop->shop_name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body is-valid">
                                <form id="addLocation" action="" method="POST" role="form">
                                    <div class="input-group">
                                        <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                        <input id="longtude" name="lng" type="number" min="o" value="" placeholder="Longtude"
                                            class="form-control ml-1" required readonly>
                                        <input id="latitude" name="lat" type="number" min="0" value="" placeholder="Latitude"
                                            class="form-control" required readonly>
                                        <div class="input-group-append">
                                            <button id="add_location" class="btn btn-sm btn-warning"
                                                type="submit">Add</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

                {{-- model used for updating shop information --}}

                <div class="modal fade" id="updateShop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header text-center">
                                <h4 class="modal-title w-100 font-weight-bold">Update Shop</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body mx-3">
                                <div class="is-valid">
                                    <form id="update_shop" action="{{ route('frontend.shop.update', $shop->id) }}"
                                        method="POST" role="form" enctype="multipart/form-data">

                                        {{ csrf_field() }}

                                        @method('PATCH')
                                        <div class="form-group">

                                            <input value="" name="shop_name" type="text" class="form-control md-form"
                                                id="shop_name" placeholder="Shop Name" maxlength="17" required>
                                        </div>


                                        {{-- <div class="form-group">

                                            <select name="shop_category" class="form-control md-form" id="shopcategory"
                                                required>
                                                @foreach ($ShopCategories as $shopCategory)
                                                <option value="{{ $shopCategory ->id}}">
                                        {{ $shopCategory->category_name }}
                                        </option>
                                        @endforeach

                                        </select>
                                </div> --}}

                                <div class="form-group">

                                    <textarea name="Shop_description" type="text" class="form-control md-form"
                                        id="shop_description" placeholder="Shop Discription" required></textarea>
                                </div>
                                <div class="form-group">

                                    <input type="file" name="image_file" class="form-control md-form" id="shoplogo"
                                        placeholder="">
                                </div>



                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-center bg-warning">
                            <button type="submit" class="btn btn-warning bg-">Update</button>
                        </div>
                    </div>
                    </form>
                </div>

        </div>
        </p>
    </div>

</div>
</div>


<div class="card">

    <div class="card-header text-center" googl="true">
        <h3 class="card-title"> {{  ucwords($shop->shop_name) }} Product List</h3>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="table_" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-10 float-right mb-2">
                    <a type="button" data-toggle="modal" data-target="#addshopproduct"
                        class="btn btn-sm float-right"> 
                        
                        <i class="fa fa-plus-circle fa-2x"></i>
                    </a>
                </div>
            </div>
            <div class="modal fade" id="addshopproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header text-center">
                            <h4 class="modal-title w-100 font-weight-bold"> Add Product
                            </h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body mx-3">
                            <div class="is-valid">
                                <form id="addShop" action="" method="POST" role="form" enctype="multipart/form-data">
                                    <!--hidden filed -->
                                    <input name="shop" type="hidden" value="{{ $shop->id }}">


                                    {{ csrf_field() }}
                                    <div class="form-group">

                                        <input name="product_name" type="text" class="form-control md-form"
                                            id="exampleFormControlInput1" placeholder="Name" required>
                                    </div>
                                    {{--
                                    <div class="form-group">
                                        <select name="product_type" class="form-control md-form" required>
                                            <option value="1">
                                                Product Category
                                            </option>

                                        </select>
                                    </div> --}}

                                    <div class="form-group">
                                        <input name="product_brand" class="form-control md-form" placeholder="Brand"
                                            required>
                                    </div>

                                    <div class="form-group">
                                        <input name="product_price" type="number" class="form-control md-form" min="1"
                                            placeholder="Price" required>
                                    </div>

                                    <div class="form-group">
                                        <input name="product_amount" type="number" class="form-control md-form" min="1"
                                            placeholder="Amount" required>
                                    </div>
                                    <div class="form-group">

                                        <input type="file" name="image_file" class="form-control md-form"
                                            id="inputEmail3" placeholder="" required>
                                    </div>



                            </div>

                        </div>
                        <div class="modal-footer d-flex justify-content-center bg-warning">
                            <button id="add_product" type="submit" class="btn btn-default ">Add Product</button>
                        </div>
                    </div>
                    </form>
                </div>

            </div>
            <!-- model -->

            <!--table container -->
            {{-- @if (count($product_lists) != 0) --}}
            <div class="container">
                <div class="row ">

                    <div class="col-lg-10">
                        <table id="table" class="table table-bordered table-hover" role="grid"
                            aria-describedby="example1_info">
                            <thead>
                                <tr role="row">
                                    <th>ID</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Price(Birr)</th>
                                    <th>Amount</th>
                                    <th>Brand</th>
                                    {{-- <th>Action</th> --}}


                                </tr>
                            </thead>
                            <tbody>

                                {{-- @foreach ($product_lists as $product_list)

                                <tr role="row" class="odd">
                                    <td class="sorting_1 w-25">
                                        <div class="embed-responsive embed-responsive-4by3">
                                            <img alt="{{ ucwords($product_list->product_name) }}"
                                class="card-img-top embed-responsive-item"
                                src="{{ asset('shop_image/product_image/'.$product_list->product_image) }}" />
                    </div>
                    </td>
                    <td class="text-center align-content-between">
                        {{ ucwords($product_list->product_name) }}</td>
                    <td class="text-center align-content-between">{{ $product_list->price }}</td>
                    <td class="text-center align-content-between">{{ $product_list->product_amount }}
                    </td>
                    <td class="text-center align-content-between">{{ $product_list->product_brand }}
                    </td>
                    <td class="text-center">
                        <div class="mt-5 row align-content-center">
                            <button value="{{ $product_list->id }}" type="button"
                                class="col-12 btn btn-sm btn-default product_detail" aria-label="Left Align">
                                <i class="fa fa-info-circle fa-1x"></i>
                            </button>
                            <!-- data model for info btn -->


                            <button value="{{ $product_list->id }}" type="button"
                                class="col-12 btn-sm btn btn-default update_productbtn" aria-label="Left Align"
                                data-toggle="modal" data-target="#updateproduct">
                                <i class="fa fa-edit fa-1x"></i>
                            </button>

                            <button value="{{ $product_list->id }}" type="button"
                                class="col-12 btn btn-sm btn-default delete_product" aria-label="Left Align">
                                <i class="fa fa-trash fa-1x"></i>
                            </button>

                        </div>

                    </td>
                    </tr>
                    @endforeach --}}

                    </tbody>

                    </table>

                    <div class="modal fade" id="product_info" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Product Detail</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <ul class="list-group list-group-flush">
                                        <div class="row">

                                            <div class="col-4"><label class="list-group-item" for="name">Product
                                                    Name</label>
                                            </div>

                                            <div class="col-8">
                                                <li id="name" class="list-group-item"></li>
                                            </div>


                                            <div class="col-4"><label class="list-group-item" for="amount">Product
                                                    Amount</label></div>

                                            <div class="col-8">
                                                <li id="amount" class="list-group-item"></li>
                                            </div>


                                            <div class="col-4"><label class="list-group-item" for="price">Price</label>
                                            </div>

                                            <div class="col-8">
                                                <li id="price" class="list-group-item"></li>
                                            </div>


                                            <div class="col-4"><label class="list-group-item"
                                                    for="product_detail">Product
                                                    Detail</label></div>

                                            <div class="col-8">
                                                <li id="product_detail" class="list-group-item"></li>
                                            </div>


                                            <div class="col-4"><label class="list-group-item" for="product_type">Product
                                                    Type</label></div>

                                            <div class="col-8">
                                                <li id="product_type" class="list-group-item"></li>
                                            </div>


                                            <div class="col-4"><label class="list-group-item"
                                                    for="vender_detail">Brand</label></div>

                                            <div class="col-8">
                                                <li id="vender_detail" class="list-group-item"></li>
                                            </div>


                                            <div class="col-4"><label class="list-group-item" for="shop_name">Shop
                                                    Name</label>
                                            </div>

                                            <div class="col-8">
                                                <li id="shop_name" class="list-group-item">{{ $shop->shop_name }}
                                                </li>
                                            </div>

                                        </div>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="card">
                        <div class="card-header">
                            Promotion
                        </div>
                        <div class="card-body small">
                            <span>China | Trading Company</span>
                            <hr>
                            Transaction Level: Good <br>
                            Supplier Assessments: Best

                            <a href="#">Visit pofile</a>

                        </div> <!-- card-body.// -->
                    </div> <!-- card.// -->
                </div>
            </div>


        </div>
        {{-- <div class="row">
                <div class="col-sm-12 col-md-7">
                    <div class="dataTables_paginate paging_simple_numbers" id="example1_paginate">
                        <ul class="pagination">
                            <li class="paginate_button page-item previous disabled" id="example1_previous"><a href="#"
                                    aria-controls="example1" data-dt-idx="0" tabindex="0" class="page-link">Previous</a>
                            </li>

                            <li class="paginate_button page-item next" id="example1_next"><a href="#"
                                    aria-controls="example1" data-dt-idx="7" tabindex="0" class="page-link">Next</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
    </div>

    {{-- @else
    <!-- table ends -->
    <div class="alert alert-info alert-dismissible text-center">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h5 googl="true"><i class="icon fas fa-info"></i> Alert!</h5>
        Info alert preview. Press the green Button to Add Product to the Shop.
    </div>
    @endif --}}

    <!-- model for update product information-->
    <div class="modal fade" id="updateproduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold"> Update Product
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="update_product" role="form" action="" method="POST" enctype="multipart/form-data">

                    <div class="modal-body mx-3">

                        <div class="is-valid">

                            @method("PATCH")

                            @csrf
                            <!--hidden filed -->
                            <input id="product_id" type="hidden" value="">

                            <div class="form-group">

                                <input id="product_name" name="product_name" type="text" class="form-control md-form"
                                    id="exampleFormControlInput1" placeholder="Product Name" required>
                            </div>

                            <div class="form-group">
                                <input name="product_brand" class="form-control md-form" id="product_brand"
                                    placeholder="Brand" required />

                            </div>

                            <div class="form-group">
                                <select name="product_type" class="form-control md-form" id="product_type" required>
                                    <option value="1">
                                        Product Type
                                    </option>

                                </select>
                            </div>

                            <div class="form-group">
                                <input id="product_price" name="product_price" type="number"
                                    class="form-control md-form" min="1" placeholder="Price" required>
                            </div>

                            <div class="form-group">
                                <input id="product_amount" name="product_amount" type="number"
                                    class="form-control md-form" min="1" placeholder="Product Amount" required>
                            </div>
                            <div class="form-group">

                                <input id="image_file" type="file" name="image_file" class="form-control md-form"
                                    id="inputEmail3" placeholder="">
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer d-flex justify-content-center bg-warning">
                        <button id="updateproductshop" type="submit" class="btn btn-default ">Update
                            Product</button>
                    </div>
                </form>
            </div>

        </div>



    </div>
</div>
<!-- /.card-body -->
</div>


<script>
    $.ajaxSetup({

        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function () {

        $('#table').DataTable({
            serverSide: true,
            ordering: true,
            processing: true,
            "lengthMenu": [10, 20, 50, 100, 200, 5000],
            ajax: '{{ route("frontend.allproduct",$shop->id) }}',
            columns: [
                {
                    data: 'id',
                    name: 'id',
                    visible: false,
                    disabled: true,

                },
                {
                    data: 'product_image',
                    name: 'product_image',
                    type: "upload",
                    "render": function (data, type, row, meta) {
                        if (type === 'display') {
                            data =
                                '<img class="card-img-top embed-responsive-item" src="{{asset("storage/shop_image/product_image")}}/' +
                                row.product_image + '" />';
                        }
                        return data;
                    }
                },
                {
                    data: 'product_name',
                    name: 'product_name'
                },
                {
                    data: 'price',
                    name: 'price'
                },
                {
                    data: 'product_amount',
                    name: 'product_amount'
                },
                {
                    data: 'product_brand',
                    name: 'product_brand'
                },



            ],
            dom: 'Bfrtip', // Needs button container
            select: 'single',
            responsive: true,
            altEditor: true,
            buttons: [
                {
                    extend: 'selected', // Bind to Selected row
                    text: 'Edit',
                    name: 'edit' // do not change name
                },
                {
                    extend: 'selected', // Bind to Selected row
                    text: 'Delete',
                    name: 'delete' // do not change name
                }
            ],
            onDeleteRow: function (datatable, rowdata, success, error) {
                $.ajax({
                    // a tipycal url would be /{id} with type='DELETE'
                    url: '/product/delete/' + rowdata.id,
                    type: 'DELETE',
                    data: rowdata,
                    success: success,
                    error: error
                });
            },
            onEditRow: function (datatable, rowdata, success, error) {
                $.ajax({
                    // a tipycal url would be /{id} with type='POST'
                    url: '/product/update/' + rowdata.id,
                    type: 'PATCH',
                    data: rowdata,
                    success: success,
                    error: function (param) {
                    console.log(rowdata);
                    }
                });
            }

        });

    });

    ////////////////////////////////////////////////////////////
    ////////////////////Shop Product////////////////////////////
    ////////////////////////////////////////////////////////////
    //saving product in shop
    $("#add_product").click(function (e) {
        e.preventDefault();
        let form = $('#addShop')[0];
        let addProductFormData = new FormData(form);

        $.ajax({
            type: "POST",
            enctype: 'multipart/form-data',
            url: '{{ route("frontend.product.store") }}',
            data: addProductFormData,
            cache: false,
            contentType: false,
            processData: false

        }).done(
            function (response) {
                $('#addshopproduct').modal('hide');
                swal({
                    icon: 'success',
                    title: 'Product Added successfully',
                    toast: true,
                    position: 'top-end',
                    button: false,
                    timer: 2000,
                    timerProgressBar: true,
                    onOpen: (toast) => {
                        toast.addEventListener('mouseenter', swal.stopTimer)
                        toast.addEventListener('mouseleave', swal.resumeTimer)
                    }
                })

                console.log(response);
                // //alert( "second success" );
                // setTimeout(function () {
                //     window.location.reload();
                // }, 3000);
                $('#table').DataTable().ajax.reload();


            }

        ).fail(
            function (response) {

                swal({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',

                })
                console.log(response);
            }
        );

    });


    //deleteing product in shop



    ////////////////////////////////////////////////////////////
    ////////////////////Shop Location////////////////////////////
    ////////////////////////////////////////////////////////////
    $('#add_location').click(function (e) {

        e.preventDefault();

        console.log('add location clicked');

        let form = $('#addLocation')[0];
        let locationFormData = new FormData(form);
        console.log(locationFormData);
        $.ajax({
            type: "POST",
            url: 'https://zioyn.com/shop/location',
            data: locationFormData,
            processData: false,
            contentType: false
        }).done(
            function (response) {
                console.log(response);
                $('#exampleModal').modal('hide');


                swal({
                    icon: 'success',
                    title: response.message,
                    toast: true,
                    button: false,
                    timer: 2000,
                    timerProgressBar: true,
                })
            }
        ).fail(
            function (response) {
                console.log(response.responseJSON);
                //$('#exampleModal').modal('hide');
                swal({
                    icon: 'error',
                    text: response.responseJSON.message,
                })
            }
        );
    });


    ///// update_product///


    $('#update_shopbtn').click(function (e) {
    console.log('update shop clicked');
    e.preventDefault();

    //geting clicked id
    let shop_id = $(this).attr("value");
    console.log('id ' + shop_id);
    $.ajax({
    type: "GET",
    url: "https://zioyn.com/shop/shopdetail/" + shop_id,
    data: {
    'shop_id': shop_id
    },
    }).done(function (response) {
    console.log(response);
    //window.open(response,'_blank')

    // adding previous result
    $('#shop_name').val(response.shop_name);
    $('#shop_description').val(response.shop_description);


    $('#updateShop').modal('show');



    }).fail(function (response) {
    console.log(response);
    });

    //geting product detail

    });



    ///// update_product///


    // $('.update_productbtn').click(function (e) {
    //     console.log('update_product clicked');
    //     e.preventDefault();

    //     //geting clicked id
    //     let proudct_id = $(this).attr("value");
    //     console.log('id ' + proudct_id);
    //     $.ajax({
    //         type: "GET",
    //         url: "http://shemach.test/product/detail/" + proudct_id,
    //         data: {
    //             'product_id': proudct_id
    //         },
    //     }).done(function (response) {
    //         console.log(response);
    //         //window.open(response,'_blank')

    //         // adding previous result
    //         $('#product_id').val(response.id);
    //         $('#product_name').val(response.product_name);
    //         $('#product_price').val(response.price);
    //         $('#product_amount').val(response.product_amount);
    //         $('#product_brand').val(response.product_brand);
    //         $('#product_name').val(response.product_name);
    //         $('#updateproductshop').attr('value', response.id);


    //     }).fail(function (response) {
    //         console.log(response);
    //     });

    //     //geting product detail

    // });
    /////////////////////if update pressed///////////////
    // $('#updateproductshop').click(function (e) {
    //     e.preventDefault();
    //     console.log('update pressed');
    //     let product_id = $(this).attr('value');
    //     console.log("product id is " + product_id);

    //     let form = $('#update_product')[0];

    //     console.log(form);
    //     let localupdateform = new FormData(form);
    //     console.log(localupdateform);
    //     $.ajax({
    //         type: "PATCH",
    //         url: "http://shemach.test/product/update/" + product_id,
    //         enctype: 'multipart/form-data',
    //         data: {
    //             'localformdata': localupdateform
    //         },
    //         catch: false,
    //         contentType: false,
    //         processData: false

    //     }).done(function (response) {
    //         console.log('this is done update');
    //         console.log(response);
    //         $('#table').DataTable().ajax.reload();

    //     }).fail(function (response) {
    //         console.log('this is fail update');

    //         console.log(response);
    //     });

    // });
    
    //map box get currunt device location
    
    mapboxgl.accessToken =
        'pk.eyJ1IjoibGVtaWRpcmliYSIsImEiOiJjazU5NHgyMXQwdHhjM21sajkxbjdqYWZuIn0.BFGZSHoafWfGHtJXEq2XFw';
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
    // .setHTML('<h3>' + marker.properties.title + '</h3><p>' + 
    // marker.properties.description + '</p>'))
    // .addTo(map);


    //working code to get current location
    var options = {
      enableHighAccuracy: true,
      timeout: 5000,
      maximumAge: 0
    };
    
    function success(pos) {
      var crd = pos.coords;
    
      console.log('Your current position is:');
      console.log(`Latitude : ${crd.latitude}`);
      $('#latitude').val(crd.latitude)
      
      console.log(`Longitude: ${crd.longitude}`);
      $('#longtude').val(crd.longitude)
      console.log(`More or less ${crd.accuracy} meters.`);
    }
    
    function error(err) {
      console.warn(`ERROR(${err.code}): ${err.message}`);
    }
    navigator.geolocation.getCurrentPosition(success, error, options);

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

        // if ("geolocation" in navigator) {
        //     console.log(Geolocation)
        // }else{
        //     console.log('location not avalable');
        // }


</script>


@endsection
