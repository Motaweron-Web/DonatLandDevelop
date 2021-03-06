<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\DefaultImage;
use App\Models\Customers;
use App\Models\PhoneToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
class AuthController extends Controller
{
    use DefaultImage;
    public function __construct()
    {
        $this->middleware('jwt')->only('logout','getProfile','getProfile');
    }//end fun
    public function login(Request $request){
        $rules = [
            'phone_number'=>'required|exists:customers,phone_number'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
        $data = $request->validate($rules);
            $user = Customers::where($data);
            if ($user->count()){
                if (! $token = JWTAuth::fromUser($user->firstOrFail())) {
                    return helperJson(null,'there is no user',400);
                }
                return helperJson($this->respondWithToken($token,$user->firstOrFail()),'good login');
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

        return helperJson($this->respondWithToken($token,Customers::findOrFail($customer->id)),'good register');

    }//end fun
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request){
        $rules = [
            'phone_token'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }else{
            PhoneToken::where('phone_token',$request->phone_token)->delete();
            \auth()->logout();
            return helperJson(null,'log out successfully',200);
        }

    }//end fun
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProfile(Request $request){
        if (\auth()->check()){
            if (! $token = JWTAuth::fromUser(\auth()->user())) {
                return helperJson(null,'there is no user',400);
            }
        }
        return helperJson($this->respondWithToken($token,\auth()->user()),'good query');
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
            'expires_in' => auth()->factory()->getTTL()
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
