<?php

namespace App\Http\Controllers\Web\Delivery;

use App\Http\Controllers\Controller;
use App\Models\Representative;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index(){
        $drivers = Representative::all();
        return view('Web.CRUD.Drivers.index',compact('drivers'));
    }
    public function driver_delete(Request $request){

        $driver = Representative::where('id',$request->id)->first();
        if ($driver->photo != null)
            delete_image($driver->photo);
        $driver->delete();
        return response()->json();
    }
}
