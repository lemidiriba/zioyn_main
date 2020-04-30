@if (count($shop_products) > 0)
@foreach ($shop_products as $item)
<article id="shopdata" class="card card-product pb-0">
    <div class="card-body">

        <div class="row">


            <aside class="col-sm-3">
                <div class="img-wrap img-fluid">
                    <a href="{{ asset('/storage/shop_image/product_image/'.$item->product_image) }}" data-fancybox="">
                        <img src="{{ asset('/storage/shop_image/product_image/'.$item->product_image) }}">
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
                        <del class="price-old">{{ (int)(($item->price) +($item->price * (8/100))) }}</del>
                    </div> <!-- info-price-detail // -->

                    <br>
                    <p>

                        <a href="/product-detail/{{ $item->id }}" class="btn btn-secondary"> <i
                                class="fas fa-info fa-fw"></i></a>
                    </p>

                    <a href=""><i class="fa fa-heart"></i> Add to
                        wishlist</a>
                </div> <!-- action-wrap.// -->
            </aside> <!-- col.// -->

        </div> <!-- row.// -->


    </div> <!-- card-body .// -->
</article> <!-- card product .// -->
@endforeach
@endif
