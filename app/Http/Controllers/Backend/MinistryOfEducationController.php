<?php

namespace App\Http\Controllers\Backend;

use Alert;
use App\MinistryOfEducation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MinistryOfEducation as ModelsMinistryOfEducation;
use App\Models\School;
use App\Repositories\Frontend\Auth\MinistryOfEducationRepository;

class MinistryOfEducationController extends Controller
{

    /**
     * Undocumented function
     *
     * @param ModelsMinistryOfEducation $modelsministryOfEducation
     * @param MinistryOfEducationRepository $ministryOfEducationRepository
     * @param School $school
     */
    public function __construct(ModelsMinistryOfEducation $modelsministryOfEducation, MinistryOfEducationRepository $ministryOfEducationRepository, School $school)
    {
        $this->middleware('auth');
        $this->ministryOfEducationRepository = $ministryOfEducationRepository;
        $this->school = $school;
        $this->modelsministryOfEducation = $modelsministryOfEducation;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend.school');
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
        $this->validate(
            $request,
            [
                'school_name' => 'string|required|unique:ministry_of_education,schoolname|min:4|max:100',
                'school_address' => 'string|required|min:4|max:100',
                'school_region' => 'string|required|min:4|max:100',
                'school_phone' => 'required|numeric|min:10',
                'school_identification_id' => 'string|required|unique:ministry_of_education,schoolidentificationid'
            ]
        );

        $ministryOfEducation = new ModelsMinistryOfEducation();

        $ministryOfEducation->schoolname = $request->input("school_name");
        $ministryOfEducation->schooladdress = $request->input("school_address");
        $ministryOfEducation->schoolregion = $request->input("school_region");
        $ministryOfEducation->schoolphone = $request->input("school_phone");
        $ministryOfEducation->schoolidentificationid = $request->input("school_identification_id");

        if ($ministryOfEducation->save()) {
            alert()->success("School Added Successfully", "Success");
            $dashboard_data = [
                'total_school' => $this->ministryOfEducationRepository->count(),
                'active_school' => $this->school->count(),
            ];
            return view('backend.dashboard')->with($dashboard_data);
            alert()->error("School Add failed", "Error");
            $dashboard_data = [
                'total_school' => $this->ministryOfEducationRepository->count(),
                'active_school' => $this->school->count(),
            ];
            return view('backend.dashboard')->with($dashboard_data);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MinistryOfEducation  $ministryOfEducation
     * @return \Illuminate\Http\Response
     */
    public function show(MinistryOfEducation $ministryOfEducation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MinistryOfEducation  $ministryOfEducation
     * @return \Illuminate\Http\Response
     */
    public function edit(MinistryOfEducation $ministryOfEducation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\MinistryOfEducation  $ministryOfEducation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(
            $request,
            [
                'schoolname' => 'string|required|min:4|max:100',
                'schooladdress' => 'string|required|min:4|max:100',
                'schoolregion' => 'string|required|min:4|max:100',
                'schoolphone' => 'required|numeric|min:10',
                'schoolidentificationid' => 'string|required'
            ]
        );

        $ministryOfEducation = ModelsMinistryOfEducation::find($id);

        $ministryOfEducation->schoolname = $request->input("schoolname");
        $ministryOfEducation->schooladdress = $request->input("schooladdress");
        $ministryOfEducation->schoolregion = $request->input("schoolregion");
        $ministryOfEducation->schoolphone = $request->input("schoolphone");
        $ministryOfEducation->schoolidentificationid = $request->input("schoolidentificationid");

        if ($ministryOfEducation->save()) {
            alert()->success("School Update Successfully", "Success");
            $dashboard_data = [
                'total_school' => $this->ministryOfEducationRepository->count(),
                'active_school' => $this->school->count(),
            ];
            return response($request, 200);
        } else {
            alert()->error("School Update failed", "Error");
            $dashboard_data = [
                'total_school' => $this->ministryOfEducationRepository->count(),
                'active_school' => $this->school->count(),
            ];

            return response($request, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MinistryOfEducation  $ministryOfEducation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $ministryOfEducation = ModelsMinistryOfEducation::find($id);
        if (!empty($ministryOfEducation)) {
            if ($ministryOfEducation->delete()) {
                return response($request, 200);
            } else {
                return response($request, 200);
            }
            
        }
        return response($request, 200);
    }
}