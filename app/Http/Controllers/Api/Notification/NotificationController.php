<?php

namespace App\Http\Controllers\Api\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NotificationController extends Controller
{
    public function index(Request $request){
//        return strtotime(date('Y-m-d'));
        $rules = [
            'customer_id'=>'required|exists:customers,id',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],422);
        }else{
            $notificaation = Notification::where(['to_user_type'=>'customer','to_user_id'=>$request->customer_id])->orderBy('date','desc')->get();
            return response()->json(['data'=>$notificaation,'message'=>'','code'=>200],200);
        }
    }
}
