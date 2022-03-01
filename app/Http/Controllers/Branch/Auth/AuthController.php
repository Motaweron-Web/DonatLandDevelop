<?php

namespace App\Http\Controllers\Branch\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\DefaultImage;
use App\Models\Branches;
use App\Models\Customers;
use App\Models\Deliveries;
use App\Models\PhoneToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class AuthController extends Controller
{
    use DefaultImage;
    public function __construct()
    {
        $this->middleware('jwt')->only('logout');
    }//end fun
    public function login(Request $request){

        $rules = [
            'email'=>'required|exists:users,email',
            'password'=>'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
        $data = $request->validate($rules);
        $token = branch()->attempt($data,1);
        $branch = branch()->user();
        $branches = Branches::pluck('id')->toArray();

        if (! $token ) {
            return helperJson(null,'there is no user',400);
        }
        if (! in_array($branch->branch_id,$branches)){
            return helperJson([$branch->branch_id,$branches],'this user has no branch',400);
        }
        $branch = Branches::where('id',branch()->user()->branch_id)->first();
        return helperJson($this->respondWithToken($token,$branch),'good login');

    }//end fun
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request){
        PhoneToken::where('phone_token',$request->phone_token)->delete();
        branch()->logout();

        return helperJson(null,'log out successfully',200);


    }//end fun
    /**
     * @param $token
     * @param $user
     * @return array
     */
    protected function respondWithToken($token,$user)
    {
        return [
            'user'=>$user,
            'access_token' => 'Bearer '.$token,
            'token_type' => 'bearer',
            'expires_in' => delivery()->factory()->getTTL()
        ];
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */

    //======================================================

    //==========================================================
    public function insert_token(Request $request){
        $rules = [
            'phone_token'=>'required',
            'user_id'=>'required|exists:users,id',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }else{
            $data = $request->all();
            $data['user_type'] = 'user';
            $data = PhoneToken::updateOrCreate($data);
            return helperJson($data,'token added successfully');
        }
    }//end fun


}//end class
