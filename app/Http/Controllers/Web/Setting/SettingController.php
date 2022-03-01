<?php

namespace App\Http\Controllers\Web\Setting;

use App\Http\Controllers\Controller;
use App\Models\GeneralSetting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $setting = GeneralSetting::first();
        return view('Web.CRUD.Setting.index',compact('setting'));
    }
    //=================================================
    public function update_setting(Request $request){
        $setting = GeneralSetting::first();
        $setting->tax_percentage    = $request->tax_percentage;
        $setting->tax_for           = $request->tax_for;
        $setting->terms             = $request->terms;
        $setting->about             = $request->about;
        $setting->purchase_gift_value = $request->purchase_gift_value;
        $setting->purchase_gift     = $request->purchase_gift;
        $setting->register_gift     = $request->register_gift;
        $setting->save();
        toastr()->success('تم تعديل الاعدادات بنجاح');
        return redirect()->back();
    }
    //=================================================
}
