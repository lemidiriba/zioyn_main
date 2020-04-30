<?php

/**
 * ProductListController is used to retrieve products from the shops
 *
 * @category Api
 *
 * @package App/Http/Controller/Api
 *
 * @author Lemi Diriba <lemidiriba4@gmail.com>
 *
 * @license http://www.zioyn.com Ziyon 2020
 *
 * @link http://zioyn.com
 */

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Product\ProductRepository;
use App\Repositories\Frontend\Shop\ShopLocationRepository;
use App\Repositories\Frontend\Shop\ShopRepository;
use Illuminate\Http\Request;

/**
 * ProductListController class
 *
 * @category Api
 *
 * @package App/Http/Controller/Api
 *
 * @author Lemi Diriba <lemidiriba4@gmail.com>
 *
 * @license http://www.zioyn.com Ziyon 2020
 *
 * @link http://zioyn.com
 */
class ProductListControllerApi extends Controller
{

    protected $productRepository;
    protected $shopLocationRepository;
    protected $shopRepository;



    /**
     * Constructor function
     * @param ProductRepository $productRepository used to retrieve products
     * @param ShopLocationRepository $shopLocationRepository used to retrieve Shop Location
     */
    public function __construct(ProductRepository $productRepository, ShopLocationRepository $shopLocationRepository, ShopRepository $shopRepository)
    {
        $this->productRepository = $productRepository;
        $this->shopLocationRepository = $shopLocationRepository;
        $this->shopRepository = $shopRepository;
    }


    /**
     * GetApproximateShopProduct function return Product that are approximate to the
     *  users location ,this method returns data that are 3 bus ticket away
     *
     * @param Array $nearby return nearby shop
     *
     * @return Json
     */
    public function getApproximateShopProduct($shops)
    {
        $shopproductcollection = array();
        foreach ($shops as $shop) {
            $shopproductcollection[$shop->id] = $this->shopRepository->getById($shop->id)->product();
        }
        return $shopproductcollection;
    }


    /**
     * GetApproximateShopCountryProduct function
     * return Product that are approximate to the
     *  users location ,this method
     * returns data that are 1 CrossCounty bus ticket away
     *
     * @param Array $croscountry return cross country shops
     *
     * @return Json
     */
    public function getApproximateShopCountryProduct($croscountry)
    {
    }

    /**
     * FindApproximateShop function
     *
     * @param Json $location gives users location
     *
     * @return Json
     */
    public function findApproximateShop($location)
    {
        return response()->json($this->calculateLocation($location));
    }

    /**
     * CalculateLocation function
     *
     * @param Object $coordinate Location on map contains lat and lng
     *
     * @return Json
     */
    public function calculateLocation($coordinate)
    {
        //get all shop coordinate based on users country
        $allshopinformation = $this->shopLocationRepository->all();

        $apicalculateddistance = 0; //this value is calculated by mapbox-gl api

        $this->filterDistance($apicalculateddistance);
    }

    /**
     * FilterDistance function
     *
     * @param Json $apicalculateddistance retrived from mapbox
     *
     * @return Array
     */
    public function filterDistance($apicalculateddistance)
    {
        $nearby = array();
        $croscountry = array();

        //this is run for calculating determining the approximate distance between coordinates
        $locationrule = array(
            'nearby' => 123,
            'crosscountry' => 520,
        );

        foreach ($apicalculateddistance as $location) {
            if ($location->distance < $locationrule->nearby) {
                array_push($nearby, $location);
            } else {
                array_push($croscountry, $location);
            }
        }
        $nearbyproduct = $this->getApproximateShopProduct($nearby);
        $croscountryproduct = $this->getApproximateShopProduct($croscountry);

        return response()->json(['nearby_product' => $nearbyproduct, 'crosscountry_Product' => $croscountryproduct]);
    }
}