<?php

namespace App\Http\Controllers\Frontend;

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
class HomeController extends Controller
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

        $shop_data = $this->shopRepository->all();
        $product_data = $this->productRepositery->all(); //->random(7);

        return view('frontend.index')->with(['shop_datas' => $shop_data, 'product_datas' => $product_data]);
    }
    /**
     * GetShopLocation function
     *
     * @return mixed
     */
    public function getShopLocation()
    {
        return $allLocation = $this->shopRepository->getBasicinfoShop(); //

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
        // return $minprice;
        $price = $this->shopRepository->getById($shopid)->product();
        $statstic_data = array(
            'max_price' => $price->max('price'),
            'min_price' => $price->min('price')
        );
        $shop_data = $this->shopRepository->getById($shopid);
        $shop_products = $this->productRepositery->getBetweenPrice($shopid, $maxprice, $price->min('price'));
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