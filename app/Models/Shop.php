<?php

namespace App\Models;

use App\Models\Product;
use App\Models\ShopCatagory;
use Illuminate\Database\Eloquent\Model;

/**
 * Shop Model class
 */
class Shop extends Model
{
    /**
     * @return void
     */
    public function product()
    {
        return $this->hasMany(Product::class);
    }
    /**
     * @return mixed
     */
    public function shopcategory()
    {
        return $this->belongsTo(ShopCatagory::class);
    }
    /**
     * @return mixed user
     */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return mixed location
     */
    public function location()
    {
        return $this->hasOne(ShopLocation::class);
    }
}