<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
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
}//end class
