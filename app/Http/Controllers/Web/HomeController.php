<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Branches;
use App\Models\Contact;
use App\Models\Customers;
use App\Models\Order;
use App\Models\Representative;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $new_order_count = Order::where('status','append')->count();
        $accept_order_count = Order::where('status','accept')->count();
        $user_count = User::where('role_id','1')->count();
//        $branche_count = Branches::count();
        $representative_count = Representative::count();
        $contact_count = Contact::count();
        $customer_count = Customers::count();
        return view('Web.index',compact('new_order_count','accept_order_count','user_count','representative_count','contact_count','customer_count'));
    }
}
