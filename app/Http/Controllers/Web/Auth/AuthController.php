<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Traits\DefaultImage;

class AuthController extends Controller
{
   use DefaultImage;

    public function __construct()
    {
        $this->middleware('admin')->only('logout');
    }

    public function login(Request $request){
        if (admin()->check()){
            return redirect('admin');
        }

        return view('Web.Auth.login');
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function doLogin(Request $request){
        $data = $request->validate([
           'name'=>'required|exists:users',
           'password'=>'required'
        ]);
        $remember = $request->remember??0;
        if (admin()->attempt($data,$remember)){
            return response()->json(200);
        }

        return response()->json(405);

    }//end fun

    public function logout(Request $request){
        admin()->logout();
        toastr()->info('تم تسجيل الخروج');
        return redirect()->route('login');
    }//end fun

    public function update_profile(Request $request){
        $rules = [
            'name'=>'required|unique:users,name,'.admin()->user()->id,
            'email'=>'email|required|unique:users,email,'.admin()->user()->id
        ];
        $messages = [
            'name.required' =>'الاسم مطلوب',
            'email.required' =>'البريد الالكترونى مطلوب',
            'name.unique' =>'الاسم موجود مسبقا',
            'email.unique' =>'البريد الالكترونى موجود مسبقا',
            'email.email' =>'البريد الالكترونى خطأ'
        ];
        $validator = Validator::make($request->all() , $rules ,$messages);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'status'=>422],200);
        }
        $admin = User::where('id',admin()->user()->id)->first();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = $request->password ? Hash::make($request->password) : admin()->user()->password;
//        if ($request->hasFile('image')){
//            $admin['image'] = $this->uploadFiles('admin',$request->file('image'),$admin->image);
//        }else{
//            $admin['image'] = $this->storeDefaultImage('admin',$request->name);
//        }
        $admin->save();

        return response()->json(['data'=>null,'message'=>'','status'=>200],200);
    }//end fun
}//end class
