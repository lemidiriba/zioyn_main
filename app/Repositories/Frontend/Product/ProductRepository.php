<?php

namespace App\Repositories\Frontend\Product;

use App\Models\Product;
use App\Repositories\BaseRepository;


/**
 * Used to get shop data
 *
 * Shop class
 */
class ProductRepository extends BaseRepository
{

    /**
     * Construct function
     *
     * @param Shop $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
    }

    /**
     * Undocumented function
     *
     * @param Int $shop_id
     * @return void
     */
    public function getByShop($shop_id)
    {
        return $this->where('shop_id', $shop_id)->all()->random(2);
    }
    
    /**
     * GetProduct function  sd
     *
     * @param string $text
     * @return json
     */
    public function getProduct($text)
    {
        return $this
            ->where("product_name", "%{$text}%", "LIKE")
            ->get();
    }



    /**
     * AutoComplete function  sd
     *
     * @param string $text
     * @return json
     */
    public function getAutoComplete($shop_id, $text)
    {
        return $this
            ->where('shop_id', $shop_id)
            ->where("product_name", "%{$text}%", "LIKE")
            ->get();
    }

    /**
     * Undocumented function
     *
     * @param Int $shop_id
     * @param Int $max_price
     * @param Int $min_price
     * @return void
     */
    public function getBetweenPrice($shop_id, $max_price, $min_price)
    {
        return $data =  $this
            ->where('shop_id', $shop_id)
            ->get()->whereBetween('price', [$min_price, $max_price]);
    }
}