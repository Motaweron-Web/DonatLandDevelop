<?php

namespace App\Http\Controllers\Web\Slider;

use App\Http\Controllers\Controller;
use App\Http\Traits\DefaultImage;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    use DefaultImage;

    public function index(){
        $slider = Slider::all();
        return view('Web.CRUD.Slider.index',compact('slider'));
    }
    //=========================================================================
    public function new_slider(Request $request){
//        return $request->all();
        $validator = Validator::make($request->all(),['image'=>'required'],['image.required' =>'الصورة مطلوبة']);
        if ($validator->fails())
            return response()->json(['data'=>'','message'=>$validator->errors()->getMessages(),'status'=>422],200);
        $data = new Slider;
        if ($request->hasFile('image')){
            $data['image'] = $this->uploadFiles('sliders',$request->file('image'));
        }else{
            $data['image'] = $this->storeDefaultImage('sliders',$request->name);
        }
        $data->save();

        return response()->json(['data'=>null,'message'=>'','status'=>200],200);
    }
    //=======================================================================
    public function edit_slider($id){
        $data = Slider::where('id',$id)->first();
        $html = view('Web.CRUD.Slider.edit',compact('data'))->render();
        return response()->json($html);
    }
    //=======================================================================
    public function slider_update(Request $request){
        $data = Slider::where('id',$request->id)->first();
//        $validator = Validator::make($request->all(),['image'=>'required'],['image.required' =>'الصورة مطلوبة']);
//        if ($validator->fails())
//            return response()->json(['data'=>'','message'=>$validator->errors()->getMessages(),'status'=>422],200);

        if ($request->hasFile('image')){
            $data['image'] = $this->uploadFiles('sliders',$request->file('image'),$data->image);
        }
        $data->save();

        return response()->json(['data'=>$data,'message'=>'','status'=>200],200);
    }
    //=========================================================================
    public function slider_delete(Request $request){

        $slider = Slider::where('id',$request->id)->first();
        delete_image($slider->image);
        $slider->delete();
        return response()->json();
    }
}
