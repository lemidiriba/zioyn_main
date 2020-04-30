<?php

namespace App\Repositories\Frontend\Shop;

use App\Models\Shop;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

/**
 * Used to get shop data
 *
 * Shop class
 */
class ShopRepository extends BaseRepository
{

    /**
     * Construct function
     *
     * @param Shop $model
     */
    public function __construct(Shop $model)
    {
        $this->model = $model;
    }

    /**
     * GEtByUser function
     * return
     * @param [type] $user_id
     * @return void
     */
    public function getbyuser($user_id)
    {
        return $this->where('shop_owner_id', $user_id)->get();
    }

    /**
     * GetBasicinfoShop function
     * used to get basic inofrmation of shop
     *
     * @return mixed shopinfo
     */
    public function getBasicinfoShop()
    {
        return DB::table('shops')
            ->join('shop_locations', 'shops.id', '=', 'shop_locations.shop_id')
            ->select(
                'shops.shop_name',
                'shops.id',
                'shops.shop_logo',
                'shops.shop_description',
                'shop_locations.latitude',
                'shop_locations.longitude'
            )->get();
    }

    /**
     * GetShopCount function
     *
     * @return void
     */
    public function getShopCount()
    {
        return $this->get()->count();
    }
}