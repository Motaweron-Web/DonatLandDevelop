<?php

namespace App\Http\Controllers\Api\Setting;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;


class TermsController extends Controller
{
    public function terms(){
//        $terms = GeneralSetting::first();
//        $id = '3';
        $data = url('/api/terms/terms_view/3') ;
        return response()->json(['data'=>$data,'message'=>'','status'=>200],'200');

    }

    public function about(){
//        $terms = GeneralSetting::first();
//        $id = '2';
        $data = url('/api/terms/terms_view/2') ;
        return response()->json(['data'=>$data,'message'=>'','status'=>200],'200');
    }

    public function taxes(){
//        $terms = Tax::all();
        $setting = GeneralSetting::first();
        return response()->json(['data'=>$setting,'message'=>'','status'=>200],'200');
    }
}
