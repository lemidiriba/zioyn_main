<?php

namespace App\Models;

use App\Models\Shop;
use Illuminate\Database\Eloquent\Model;

/**
 * Undocumented class
 */
class ShopCategory extends Model
{
    /**
     * Undocumented function
     *
     * @return void
     */
    public function shop()
    {
        return $this->hasMany(Shop::class);
    }
}