<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

/**
 * Class HomeController.
 */
class HomeController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('frontend.index');
    }



    /**
     * About function
     *
     * @return void
     */
    public function about()
    {
        return view('frontend.about');
    }
     /**
     * Privacy Policy function
     *
     * @return void
     */
    public function privacyPolicy()
    {
        return view('frontend.privacypolicy');
    }
}

