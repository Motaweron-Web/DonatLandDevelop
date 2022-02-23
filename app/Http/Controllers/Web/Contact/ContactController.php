<?php

namespace App\Http\Controllers\Web\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        $users = Contact::all();
        return view('Web.CRUD.Contact.index',compact('users'));
    }
    //=========================================================================
    public function contact_delete(Request $request){

        Contact::where('id',$request->id)->delete();
        return response()->json();
    }
}
