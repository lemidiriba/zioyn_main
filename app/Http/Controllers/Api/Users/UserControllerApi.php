<?php


/**
 * ShopController is used to manipulate shop
 *
 * @category Api
 *
 * @package App/Http/Controller/Api/User
 *
 * @author Lemi Diriba <lemidiriba4@gmail.com>
 *
 * @license http://www.zioyn.com Ziyon 2020
 *
 * @link http://zioyn.com
 */

namespace App\Http\Controllers\Api\Users;

use Validator;
use App\Models\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Frontend\Auth\UserRepositoryApi;

/**
 * ShopController class
 *
 * @category Api
 *
 * @package App/Http/Controller/Api/UserController
 *
 * @author Lemi Diriba <lemidiriba4@gmail.com>
 *
 * @license http://www.zioyn.com Ziyon 2020
 *
 * @link http://zioyn.com
 */
class UserControllerApi extends Controller
{

    /** Constructor
     *
     * @param UserRepositoryApi $userRepositoryApi user
     */
    public function __construct(UserRepositoryApi $userRepositoryApi)
    {
        $this->userRepositoryApi = $userRepositoryApi;
    }

    /**
     * ActivateUser function
     *
     * @param Request $request
     *
     * @return void
     */
    public function activateUser(Request $request)
    {
        return $this->request;
    }


    public $successStatus = 200;
    /**
     * LoginUser api
     *
     * @return \Illuminate\Http\Response
     */
    public function loginUser()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            // $user = $this->userRepositoryApi->user();
            $user = Auth::user();
            $success['token'] =  $user->createToken('acc_token')->accessToken;
            $success['user_data'] = $user->id;
            $success['autorized'] = true;
            return response()->json( $success, $this->successStatus);
        } else {
            return response()->json(['error' => 'unautorized'], 401);
        }
    }
    /**
     * RegisterUser api
     *
     * @return \Illuminate\Http\Response
     */
    public function registerUser(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                // 'first_name' => 'required',
                // 'last_name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
                'c_password' => 'required|same:password',
            ]
        );
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = $this->userRepositoryApi->create($input);
        $success['token'] =  $user->createToken('acc_token')->accessToken;
        $success['user_id'] =  $user->id;
        $success['autorized'] = true;
        
        return response()->json($success, $this->successStatus);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    // public function details()
    // {
    //     $user = Auth::user();
    //     return response()->json(['success' => $user], $this->successStatus);
    // }
}