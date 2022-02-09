<?php

namespace App\Http\Controllers\Web\Delivery;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index(){
        $drivers = Representative::all();
        return view('Web.CRUD.Drivers.index',compact('drivers'));
    }
}
