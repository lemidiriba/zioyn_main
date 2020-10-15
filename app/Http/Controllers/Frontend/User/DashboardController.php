<?php

namespace App\Http\Controllers\Frontend\User;

use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\SchoolRepository;

use Illuminate\Support\Facades\Auth;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    protected $schoolRepository;
    public function __construct(SchoolRepository $schoolRepository)
    {
        $this->schoolRepository = $schoolRepository;
    }


    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $hasschool = false;

        if ($this->schoolRepository->getByColumn(Auth::id(), 'schooladminid') != null) {
            $hasschool = true;
        }

        return view('frontend.user.dashboard')->with(['hasschool' => $hasschool]);
    }
}