<?php

namespace App\Http\Controllers\Frontend\shop;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Shop\ShopOwnerRepository;
use Illuminate\Http\Request;

class ShopOwnerController extends Controller
{

    protected $shopOwnerRepository;

    /**
     * Construct function
     *
     * @param ShopOwnerRepository $shopRepository
     */
    public function __construct(ShopOwnerRepository $shopOwnerRepository)
    {
        $this->middleware('auth')->except('owner');
        $this->shopOwnerRepository = $shopOwnerRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Shop-owner function
     *
     * @param Int $id
     * @return void
     */
    public function owner($id)
    {
        //return 'lemi';
        return $this->shopOwnerRepository->getById($id);
    }
}