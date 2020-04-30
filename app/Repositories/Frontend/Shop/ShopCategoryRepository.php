<?php

namespace App\Repositories\Frontend\Shop;

use App\Models\ShopCategory;
use App\Repositories\BaseRepository;

/**
 * Used To set shop category
 *
 * ShopCategoryRepository class
 */
class ShopCategoryRepository extends BaseRepository
{

    /**
     * Construct function
     *
     * @param ShopCategory $model Database model
     */
    public function __construct(ShopCategory $model)
    {
        $this->model = $model;
    }
}