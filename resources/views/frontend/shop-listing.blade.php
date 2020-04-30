@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')


<!-- ========================= SECTION PAGETOP ========================= -->
<section class="section-intro bg-one padding-y-lg pb-0 pt-1">
    <div class="row">
        <div class="col-sm-6 mx-auto bg-dark-50">
            <article class="white text-center mb-5">
                <img class="img-fluid img-thumbnail" style="max-width:25%;"
                    src="{{ asset('storage/shop_image/shop_logo/'.$shop_data->Shop_logo) }}" alt="{{ $shop_data->shop_name }}">
                <h1 class="display-3">{{ $shop_data->shop_name }}</h1>
                <p>This example is a quick exercise to illustrate how the navbar and its contents work. Some navbars
                    extend the width of the viewport, others are confined within... For positioning of navbars, checkout
                    .</p>
            </article>

        </div> <!-- col.// -->
    </div> <!-- row.// -->
</section> <!-- section-intro.// -->
<!-- ========================= SECTION INTRO END// ========================= -->

<!-- ========================= SECTION CONTENT ========================= -->
<section class="section-content bg padding-y">
    <div class="container">

        <div class="row">
            <aside class="col-sm-3">

                <div class="card card-filter">
                    <article class="card-group-item">
                        <header class="card-header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                            <a class="" aria-expanded="true" href="#" data-toggle="collapse" data-target="#collapse22">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">By Category</h6>
                            </a>
                        </header>
                        <div style="" class="filter-content collapse show" id="collapse22">
                            <div class="card-body">
                                <form class="pb-3">
                                    <div class="input-group">
                                        <input id="search" class="form-control" placeholder="Search" type="text"
                                            data-search-id="{{ $shop_data->id }}">
                                        <div class="input-group-append">
                                            <button id="searchbtn" class="btn btn-secondary searchid" type="button"><i
                                                    class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>

                                <ul class="list-unstyled list-lg">
                                    <li><a href="#">Total Items <span
                                                class="float-right badge badge-light round">{{ $statstic_data['total'] }}</span>
                                        </a></li>

                                </ul>
                            </div> <!-- card-body.// -->
                        </div> <!-- collapse .// -->
                    </article> <!-- card-group-item.// -->
                    <article class="card-group-item">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse33">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">By Price </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse33">
                            <div class="card-body">

                                <input id="range_price" type="range" class="custom-range"
                                    min="{{ $statstic_data['min_price'] }}" max="{{ $statstic_data['max_price'] }}"
                                    name="">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label>Min</label>
                                        <input class="form-control" min="{{ $statstic_data['min_price'] }}"
                                            placeholder="{{ $statstic_data['min_price'] }}" type="number" disabled>
                                    </div>
                                    <div class="form-group text-right col-md-6">
                                        <label>Max</label>
                                        <input id="max_price" class="form-control"
                                            min="{{ $statstic_data['min_price'] }}"
                                            max="{{ $statstic_data['max_price'] }}"
                                            placeholder="{{ $statstic_data['max_price'] }}" type="number">
                                    </div>
                                </div> <!-- form-row.// -->
                                <button id="filterbtn" class="btn btn-block btn-outline btn-secondary">Filter</button>
                            </div> <!-- card-body.// -->
                        </div> <!-- collapse .// -->
                    </article> <!-- card-group-item.// -->
                    {{-- <article class="card-group-item">
                        <header class="card-header">
                            <a href="#" data-toggle="collapse" data-target="#collapse44">
                                <i class="icon-action fa fa-chevron-down"></i>
                                <h6 class="title">By Feature </h6>
                            </a>
                        </header>
                        <div class="filter-content collapse show" id="collapse44">
                            <div class="card-body">
                                <form>
                                    <label class="form-check">
                                        <input class="form-check-input" value="" type="checkbox">
                                        <span class="form-check-label">
                                            <span class="float-right badge badge-light round">5</span>
                                            Samsung
                                        </span>
                                    </label> <!-- form-check.// -->

                                </form>
                            </div> <!-- card-body.// -->
                        </div> <!-- collapse .// -->
                    </article> <!-- card-group-item.// --> --}}
                </div> <!-- card.// -->

                <div class="card mt-2">
                    <div class="card-header">
                        Promotion
                    </div>
                    <div class="card-body small">
                        <span>China | Trading Company</span>
                        <hr>
                        Transaction Level: Good <br>
                        Supplier Assessments: Best

                        <a href="">Visit pofile</a>

                    </div> <!-- card-body.// -->
                </div> <!-- card.// -->
            </aside> <!-- col.// -->

            <main class="col-sm-9 posts endless-pagination" data-next-page="{{ $shop_products->nextPageUrl() }}">

                @if (count($shop_products) > 0)
                @foreach ($shop_products as $item)
                <article id="shop_data" class="card card-product pb-0">
                    <div class="card-body">

                        <div class="row">


                            <aside class="col-sm-3">
                                <div class="img-wrap img-fluid">
                                    <a href="{{ asset('storage/shop_image/product_image/'.$item->product_image) }}"
                                        data-fancybox="">
                                        <img src="{{ asset('storage/shop_image/product_image/'.$item->product_image) }}">
                                    </a>


                                </div>
                            </aside> <!-- col.// -->
                            <article class="col-sm-6">
                                <h4 class="title"> {{ $item->product_name }} </h4>
                                <div class="rating-wrap  mb-2">
                                    <ul class="rating-stars">
                                        <li style="width:80%" class="stars-active">
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </li>
                                        <li>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </li>
                                    </ul>
                                    <div class="label-rating">132 reviews</div>
                                    <div class="label-rating">154 orders </div>
                                </div> <!-- rating-wrap.// -->

                                <dl class="dlist-align">
                                    <dt>Color</dt>
                                    <dd>Black and white</dd>
                                </dl> <!-- item-property-hor .// -->
                                <dl class="dlist-align">
                                    <dt>Material</dt>
                                    <dd>Syntetic, wooden</dd>
                                </dl> <!-- item-property-hor .// -->
                                <dl class="dlist-align">
                                    <dt>Delivery</dt>
                                    <dd>Russia, USA, and Europe</dd>
                                </dl> <!-- item-property-hor .// -->

                            </article> <!-- col.// -->
                            <aside class="col-sm-3 border-left">
                                <div class="action-wrap">
                                    <div class="price-wrap h4">
                                        <span class="price"> {{$item->price }}</span>
                                        <del
                                            class="price-old">{{ (int)(($item->price) +($item->price * (8/100))) }}</del>
                                    </div> <!-- info-price-detail // -->

                                    <br>
                                    <p>

                                        <a href="/product-detail/{{ $item->id }}" class="btn btn-secondary"> <i
                                                class="fas fa-info fa-fw"></i></a>
                                    </p>
                                    {{--
                                    <a href=""><i class="fa fa-heart"></i> Add to
                                        wishlist</a> --}}
                                </div> <!-- action-wrap.// -->
                            </aside> <!-- col.// -->

                        </div> <!-- row.// -->


                    </div> <!-- card-body .// -->
                </article> <!-- card product .// -->
                @endforeach
                @else
            </main> <!-- col.// -->


            @endif
        </div>

    </div> <!-- container .//  -->
</section>
<!-- ========================= SECTION CONTENT END// ========================= -->

<!-- ========================= SECTION  ========================= -->
<section class="section-name bg-white padding-y">
    <div class="container">
        <figure class="mt-3 banner p-3 bg-secondary">
            <div class="text-lg text-center white">Useful banner can be here</div>
        </figure>
    </div><!-- container // -->
</section>
<!-- ========================= SECTION  END// ========================= -->
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    ////////////////////////////////////////////////////////////////////
    ////////////////////////////used for auto scrole////////////////////
    ////////////////////////////////////////////////////////////////////
    $(document).ready(function () {
        $(window).scroll(fetchPosts);

        function fetchPosts() {

            let page = $('.endless-pagination').data('next-page');
            if (page != null || page == '') {
                clearTimeout($.data(this, "scrollCheck"));

                $.data(this, "scrollCheck", setTimeout(function () {
                    let scroll_position_for_posts_load = $(window).height() + $(window)
                        .scrollTop() + 600;

                    if (scroll_position_for_posts_load >= $(document).height()) {
                        $.ajax({
                            type: "GET",
                            url: page
                        }).done(function (response) {

                            $('.posts').append(response.posts)
                            $('.endless-pagination').data('next-page', response.next_page)
                        }).fail(function (respons) {
                            console.log(respons)
                        });

                    }

                }, 1000))
            }
        }
    })
    ////////////////////////////////////////////////////////////////////
    ////////////////////////////used for range price ////////////////////
    ////////////////////////////////////////////////////////////////////
    $('#range_price').change(function (e) {
        let data = $("#range_price").val();
        $('#max_price').val(data);

    });




    ////////////////////////////////////////////////////////////////////
    ////////////////////////////used for autocomplete ////////////////////
    ////////////////////////////////////////////////////////////////////
    $('#search').on('input', function () {

        //setup before functions
        let typingTimer; //timer identifier
        let doneTypingInterval = 1000; //time in ms (5 seconds)
        let myInput = document.getElementById('search');

        myInput.addEventListener('keyup', () => {
            clearTimeout(typingTimer);
            if (myInput.value) {
                typingTimer = setTimeout(function () {
                    console.log('lemi' + $('#search').data('search-id'));
                    $.ajax({
                        type: "GET",
                        url: '/autocomplete/' + $('#search').data(
                            'search-id') + '/' + myInput.value,
                        data: {
                            'texttyped': myInput.value
                        }
                    }).done(function (response) {
                        console.log(response);
                        if (response) {
                            autocomplete(document.getElementById('search'), response);
                        } else {
                            swal({
                                title:"your here",
                                button: false,
                                timer: 2000
                            })
                        }

                    }).fail(function (response) {
                        swal({
                            title: "Opps Something went Wrong",
                            icon: "error",
                            button: false,
                            timer: 2000
                        })
                        console.log(response);
                    });
                }, doneTypingInterval);
            }
        });

    })

    function autocomplete(inp, arr) {

        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function (e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching
                           element:*/
                    b = document.createElement("DIV"); /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" +
                        arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that
                           will hold the current array item's value:*/
                    b.innerHTML += "<input id='hidden' type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function (e) {
                        /*insert the value for the autocomplete text field:*/
                        console.log(document.getElementById("hidden"));
                        var impval = document.getElementById("hidden").value;
                        $(".searchid").val(impval);
                        inp.value = impval;
                        /*close the list of autocompleted values, (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        }); /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown",
            function (e) {
                var x = document.getElementById(this.id + "autocomplete-list");
                if (x) x = x.getElementsByTagName("div");
                if (e.keyCode == 40) {
                    /*If the arrow DOWN key is pressed, increase the currentFocus variable:*/
                    currentFocus++;
                    /*andand make the current item more visible:*/
                    addActive(x);
                } else if (e.keyCode == 38) {
                    //up /*If the arrow UP key is pressed,decrease the currentFocus variable: */
                    currentFocus--; /* and make the current item more visible: */
                    addActive(x);
                } else if (e.keyCode == 13) {
                    /*If the ENTER key is pressed, prevent the form from being submitted,*/
                    e.preventDefault();
                    if (currentFocus > -1) {
                        /*and simulate a click on the "active" item:*/
                        if (x) x[currentFocus].click();
                    }
                }
            });

        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1); /*add class "autocomplete-active" :*/
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            /*a function to removethe "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document, except the one passed as an argument:*/
            var
                x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] &&
                    elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in thedocument:*/
        document.addEventListener("click", function (e) {
            closeAllLists(e.target);
        });
    }

    ////////////////////////////////////////////////////////////////////
    ////////////////////////////used for searchbtn ////////////////////
    ////////////////////////////////////////////////////////////////////

    $('#searchbtn').click(function (e) {
        console.log($("#search").val())
        let prouctname = $("#search").val();
        $.ajax({
            type: "GET",
            url: '/single-product/' + $('#search').data('search-id') + '/' + prouctname,
            data: {
                "productname": prouctname
            }


        }).done(function (respons) {
           //console.log(respons);
            if (respons.posts.trim() != "") {
                $('.posts').empty();
                $('.posts').append(respons.posts)
            } else {
                swal({
                title: "Opps!! didn\'t find Any thing",
                icon: "info",
                button:false,
                timer: 2000
                })
            }
        }).fail(function (respons) {
            swal({
                title: "Opps Something went Wrong",
                icon: "error",
                button: false,
                timer: 2000
            })
            console.log(respons)
        });
    })

    ////////////////////////////////////////////////////////////////////
    ////////////////////////////used for searchbtn price rage///////////
    ////////////////////////////////////////////////////////////////////

    $("#filterbtn").click(function (e) {
        let max_price = $("#max_price").val();
        let min_price = $("#min_price").val();
        console.log(min_price);
        $.ajax({
            type: "GET",
            url: "/shop/price/"+$('#search').data('search-id')+'/'+min_price+'/'+max_price,
            data: {
                'shop_id': $('#search').data('search-id'),
                'max_price': max_price,
                'min_price': min_price
            }
        }).done(function (response) {
            console.log(response);
            if (response.posts.trim() != "") {
                $('.posts').empty();
                $('.posts').append(response.posts)
            }

        }).fail(function (response) {
            console.log(response);
            swal({
                title: "Opps Something went Wrong",
                icon: "error",
                button: false,
                timer: 2000
            })
        });

    });

</script>


<style>
    .autocomplete {
        /*the container must be positioned relative:*/
        position: relative;
        display: inherit;
    }

    input {
        border: 1px solid transparent;
        background-color: #f1f1f1;
        padding: 10px;
        font-size: 16px;
    }

    input[type=text] {
        background-color: #f1f1f1;
        width: 100%;
    }

    .autocomplete-items {
        position: absolute;
        border: 1px solid #d4d4d4;
        border-bottom: none;
        border-top: none;
        z-index: 99;
        /*position the autocomplete items to be the same width as the container:*/
        top: 100%;
        left: 0;
        right: 0;
    }

    .autocomplete-items div {
        padding: 10px;
        cursor: pointer;
        background-color: #fff;
        border-bottom: 1px solid #d4d4d4;
    }

    .autocomplete-items div:hover {
        /*when hovering an item:*/
        background-color: #e9e9e9;
    }

    .autocomplete-active {
        /*when navigating through the items using the arrow keys:*/
        background-color: DodgerBlue !important;
        color: #ffffff;
    }
</style>
@endsection
