<?php

use App\Models\ShopCategory;
use Illuminate\Database\Seeder;

class ShopCategorySeeder extends Seeder
{
    /**
     * Run the database seed.
     */
    public function run()
    {

        // Add the master administrator, user id of 1
        ShopCategory::create(
            [
                'category_name' => 'Apparel and Shoes',
                'created_by' => 1,
            ]
        );

        // Add the master administrator, user id of 1
        ShopCategory::create(
            [
                'category_name' => 'Audio Print and Video',
                'created_by' => 1,

            ]
        );
        // Add the master administrator, user id of 1
        ShopCategory::create(
            [
                'category_name' => 'Electronics and Phones',
                'created_by' => 1,

            ]
        );
        // // Add the master administrator, user id of 1
        // ShopCategory::create([
        //     'category_name' => 'Food and Spirits',
        //     'created_by' => 1,

        // ]);
        // Add the master administrator, user id of 1
        ShopCategory::create(
            [
                'category_name' => 'Health and Beauty',
                'created_by' => 1,
            ]
        );

        // Add the master administrator, user id of 1
        ShopCategory::create(
            [
                'category_name' => 'Jewelry and Gifts',
                'created_by' => 1,

            ]
        );
        // Add the master administrator, user id of 1
        // ShopCategory::create([
        //     'category_name' => 'Kids Corner',
        //     'created_by' => 1,
        // ]);
        // Add the master administrator, user id of 1
        // ShopCategory::create([
        //     'category_name' => 'Office and Services',
        //     'created_by' => 1,

        // ]);
        // Add the master administrator, user id of 1
        ShopCategory::create(
            [
                'category_name' => 'Sports and Outdoors',
                'created_by' => 1,

            ]
        );
        // Add the master administrator, user id of 1
        // ShopCategory::create([
        //     'category_name' => 'Vehicles and Garage',
        //     'created_by' => 1,

        // ]);

    }
}