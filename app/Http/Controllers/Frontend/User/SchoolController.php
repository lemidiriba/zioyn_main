<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\School;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Frontend\Auth\MinistryOfEducationRepository;
use Illuminate\Support\Facades\Auth;
// use Alert;
use RealRashid\SweetAlert\Facades\Alert;

class SchoolController extends Controller
{
    protected $ministryOfEducationRepository;

    /**
     * Undocumented function
     *
     * @param MinistryOfEducationRepository $ministryOfEducationRepository
     */
    public function __construct(MinistryOfEducationRepository $ministryOfEducationRepository)
    {
        $this->ministryOfEducationRepository = $ministryOfEducationRepository;
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
    public function storeSchool(Request $request)
    {

        $this->validate($request, [
            'school_name' => ['required', 'string', 'min:4'],
            'school_phone' => ['required', 'numeric', 'min:10'],
            'school_address' => ['required', 'string', 'min:4'],
            'school_email' => ['required', 'email'],
            'ministry_of_education_id' => ['required', 'string', 'min:4']
        ]);

        try {
            $ministryOfEducationSchooldata  = $this->ministryOfEducationRepository->getByColumn(strtolower($request->school_name), 'schoolname');


            if ($ministryOfEducationSchooldata == null) {
                // return 'no school name';
                alert()->error('Invalid School Name', 'Error');
                return redirect()->route('frontend.user.dashboard');
            } else {
                if ($request->ministry_of_education_id == $ministryOfEducationSchooldata->schoolidentificationid) {

                    $school = new School;

                    $school->schoolname = strtolower($request->school_name);
                    $school->schooladdress = $request->school_address;
                    $school->schoolphone = $request->school_phone;
                    $school->schoolemail = strtolower($request->school_email);
                    $school->ministryofeducationunniqueid = strtolower($request->ministry_of_education_id);
                    $school->schooladminid = Auth::id();

                    if ($school->save()) {
                        alert()->success('School Added Succefully', 'Success')->persistent(false, false);
                        // return 'saved';
                        return redirect()->route('frontend.user.dashboard');
                    } else {
                        alert()->error('School Added Failed', 'Error')->persistent(false, false);
                        // return 'saved';
                        return redirect()->route('frontend.user.dashboard');
                        // return 'not saved';
                    }
                }

                alert()->error('School Add Failed ID must be correct', 'Error')->persistent(false, false);
                return redirect()->route('frontend.user.dashboard');
                // return 'error here' . $request->ministry_of_education_id . ' ' . $ministryOfEducationSchooldata->schoolidentificationid;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit(School $school)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, School $school)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy(School $school)
    {
        //
    }
}