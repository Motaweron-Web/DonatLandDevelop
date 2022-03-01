<?php

namespace App\Http\Controllers\Branch\Orders;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Sales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function newOrders(Request $request){
        $data = Order::where([
            'branch_id'=>branch()->user()->branch_id,
            'status'=>'append',
            'is_delivary'=>'no',
        ])->with('details.product','branch','customer')->latest()->get();
        return helperJson($data);
    }//end fun
    public function currentOrders(Request $request){
        $data = Order::where([
                'branch_id'=>branch()->user()->branch_id,
                'status'=>'accept',
                'is_delivary'=>'no',
            ])->with('details.product','branch','customer')->latest()->get();
        return helperJson($data);
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function endedOrders(Request $request){
        $data = Order::where([
            'branch_id'=>branch()->user()->branch_id,
            'status'=>'end',
            'is_delivary'=>'no',
        ])->with('details.product','branch','customer')->latest()->get();

        return helperJson($data);
    }//end fun

    //=======================================================
    public function acceptOrder(Request $request){
        $rules = [
            'order_id'=>'required|exists:orders,id'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],422);
        }else{
            $order = Order::where('id',$request->order_id)->with('details.product','branch','customer')->first();
            $order->update(['status'=>'accept']);
            return response()->json(['data'=>$order,'message'=>'','code'=>'200'],200);
        }
    }
    //=======================================================
    public function cancelOrder(Request $request){
        $rules = [
            'order_id'=>'required|exists:orders,id'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],422);
        }else{
            $order = Order::where('id',$request->order_id)->with('details.product','branch','customer')->first();
            $order->update(['status'=>'cancel']);
            return response()->json(['data'=>$order,'message'=>'','code'=>'200'],200);
        }
    }
    //=======================================================
    public function endOrder(Request $request){
        $rules = [
            'order_id'=>'required|exists:orders,id'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],422);
        }else{
            $order = Order::where('id',$request->order_id)->with('details.product','branch','customer')->first();
            $order->update(['status'=>'end']);
            return response()->json(['data'=>$order,'message'=>'','code'=>'200'],200);
        }
    }

}//end class
