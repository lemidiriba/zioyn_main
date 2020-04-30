<?php

namespace App\Http\Controllers\Api\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Frontend\Product\ProductRepository;
use App\Repositories\Frontend\Shop\ShopRepository;
use Illuminate\Http\Request;

class ProductDetailControllerApi extends Controller
{

    protected $productRepository;
    protected $shopRepository;

    /**
     * Constructor function
     */
    public function __construct(ProductRepository $productRepository, ShopRepository $shopRepository)
    {
        $this->productRepository = $productRepository;
        $this->shopRepository = $shopRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($prodcut_id)
    {
        /* used to return user selection product and shop detail */
        $product_data = $this->productRepository->getById($prodcut_id);
        $shop_info = $product_data->shop;

        /* retrieve random items from several shop */
        $recomanded_items = $this->productRepository->all()->random(3);

        /* retrieve item from specific shop */
        $shop_items = $this->productRepository->getByShop($shop_info->shop_name);

        return response()->json(
            [
                'product_data' => $product_data,
                'shop_info' => $shop_info,
                'recomanded_items' => $recomanded_items,
                'shop_items' => $shop_items
            ]
        );
    }
}