<?php

namespace App\Models;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;

/**
 * Product Model class
 */
class Product extends Model
{
    /**
     * Shop Relation function
     *
     * @return void
     */
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}