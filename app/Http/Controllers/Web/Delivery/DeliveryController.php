<?php

namespace App\Http\Controllers\Web\Delivery;

use App\Http\Controllers\Controller;
use App\Http\Requests\DriverRequest;
use App\Http\Traits\DefaultImage;
use App\Models\Representative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DeliveryController extends Controller
{
    use DefaultImage;

    public function rules()
    {
        return [
            'name' =>'required',
            'password' =>'required'
        ];
    }
    //==========================================
    public function messages()
    {
        return [
            'name.required' =>'الاسم مطلوب',
            'password.required' =>'كلمة المرور مطلوبة'
        ];
    }
    //==========================================
    public function index(){
        $drivers = Representative::all();
        return view('Web.CRUD.Drivers.index',compact('drivers'));
    }
    //==========================================
    public function add_driver(Request $request){
        $validator = Validator::make($request->all(),$this->rules(),$this->messages());
        if ($validator->fails())
            return response()->json(['data'=>'','message'=>$validator->errors()->getMessages(),'status'=>422],200);
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        if ($request->hasFile('photo')){
            $data['photo'] = $this->uploadFiles('delivery',$request->file('photo'));
        }else{
            $data['photo'] = $this->storeDefaultImage('delivery',$request->name);
        }
        $driver = Representative::create($data);
        return response()->json(['data'=>$driver,'message'=>'','status'=>200],200);
    }
    //=======================================================================
    public function edit_driver($id){
        $driver = Representative::where('id',$id)->first();
        $html = view('Web.CRUD.Drivers.edit',compact('driver'))->render();
        return response()->json($html);
    }
    //=======================================================================
    public function driver_update(Request $request){
        $driver = Representative::where('id',$request->id)->first();
        $validator = Validator::make($request->all(),['name' =>'required'],['name.required' =>'الاسم مطلوب']);
        if ($validator->fails())
            return response()->json(['data'=>'','message'=>$validator->errors()->getMessages(),'status'=>422],200);
        $data = $request->all();
        if ($request->hasFile('photo') && $request->hasFile('photo') != null){
            $data['photo'] = $this->uploadFiles('delivery',$request->file('photo') , $driver->photo);
        }else{
            $data['photo'] = $this->storeDefaultImage('delivery',$request->name);
        }

        if ($request->password && $request->password == null)
            $data['password'] = Hash::make($request->password);
        else
            $data['password'] = $driver->password;

        $driver->update($data);

        return response()->json(['data'=>$driver,'message'=>'','status'=>200],200);
    }
    //=======================================================================
    public function driver_delete(Request $request){
        $driver = Representative::where('id',$request->id)->first();
        if ($driver->photo != null)
            delete_image($driver->photo);
        $driver->delete();
        return response()->json();
    }
}
