<?php

namespace App\Http\Controllers\Api\Shop;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Shop;
use App\Models\ShopLocation;
use App\Repositories\Frontend\Shop\ShopCategoryRepository;
use App\Repositories\Frontend\Shop\ShopLocationRepository;
use App\Repositories\Frontend\Shop\ShopRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

//use Illuminate\Support\Facades\Input;

/**
 * ShopController class.
 */
class ShopControllerApi extends Controller
{
    protected $shopRepository;
    protected $shopLocationRepository;
    //modal
    protected $shopLocation;
    protected $shopModel;

    /**
     * Construct function.
     *
     * @param ShopRepository $shopRepository
     * @param ShopLocationRepository $shopLocationRepository
     */
    public function __construct(ShopRepository $shopRepository,  ShopLocationRepository $shopLocationRepository)
    {
        $this->middleware('auth');
        $this->shopRepository = $shopRepository;
        $this->shopLocationRepository = $shopLocationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shopList = $this->shopRepository->where('user_id', Auth::id());

        return response()->json(['myShops', $shopList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->file('image_file');
        $this->validate(
            $request,
            [
                'shop_name' => ['required', 'unique:shops,shop_name', 'string', 'min:3', 'max:100'],
                'shop_category' => 'required',
                'Shop_description' => ['required', 'string'],
                'image_file' => ['image', 'mimes:jpeg,jpg,png,gif', 'max:20000'],
            ]
        );

        if ($request->hasFile('image_file')) {
            $filenamewithext = $request->file('image_file')->getClientOriginalName();

            $filename = str_replace(' ', '', pathinfo($filenamewithext, PATHINFO_FILENAME));
            $extension = $request->file('image_file')->getClientOriginalExtension();
            $filenametostore = trim($filename, "\t\n\r\0\x0B") . '__' . time() . '.' . $extension;
            //$path = $request->file('image_file')->storeAs('public/shop_image/shop_logo', $filenametostore);
        }
        //return $filenametostore;
        //reigistering shop name to data base
        $shop_data = new Shop();
        $shop_data->shop_name = $request->shop_name;
        $shop_data->shop_logo = $filenametostore;
        $shop_data->shop_description = $request->shop_name;
        $shop_data->shop_category_id = $request->shop_category;
        $shop_data->shop_owner_id = Auth::id();
        $shop_data->created_by = Auth::user()->name;

        //Saving shop data
        if ($shop_data->save()) {

            $request->file('image_file')->storeAs('public/shop_image/shop_logo', $filenametostore);

            return response()->json(['success' => 'Shop Added Successfuly']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return 'lemi update';
        $this->validate(
            $request,
            [
                'shop_name' => ['required', 'unique:shops,shop_name', 'string', 'min:3', 'max:100'],
                'Shop_description' => ['required', 'string'],
                'image_file' => ['image', 'mimes:jpeg,jpg,png,gif', 'max:20000'],
            ]
        );
        $shop_data =  Shop::find($id);

        if ($request->hasFile('image_file')) {
            $filenamewithext = $request->file('image_file')->getClientOriginalName();

            $filename = str_replace(' ', '', pathinfo($filenamewithext, PATHINFO_FILENAME));
            $extension = $request->file('image_file')->getClientOriginalExtension();
            $filenametostore = trim($filename, "\t\n\r\0\x0B") . '__' . time() . '.' . $extension;
            $shop_data->shop_logo = $filenametostore;
            $request->file('image_file')->storeAs('public/shop_image/shop_logo', $filenametostore);

            //$path = $request->file('image_file')->storeAs('public/shop_image/shop_logo', $filenametostore);
        }
        //return $filenametostore;
        //reigistering shop name to data base
        $shop_data->shop_name = $request->shop_name;
        $shop_data->shop_description = $request->shop_name;


        //Saving shop data
        if ($shop_data->save()) {
            return response()->json(['success' => 'Shop update Successfuly']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id shop id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $id;
    }

    /**
     * AddLocation function.
     *
     * @param Request $request
     *
     * @return String
     */
    public function addLocation(Request $request)
    {
        $this->validate(
            $request,
            [
                'lat' => ['required', 'numeric'],
                'lng' => ['required', 'numeric'],
                'shop_id' => ['required', 'integer'],
            ]
        );
        //check if location exist
        //then add location or update location
        $shopExist = $this->shopLocationRepository->where('Shop_id', $request->shop_id)->get();

        //return '' . is_null($shopExist = ShopLocation::find($request->shop_id));
        if (count($shopExist) == 0) {
            $shopData = new ShopLocation();
            //no shop locaion exist
            $shopData->shop_id = $request->shop_id;
            $shopData->longitude = $request->lng;
            $shopData->latitude = $request->lat;
            $shopData->save();

            return ['message' => 'Location Added'];
        } else {
            //shop location update location
            $shopExist1 = ShopLocation::find($shopExist[0]->id);
            $shopExist1->longitude = $request->lng;
            $shopExist1->latitude = $request->lat;
            $shopExist1->update();

            return response()->json(['message' => 'Location Updated']);
        }
        //return $request;
    }

    /**
     * Undocumented function
     *
     * @param int $id shop id
     *
     * @return void
     */
    public function shopDetail($id)
    {
        return response()->json(['shop_detail' => $this->shopRepository->getById($id)]);
    }
}
