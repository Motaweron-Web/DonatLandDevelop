<?php

namespace App\Http\Controllers\Delivery\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\DefaultImage;
use App\Models\Customers;
use App\Models\Deliveries;
use App\Models\PhoneToken;
use App\Http\Traits\GeneralTrait;
use App\Http\Traits\PhotoTrait;
use App\Models\RepresentativeToken;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;


class AuthController extends Controller
{
    use DefaultImage;
    use GeneralTrait,PhotoTrait;
    public function __construct()
    {
        $this->middleware('jwt')->only('logout','getProfile');
    }//end fun
    public function login(Request $request){

        $rules = [
            'name'=>'required|exists:representative,user_name',
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
                    return $this->returnError('', 'بيانات الدخول غير صحيحة',403);
                }
//                delivery()->user()->api_token = $token;
//                return $this->returnData('data', delivery()->user(),'تم الدخول بنجاح');
                return helperJson($this->respondWithToken($token,delivery()->user()),'تم الدخول بنجاح');
            }else{
                return $this->returnError('', 'بيانات الدخول غير صحيحة',403);
            }


    }//end fun

    public function logout(Request $request){
        $rules = [
            'token'    => 'required|exists:representative_tokens,token',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }

//        $token = $request -> header('auth-token');
//        if($token){
//            try {
                RepresentativeToken::where(['token'=>$request->token ])->delete();
                delivery()->logout();
//                \Tymon\JWTAuth\Facades\JWTAuth::setToken($token)->invalidate(); //logout
//            }catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e){
//                return  $this -> returnError('','some thing went wrongs',403);
//            }
            return $this->returnSuccessMessage('Logged out successfully');
//        }else{
//            $this -> returnError('','some thing went wrongs');
//        }

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
//    /**
//     * @param Request $request
//     * @return \Illuminate\Http\JsonResponse
//     */
//
//    //======================================================
//    //======================================================
//    public function update_profile(Request $request){
//
//        $rules = [
////            'phone_number'=>'required|unique:customers,phone_number',
//            'id'=>'required|exists:customers,id',
//            'name'=>'required|min:10|max:191',
//            'address'=>'nullable|min:5|max:191',
//            'city'=>'nullable|min:3|max:191',
//            'photo'=>'nullable',
//            'register_by'=>'nullable'
//        ];
//        $validator = Validator::make($request->all(),$rules);
//        if ($validator->fails()){
//            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
//        }else {
//            $data = $request->all();
////            $user = Customers::where('id',$request->id)->first();
//
//            if ($request->hasFile('photo')){
//                $data['photo'] = $this->uploadFiles('customers',$request->file('photo'));
//            }else{
//                $data['photo'] = $this->storeDefaultImage('customers',$request->name);
//            }
//            $customer = Customers::where('id',$request->id)->update($data);
//            $data = Customers::where('id',$request->id)->first();
//
//            return helperJson($data,'profile updated successfully');
//        }
//
//    }//end fun
//    //==========================================================
    //==========================================================
    public function insert_token(Request $request){
        $rules = [
            'rev_id'   => 'required|exists:representative,id',
            'token'    => 'required',
            'type'     => 'required',
        ];
//        $validator = Validator::make($request->all(),$rules);
//        if ($validator->fails()){
//            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
//        }else{
//            $data = RepresentativeToken::updateOrCreate($request->all());
//            return helperJson($data,'token added successfully');
//        }
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }

        $data = RepresentativeToken::updateOrCreate($request->all());
        return $this->returnData('data', $data,'تم بنجاح');
    }//end fun


}//end class
