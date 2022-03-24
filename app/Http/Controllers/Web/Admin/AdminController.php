<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function rules()
    {
        return [
            'name'=>'required|unique:users,name,',
            'email'=>'email|required|unique:users,email',
            'phone'=>'required'
        ];
    }
    //==========================================
    public function update_rules($id)
    {
        return [
            'name'=>'required|unique:users,name,'.$id,
            'email'=>'email|required|unique:users,email,'.$id,
            'phone'=>'required'
        ];
    }
    //==========================================
    public function messages()
    {
        return [
            'name.required' =>'الاسم مطلوب',
            'email.required' =>'البريد الالكترونى مطلوب',
            'name.unique' =>'الاسم موجود مسبقا',
            'email.unique' =>'البريد الالكترونى موجود مسبقا',
            'email.email' =>'البريد الالكترونى خطأ',
            'phone.required' =>'الهاتف مطلوب'
        ];
    }
    //==========================================
    public function index(){
        $users = User::where([['role_id','1'],['id','<>',\admin()->user()->id]])->get();
        return view('Web.Users.Admins.index',compact('users'));
    }
    //=========================================================================
    public function new_admin(Request $request){
//        return $request->all();
        $validator = Validator::make($request->all(),$this->rules(),$this->messages());
        if ($validator->fails())
            return response()->json(['data'=>'','message'=>$validator->errors()->getMessages(),'status'=>422],200);
        $data = new User;
        $data['password'] = Hash::make($request->password);
        $data['name'] = $request->name;
        $data['company_name'] = $request->company_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data['role_id'] = '1';
        $data['is_active'] = '1';
        $data['is_deleted'] = '0';
//        return $data;
        $data->save();

        return response()->json(['data'=>null,'message'=>'','status'=>200],200);
    }
    //=======================================================================
    public function edit_admin($id){
        $admin = User::where('id',$id)->first();
        $html = view('Web.Users.Admins.edit',compact('admin'))->render();
        return response()->json($html);
    }
    //=======================================================================
    public function admin_update(Request $request){
        $data = User::where('id',$request->id)->first();
        $validator = Validator::make($request->all(),$this->update_rules($data->id),$this->messages());
        if ($validator->fails())
            return response()->json(['data'=>'','message'=>$validator->errors()->getMessages(),'status'=>422],200);

        if ($request->password && $request->password == null)
            $data['password'] = Hash::make($request->password);
        else
            $data['password'] = $data->password;

        $data['password'] = Hash::make($request->password);
        $data['name'] = $request->name;
        $data['company_name'] = $request->company_name;
        $data['email'] = $request->email;
        $data['phone'] = $request->phone;
        $data->save();

        return response()->json(['data'=>$data,'message'=>'','status'=>200],200);
    }
    //=========================================================================
    public function admin_delete(Request $request){
        User::where('id',$request->id)->delete();
        return response()->json();
    }
    //=========================================================================
    public function profile(){
        $admin = admin()->user();
        return view('Web.Users.Profile.index',compact('admin'));
    }

}
