<?php

namespace App\Repositories\Frontend\Shop;

use App\Models\ShopLocation;
use App\Repositories\BaseRepository;

/**
 * Used for getting shop location
 *
 * ShopLocation class
 */
class ShopLocationRepository extends BaseRepository
{

    /**
     * Construct function
     *
     * @param ShopLocation $model
     */
    public function __construct(ShopLocation $model)
    {
        $this->model = $model;
    }
}