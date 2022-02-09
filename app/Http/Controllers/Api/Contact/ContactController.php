<?php

namespace App\Http\Controllers\Api\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function index(Request $request){
        $rules = [
            'name'=>'required',
            'email'=>'required',
            'message'=>'required',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'status'=>422],422);
        }else{
            $contact = Contact::create($request->all());
            return response()->json(['data'=>$contact,'message'=>'message stored successfully','status'=>'200'],200);
        }


    }
}
