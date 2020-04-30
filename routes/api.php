<?php

use App\Http\Controllers\Api\Users\UserControllerApi;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\ContactControllerApi;
use App\Http\Controllers\Api\HomeControllerApi;
use App\Http\Controllers\Api\Product\ProductControllerApi;
use App\Http\Controllers\Api\Product\ProductDetailControllerApi;
use App\Http\Controllers\Api\Shop\ShopControllerApi;
use App\Http\Controllers\Api\Shop\ShopOwnerControllerApi;
use App\Http\Controllers\Api\Shop\ShopLocationController;
// use App\Http\Controllers\Api\Shop\ShopOwnerControllerApi;

use App\Http\Controllers\Api\PhoneController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(
    ['prefix' => 'v1',/* 'middleware' => 'auth:api'*/],
    function () {

        Route::group(
            ['prefix' => 'user'],
            function () {
                Route::post('register', [UserControllerApi::class, 'registerUser']);
                Route::Post('login', [UserControllerApi::class, 'loginUser']);
                Route::get('logout', [UserControllerApi::class, 'logoutUser']);
                Route::post('activate', [UserControllerApi::class, 'activateUser']);
            }
        );
    }
);

Route::middleware('auth:api')->group(
    function () {
        Route::get('user', [UserControllerApi::class, 'details']);
    }
);





/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::group(
    ['prefix' => 'v1'],
    function () {
        Route::get('/getproduct', [HomeControllerApi::class, 'index'])->name('index');
        Route::get('/oneshop/{id}', [HomeControllerApi::class, 'specificShop'])->name('oneshop');
        Route::get('/autocomplete/{shopid}/{text}', [HomeControllerApi::class, 'getAutoCompleteList'])->name('autocomplete');
        Route::get('/single-product/{shopid}/{text}', [HomeControllerApi::class, 'getProductByName'])->name('ProductByName');
        Route::get('/product/allshop/{text}', [HomeControllerApi::class, 'getProductByNameFromAll'])->name('ProductByNameFromAll');

        Route::get('/shop/price/{id}/{min}/{max}', [HomeControllerApi::class, 'getPriceRange'])->name('getpricerage');

        Route::get('contact', [ContactControllerApi::class, 'index'])->name('contact');
        Route::post('contact/send', [ContactControllerApi::class, 'send'])->name('contact.send');
        Route::get('product-detail/{id}', [ProductDetailControllerApi::class, 'show'])->name('product-detail');
        Route::get('shop-owner/{id}', [ShopOwnerControllerApi::class, 'owner'])->name('shop-owner-detail');
        Route::get('/shop/location/all', [HomeControllerApi::class, 'getShopLocation'])->name('getallshops');


        
    }
);



// /*
//  * These frontend controllers require the user to be logged in
//  * All route names are prefixed with 'frontend.'
//  * These routes can not be hit if the password is expired
//  */
// Route::group(
//     ['middleware' => ['auth', 'password_expires']],
//     function () {
//         Route::group(
//             ['namespace' => 'User', 'as' => 'user.'],
//             function () {
//                 // User Dashboard Specific
//                 Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

//                 // User Account Specific
//                 Route::get('account', [AccountController::class, 'index'])->name('account');

//                 // User Profile Specific
//                 Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
//             }
//         );
//     }
// );

//shop route
Route::group(
    ['prefix' => 'v1', 'middleware' => 'auth:api'],
    function () {
        Route::group(
            ['namespace' => 'Api\Shop'],
            function () {
                //shop
                Route::apiResource('shop', 'ShopControllerApi');
                Route::apiResource('shopcategory', 'ShopCategoryControllerApi');
                // Route::apiResource('geolocation', 'ShopLocationControllerApi');
                Route::apiResource('shopowner', 'ShopOwnerControllerApi');



                //added route to resource Controller
                /////////////////////////////////////////////////
                //add to ShopController
                Route::post('shop/location', [ShopControllerApi::class, 'addLocation'])->name('addLocation');
                Route::get('shop/shopdetail/{id}', [ShopControllerApi::class, 'shopDetail']);                //added to shop owner controller
            }
        );
    }
);

Route::group(
    ['prefix' => 'v1', 'middleware' => 'auth:api'],
    function () {
        Route::group(
            ['namespace' => 'Api\Product'],
            function () {
                Route::delete('product/delete/{id}', [ProductControllerApi::class, 'destroy'])->name('deleteProduct');
                Route::get('product/detail/{id}', [ProductControllerApi::class, 'detail'])->name('productDetail');
                Route::get('product/all/{id}', [ProductControllerApi::class, 'getAllProduct'])->name('allproduct');
                Route::patch('product/update/{id}', [ProductControllerApi::class, 'update'])->name('productUpdate');
            }
        );
    }
);