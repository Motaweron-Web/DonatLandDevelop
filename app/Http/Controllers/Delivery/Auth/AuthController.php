<?php

namespace App\Http\Controllers\Delivery\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\DefaultImage;
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
        $this->middleware('jwt')->only('logout','getProfile');
    }//end fun
    public function login(Request $request){


        $rules = [
            'user_name'=>'required|exists:representative,user_name',
            'password'=>'required'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
        $data = $request->validate($rules);

        delivery()->attempt($data,1);

            if (delivery()->check()){
                if (! $token = JWTAuth::fromUser(delivery()->user())) {
                    return helperJson(null,'there is no user',400);
                }
                return helperJson($this->respondWithToken($token,delivery()->user()),'good login');
            }else{
                return helperJson(null,'there is no user',400);
            }


    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request){
        $rules = [
            'phone_number'=>'required|unique:customers,phone_number',
            'name'=>'required|min:10|max:191',
            'address'=>'nullable|min:5|max:191',
            'city'=>'nullable|min:3|max:191',
            'photo'=>'nullable',
            'register_by'=>'nullable'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
        $data = $request->validate($rules);


        if ($request->hasFile('photo')){
            $data['photo'] = $this->uploadFiles('customers',$request->file('photo'));
        }else{
            $data['photo'] = $this->storeDefaultImage('customers',$request->name);
        }

        $customer = Customers::updateOrCreate($data);

        if ($customer){
            if (! $token = JWTAuth::fromUser($customer)) {
                return helperJson(null,'there is no user',400);
            }
        }

        return helperJson($this->respondWithToken($token,$customer),'good register');

    }//end fun
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request){
            delivery()->logout();
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
    //======================================================
    public function update_profile(Request $request){

        $rules = [
//            'phone_number'=>'required|unique:customers,phone_number',
            'id'=>'required|exists:customers,id',
            'name'=>'required|min:10|max:191',
            'address'=>'nullable|min:5|max:191',
            'city'=>'nullable|min:3|max:191',
            'photo'=>'nullable',
            'register_by'=>'nullable'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }else {
            $data = $request->all();
//            $user = Customers::where('id',$request->id)->first();

            if ($request->hasFile('photo')){
                $data['photo'] = $this->uploadFiles('customers',$request->file('photo'));
            }else{
                $data['photo'] = $this->storeDefaultImage('customers',$request->name);
            }
            $customer = Customers::where('id',$request->id)->update($data);
            $data = Customers::where('id',$request->id)->first();

            return helperJson($data,'profile updated successfully');
        }

    }//end fun
    //==========================================================
    //==========================================================
    public function insert_token(Request $request){
        $rules = [
            'phone_token'=>'required',
            'user_id'=>'required|exists:customers,id',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }else{
            $data = PhoneToken::updateOrCreate($request->all());
            return helperJson($data,'token added successfully');
        }
    }//end fun


}//end class
