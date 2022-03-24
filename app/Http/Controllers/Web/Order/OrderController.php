<?php

namespace App\Http\Controllers\Web\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Representative;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function new_orders(){
        $drivers = Representative::whereDoesntHave('current_orders')->select('id','name')->get();

        $data = Order::where(['status'=>'accept','delivery_status'=>'rejected'])
            ->orwhere('status','append')
            ->latest()->get();
//        return $data;
        return view('Web.CRUD.Orders.New.index',compact('data','drivers'));
    }
//============================================================================
    public function current_orders(){
        $data = Order::where(['status'=>'accept'])
            ->whereIn('delivery_status',['append','accepted','on_way'])
            ->latest()->get();
//        return $data;
        return view('Web.CRUD.Orders.Current.index',compact('data'));
    }
//============================================================================
    public function previous_orders(){
        $data = Order::whereIn('status',['end','cancel'])
            ->latest()->get();
//        return $data;
        return view('Web.CRUD.Orders.Previous.index',compact('data'));
    }
//============================================================================

    public function order_delete(Request $request){
//        return 1;
        Order::whereId($request->id)->delete();
        return response()->json('');
    }
    //==========================================================

    public function order_accept(Request $request , $id){
//        return $request->all();
        $order = Order::where('id',$id)->first();
        $order->status = 'accept';
        $order->delivery_id = $request->delivery_id;
        $order->save();
//        return $order;
//        toastr()->info('تم قبول الحجز');
        fireBase($order['customer_id'] , null , $order['id'] , 'تم قبول طلبك بواسطة ادارة دونات لاند ' ,'admin' );
        if ($order->delivery_id != null)
            fireBase(null , $order['delivery_id'] , $order['id'] , 'لديك طلب جديد  ' ,'admin' ,'driver');

        return redirect()->back();
    }//end fun

    //==========================================================

    public function order_refuse($id){
        $order = Order::where('id',$id)->first();
        $order->status = 'cancel';
        $order->save();
        fireBase($order['customer_id'] , null , $order['id'] , 'تم رفض طلبك بواسطة ادارة دونات لاند ' ,'admin' );

        return redirect()->back();
    }//end fun

    //==========================================================

    public function order_end($id){
        $order = Order::where('id',$id)->first();
        $order->status = 'end';
        $order->save();
        fireBase($order['customer_id'] , null , $order['id'] , 'تم انهاء طلبك بواسطة ادارة دونات لاند ' ,'admin' );
//        return $order;
        return redirect()->back();
    }//end fun

    //==========================================================

    public function order_details($id){
        $order = Order::with('details.product')->where('id',$id)->first();
        $details = $order->details;
        $HTML = view('Web.CRUD.Orders.Current.components.details',compact('details'))->render();
        return response()->json($HTML);
    }//end fun
}
