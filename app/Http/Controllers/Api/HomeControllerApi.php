<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Repositories\Frontend\Product\ProductRepository;
use App\Repositories\Frontend\Shop\ShopLocationRepository;
use App\Repositories\Frontend\Shop\ShopRepository;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

/**
 * Class HomeController.
 */
class HomeControllerApi extends Controller
{
    protected $shopRepository;
    protected $productRepositery;
    protected $shopLocationRepository;
    protected $shop_id;



    /**
     * Undocumented function
     *
     * @param ShopRepository $shopRepository
     */
    public function __construct(
        ShopRepository $shopRepository,
        ProductRepository $productRepositery,
        ShopLocationRepository $shopLocationRepository
    ) {
        $this->shopLocationRepository = $shopLocationRepository;
        $this->shopRepository = $shopRepository;
        $this->productRepositery = $productRepositery;
    }
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // return "lemi";
        $shop_data = $this->shopRepository->all();
        $product_data = $this->productRepositery->all()->random(7);

        return response()->json( $product_data);

    }
    /**
     * GetShopLocation function
     *
     * @return mixed
     */
    public function getShopLocation()
    {
        $allLocation = $this->shopRepository->getBasicinfoShop(); //
        return response()->json($allLoction);

    }

    /**
     * SpecificShop function
     * retrieves product and shop detail
     * @param Int shopid
     * @return view
     */
    public function specificShop(Request $request, $shopid)
    {
        $shop_id = $shopid;
        $price = $this->shopRepository->getById($shopid)->product();
        $total = $price->count();
        $statstic_data = array(
            'max_price' => $price->max('price'),
            'min_price' => $price->min('price'),
            'total' => $total
        );
        $shop_data = $this->shopRepository->getById($shopid);
        $shop_products = $this->shopRepository->getById($shopid)
            ->product()->paginate(3);
        if ($request->ajax()) {
            return [
                'posts' => view('frontend.ajax.shop-product-list')->with(compact('shop_data', 'shop_products', 'statstic_data'))->render(),
                'next_page' => $shop_products->nextPageUrl()
            ];
        }

        return view('frontend.shop-listing')
            ->with(
                [
                    'shop_data' => $shop_data,
                    'shop_products' => $shop_products,
                    'statstic_data' => $statstic_data
                ]
            );
    }

    /**
     * GatNameList function
     *
     * @param Int $shopid
     * @param String $usertext
     * @return void
     */
    public function getAutoCompleteList($shopid, $usertext)
    {
        return $this->productRepositery->getAutoComplete($shopid, $usertext)->unique('product_type')->pluck('product_name');
    }

    /**
     * GetProductByName function
     *
     * @param Request $request
     * @param Int $shopid
     * @param String $productname
     * @return void
     */
    public function getProductByName(Request $request, $shopid, $productname)
    {

        $price = $this->shopRepository->getById($shopid)->product();
        $statstic_data = array(
            'max_price' => $price->max('price'),
            'min_price' => $price->min('price')
        );
        $shop_products =  $this->productRepositery->getAutoComplete($shopid, $productname);
        $currentPage = Paginator::resolveCurrentPage() - 1;
        $perPage = 10;
        $currentPageSearchResults = $shop_products->slice($currentPage * $perPage, $perPage)->all();
        $shop_products = new LengthAwarePaginator($currentPageSearchResults, count($shop_products), $perPage);

        $shop_data = $this->shopRepository->getById($shopid);
        if ($request->ajax()) {
            return [
                'posts' => view('frontend.ajax.shop-product-list')->with(compact('shop_data', 'shop_products', 'statstic_data'))->render(),
                'next_page' => $shop_products->nextPageUrl()
            ];
        }
    }
    
    
     /**
     * GetProductByNameFromAll function
     *
     * @param Request $request
     * @param String $productname
     * @return void
     */
    public function getProductByNameFromAll(Request $request, $productname)
    {


        $shop_products =  $this->productRepositery->getProduct($productname);

        return response()->json($shop_products);
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @param Int $shopid
     * @param Int $minprice
     * @param Int $maxprice
     * @return void
     */
    public function getPriceRange(Request $request, $shopid, $minprice, $maxprice)
    {
        //return $shopid;
        $price = $this->shopRepository->getById($shopid)->product();
        $statstic_data = array(
            'max_price' => $price->max('price'),
            'min_price' => $price->min('price')
        );
        $shop_data = $this->shopRepository->getById($shopid);
        $shop_products = $this->productRepositery->getBetweenPrice($shopid, $maxprice, $minprice);
        $currentPage = Paginator::resolveCurrentPage() - 1;
        $perPage = 10;
        $currentPageSearchResults = $shop_products->slice($currentPage * $perPage, $perPage)->all();
        $shop_products = new LengthAwarePaginator($currentPageSearchResults, count($shop_products), $perPage);


        return [
            'posts' => view('frontend.ajax.shop-product-list')->with(compact('shop_data', 'shop_products', 'statstic_data'))->render(),
            'next_page' => $shop_products->nextPageUrl()
        ];
    }
}
