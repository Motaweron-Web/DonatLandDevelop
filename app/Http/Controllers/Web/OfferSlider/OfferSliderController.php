<?php

namespace App\Http\Controllers\Web\OfferSlider;

use App\Http\Controllers\Controller;
use App\Http\Traits\DefaultImage;
use App\Models\SecondSlider;
use App\Models\Slider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OfferSliderController extends Controller
{
    use DefaultImage;
    public function index(){
        $users = SecondSlider::all();
        return view('Web.CRUD.OfferSlider.index',compact('users'));
    }
    //=========================================================================
    public function new_offerSlider(Request $request){
//        return $request->all();
        $validator = Validator::make($request->all(),['image'=>'required'],['image.required' =>'الصورة مطلوبة']);
        if ($validator->fails())
            return response()->json(['data'=>'','message'=>$validator->errors()->getMessages(),'status'=>422],200);
        $data = new SecondSlider;
        if ($request->hasFile('image')){
            $data['image'] = $this->uploadFiles('second_slider',$request->file('image'));
        }else{
            $data['image'] = $this->storeDefaultImage('second_slider',$request->name);
        }
        $data->save();

        return response()->json(['data'=>null,'message'=>'','status'=>200],200);
    }
    //=======================================================================
    public function edit_offerSlider($id){
        $data = SecondSlider::where('id',$id)->first();
        $html = view('Web.CRUD.OfferSlider.edit',compact('data'))->render();
        return response()->json($html);
    }
    //=======================================================================
    public function offerSlider_update(Request $request){
        $data = SecondSlider::where('id',$request->id)->first();
//        $validator = Validator::make($request->all(),['image'=>'required'],['image.required' =>'الصورة مطلوبة']);
//        if ($validator->fails())
//            return response()->json(['data'=>'','message'=>$validator->errors()->getMessages(),'status'=>422],200);

        if ($request->hasFile('image')){
            $data['image'] = $this->uploadFiles('second_slider',$request->file('image'),$data->image);
        }
        $data->save();

        return response()->json(['data'=>$data,'message'=>'','status'=>200],200);
    }
    //=========================================================================
    public function offerSlider_delete(Request $request){

        $slider = SecondSlider::where('id',$request->id)->first();
        delete_image($slider->image);
        $slider->delete();
        return response()->json();
    }
}
