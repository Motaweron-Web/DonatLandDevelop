<?php

namespace App\Http\Controllers\Web\Clients;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $clients = Customers::all();
        return view('Web.CRUD.Clients.index',compact('clients'));
    }
    //=======================================================================
    public function client_delete(Request $request){
        $driver = Customers::where('id',$request->id)->first();
        if ($driver->photo != null)
            delete_image($driver->photo);
        $driver->delete();
        return response()->json();
    }
}
