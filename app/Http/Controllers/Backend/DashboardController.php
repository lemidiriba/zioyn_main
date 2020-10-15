<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Repositories\Frontend\Auth\MinistryOfEducationRepository;
use DataTables;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{

    /**
     * Undocumented function
     *
     * @param MinistryOfEducationRepository $ministryOfEducationRepository
     */
    public function __construct(MinistryOfEducationRepository $ministryOfEducationRepository, School $school)
    {
        $this->middleware('auth');

        $this->ministryOfEducationRepository = $ministryOfEducationRepository;
        $this->school = $school;
    }

    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $dashboard_data = [
            'total_school' => $this->ministryOfEducationRepository->count(),
            'active_school' => $this->school->count(),
        ];
        return view('backend.dashboard')->with($dashboard_data);
    }
    /**
     * Undocumented function
     *
     * @return void
     */
    public function getSchool()
    {

        $val =   $this->ministryOfEducationRepository->all();
        return DataTables::of($val)->make(true);
    }
}
