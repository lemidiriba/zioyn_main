<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Shop\ShopCategoryRepository;
use App\Repositories\Frontend\Shop\ShopRepository;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{

    protected $shopRepository;
    protected $shopCategoryRepository;

    /**
     * Construct function
     *
     * @param ShopRepository $shopRepository used to get shop
     * @param ShopCategoryRepository $shopCategoryRepository used to get shop category
     */
    public function __construct(ShopRepository $shopRepository, ShopCategoryRepository $shopCategoryRepository)
    {
        $this->shopCategoryRepository = $shopCategoryRepository;
        $this->shopRepository = $shopRepository;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $totalshop = $this->shopRepository->getShopCount();
        $shopcountbycatagory = $this->shopCategoryRepository->get();

        // $shopcountbycatagory[0]->shop->count();

        return view('backend.dashboard')->with(compact('totalshop', 'shopcountbycatagory'));
    }
}