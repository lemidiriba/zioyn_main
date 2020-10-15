<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\School;
use App\Repositories\Frontend\Auth\SchoolRepository;
use App\Repositories\Frontend\Auth\UserRepository;
use Carbon\Carbon;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;
use Spatie\Searchable\Search;

use Illuminate\Pagination\Paginator;

use Illuminate\Support\Collection;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Date;
use Symfony\Component\VarDumper\Cloner\Data;

class StudentController extends Controller
{
    protected $userRepository, $schoolRepository;

    /**
     * Construct function
     *
     * @param UserRepository $userRepository
     * @param SchoolRepository $schoolRepository
     */
    public function __construct(UserRepository $userRepository, SchoolRepository $schoolRepository)
    {
        $this->userRepository = $userRepository;
        $this->schoolRepository = $schoolRepository;
    }

    /**

     * The attributes that are mass assignable.

     *

     * @var array

     */

    public function paginate($items, $perPage = 1, $page = null, $options = [])

    {

        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);

        $items = $items instanceof Collection ? $items : Collection::make($items);

        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    /**
     * Format bytes to kb, mb, gb, tb
     * by swimlappy
     *
     * @param  integer $size
     * @param  integer $precision
     * @return integer
     */
    public static function formatBytes($size, $precision = 2)
    {
        if ($size > 0) {
            $size = (int) $size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), $precision) . $suffixes[floor($base)];
        } else {
            return $size;
        }
    }

    /**
     * DateFormatData function
     *
     * @param DateTime $dateFormat
     * @return void
     */
    public function dateFormatData(DateTime $dateFormat)
    {
        foreach ($dateFormat as $value) {
            return $value;
        }
    }

    /**
     * Persistantdata function
     * get data which are available over the hole page
     *
     * @return array
     */
    protected function persistantData()
    {
        //unsharp package create top directory folders for the user based on the user id
        //holdes user id
        //get user school assosiated with that id
        //get school name
        //collect school name to single array
        //collect all school data and uploaded file
        $unsharpdirschooldata = [];
        $topleveldir =  Storage::directories('public/files');
        foreach ($topleveldir as $value) {
            //find the last dir name
            $schooldatainfo = $this->schoolRepository->getByColumn(Str::afterLast($value, '/'), 'schooladminid');

            $tootalfiles = Storage::allfiles($value);

            $schooldata = ['school_name' => $schooldatainfo['schoolname'],
            'total_files' => count($tootalfiles)];
            

            if ($schooldatainfo != null) {
                array_push($unsharpdirschooldata, $schooldata);
            }
            // $unsharpdirschooldata =  Str::afterLast($value, '/');



            // print('');
        }

        return $unsharpdirschooldata;
    }

    /**
     * Persistantdata function
     * get data which are available over the hole page
     *
     * @return array
     */
    protected function persistentSchoolData(String $id)
    {
        $unsharpdirschooldata = [];
        $top_level_dir =  Storage::directories('public/files/' . $id);
        // array_push($unsharpdirschooldata, ['school_name' => $schooldatainfo['schoolname']]);

        foreach ($top_level_dir as $value) {
            //find the last dir name

            // $total_files = Storage::allfiles($value);

            $second_level_dir =  Storage::directories('public/files/' . $id . '/' . Str::afterLast($value, '/'));
            $subjectdata = [];
            foreach ($second_level_dir as $second_value) {

                $total_subject_files = Storage::allfiles($second_value);
                $school_data_subject = [
                    'school_subject' => Str::afterLast($second_value, '/'),
                    'total_subject_files' => count($total_subject_files)
                ];
                array_push($subjectdata, $school_data_subject);
            }

            $school_data = ['school_grade' => Str::afterLast($value, '/'), 'school_subject' => $subjectdata];


            array_push($unsharpdirschooldata, $school_data);


            // print('');
        }

        return $unsharpdirschooldata;
    }

    /**
     * PersistentSchoolFile function
     *
     * @param String $id
     * @param String $subject
     * @return void
     */
    protected function persistentSchoolFile(String $id, String $school_grade, String $subject)
    {
        $unsharpdirschooldata = [];
        $second_level_dir =  Storage::allfiles('public/files/' . $id . '/' . $school_grade . '/' . $subject);
        foreach ($second_level_dir as $value) {

            $school_data_subject = [
                'school_subject' => $subject,
                'file_name' => Str::afterLast($value, '/'),
                'subject_files_destination' => str_replace('public', 'storage', $value),
                'file_property' => [
                    'size' => $this->formatBytes(Storage::size($value), 1),
                    'last_modified' => Carbon::createFromFormat('Y-m-d H:i:s.000000', $this->dateFormatData(DateTime::createFromFormat('U', Storage::lastModified($value)))),
                    'type' => Str::afterLast(Storage::mimeType($value), '/')

                ],
            ];
            array_push($unsharpdirschooldata, $school_data_subject);
        }





        return $unsharpdirschooldata;
    }
    /**
     * Index function
     *
     * @return void
     */
    public function index()
    {
        return view('frontend.student')->with(['school_data' => $this->persistantData(), 'search_result' => '']);
    }

    /**
     * Search function
     *
     * @param String $school_name
     * @return void
     */
    public function searchSchool(Request $request)
    {
        $search_word = "";

        if ($request->input('searchword') == null) {
            $search_word = '';
        } else {
            $search_word = $request->input('searchword');
        }
        $search_result = (new Search())->registerModel(School::class, 'schoolname')->search($search_word);
        // $search_result = $this->paginate($search_result, 1);
        //  $search_result->withPath(url('gust/search/'));
        return view('frontend.student')->with(['school_data' => $this->persistantData(), 'search_result' => $search_result]);
    }

    /**
     * SchoolHome function
     *
     * @param String $id
     * @return void
     */
    public function schoolHome(String $id)
    {
        // return $this->persistantSchoolData($id);
        $schooldatainfo = $this->schoolRepository->getByColumn($id, 'schooladminid');
        $school_name = $schooldatainfo->schoolname;
        return view('frontend.schoolhome')->with(['school_data' => $this->persistentSchoolData($id), 'search_result' => '', 'school_name' => $school_name]);
    }


    /**
     * SchoolSubject function
     *
     * @param String $id
     * @return void
     */
    public function schoolSubject(String $id, String $schoolgrade, String $subject)
    {
        // return 'hello here' . $subject . $id;
        // return $this->persistentSchoolFile($id, $schoolgrade, $subject);
        $schooldatainfo = $this->schoolRepository->getByColumn($id, 'schooladminid');
        $school_name = $schooldatainfo->schoolname;
        return view('frontend.subjectlist')->with(['school_data' => $this->persistentSchoolFile($id, $schoolgrade, $subject), 'school_name' => $school_name]);
    }
}