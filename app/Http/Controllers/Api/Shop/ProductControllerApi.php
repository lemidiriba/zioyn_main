<?php

/**
 * ProductController is used to manipulate shop Products
 *
 * @category Api
 *
 * @package App/Http/Controller/Api/Shop
 *
 * @author Lemi Diriba <lemidiriba4@gmail.com>
 *
 * @license http://www.zioyn.com Ziyon 2020
 *
 * @link http://zioyn.com
 */

namespace App\Http\Controllers\Api\Shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Frontend\Product\ProductRepository;
use App\Repositories\Frontend\Shop\ShopRepository;
use Illuminate\Http\Request;

/**
 * ProductController class
 *
 * @category Api
 *
 * @package App/Http/Controller/Api/Shop
 *
 * @author Lemi Diriba <lemidiriba4@gmail.com>
 *
 * @license http://www.zioyn.com Ziyon 2020
 *
 * @link http://zioyn.com
 */
class ProductController extends Controller
{
    //AddProduct
    //UpdateProduct
    //SoledOutProduct
    //

    protected $productRepository;
    protected $shopRepository;

    /**
     * Undocumented function
     *
     * @param ProductRepository $productRepository Repository
     * @param ShopRepository $shopRepository Repository
     */
    public function __construct(ProductRepository $productRepository, ShopRepository $shopRepository)
    {
        $this->productRepository = $productRepository;
        $this->shopRepository = $shopRepository;
    }



    /**
     * AddProduct a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request user reqest
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request)
    {
        //return 'store';

        $this->validate(
            $request,
            [
                'product_name' => ['required', 'string', 'max:191'],
                'product_brand' => ['required', 'string', 'max:191'],
                'product_price' => ['required', 'numeric', 'min:1'],
                'image_file' => ['image', 'mimes:jpeg,jpg,png,gif', 'max:20000'],
                'product_amount' => ['required', 'numeric', 'min:1'],

            ]
        );

        //image file uploding
        if ($request->hasFile('image_file')) {
            $filenamewithext = $request->file('image_file')->getClientOriginalName();

            $filename = str_replace(' ', '', pathinfo($filenamewithext, PATHINFO_FILENAME));
            $extension = $request->file('image_file')->getClientOriginalExtension();
            $filenametostore = trim($filename, "\t\n\r\0\x0B") . '__' . time() . '.' . $extension;
        }
        //return $filenametostore;
        //saving data to product table
        $product_data = new Product();
        $product_data->product_name = $request->product_name;
        $product_data->product_image = $filenametostore;
        $product_data->product_amount = $request->product_amount;
        $product_data->price = $request->product_price;

        //null 1st time
        $product_data->product_detail_id = 1; //'empty_for_now';
        $product_data->product_type_id = 1;

        $product_data->product_brand = $request->product_brand;
        $product_data->shop_id = $request->shop;
        $product_data->available = 1;

        //return $product_data;

        if ($product_data->save()) {

            //full file path
            $request->file('image_file')->storeAs('public/shop_image/product_image', $filenametostore);

            return response()->json(['message' => 'Product added succefully']);
        }
    }

    /**
     * ShowShopInfo the specified resource.
     *
     * @param int $shop_id shop id
     *
     * @return \Illuminate\Http\Response
     */
    public function showShopInfo($shop_id)
    {


        $shop_name = $this->shopRepository->getByColumn($shop_id, 'id');

        return response()->json($shop_name);
    }

    /**
     * EditProduct the form for editing the specified resource.
     *
     * @param int $id product id
     *
     * @return \Illuminate\Http\Response
     */
    public function editProduct($id)
    {
        return response()->json($this->productRepository->getById($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request user requst
     * @param Int $id product id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request;
        $this->validate(
            $request,
            [
                'product_name' => ['required', 'string', 'max:191'],
                'product_brand' => ['required', 'string', 'max:191'],
                'product_price' => ['required', 'numeric', 'min:1'],
                'image_file' => ['image', 'mimes:jpeg,jpg,png,gif', 'max:20000'],
                'product_amount' => ['required', 'numeric', 'min:1'],

            ]
        );
        //image file uploding
        if ($request->hasFile('image_file')) {
            $filenamewithext = $request->file('image_file')->getClientOriginalName();

            $filename = str_replace(' ', '', pathinfo($filenamewithext, PATHINFO_FILENAME));
            $extension = $request->file('image_file')->getClientOriginalExtension();
            $filenametostore = trim($filename, "\t\n\r\0\x0B") . '__' . time() . '.' . $extension;
        }

        $product = Product::find($id);

        $product->product_name = $request->product_name;
        $product->product_image = $filenametostore;
        $product->product_amount = $request->product_amount;
        $product->price = $request->product_price;

        //null 1st time
        $product->product_detail_id = 1; //'empty_for_now';
        $product->product_type_id = 1;

        $product->product_brand = $request->product_brand;
        $product->shop_id = $request->shop;
        $product->available = 1;

        //return $product_data;

        if ($product->save()) {

            //full file path
            $request->file('image_file')->storeAs('public/shop_image/product_image', $filenametostore);

            return response()->json(['message' => 'Product Updated succefully']);
        }

        //return 'update is here';

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Int $id product is
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //return 'destroy ' . $id;
        $product = Product::find($id);
        $product->delete();
        return response()->json(['message' => 'Product deleted', 'status' => 'success']);
    }

    /**
     * GetAllProduct function
     *
     * @param Int $shop_id Shop Unique identifier
     *
     * @return void
     */
    public function getAllProduct($shop_id)
    {
        return response()->json($this->shopRepository->getById($shop_id)->product);
    }
}