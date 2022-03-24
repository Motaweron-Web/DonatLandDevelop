<?php

namespace App\Http\Controllers\Api\Orders;

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
        $data = Order::where('customer_id',auth()->user()->id)
            ->wherein('status',['append','accept'])->with('details','branch')->latest()->get();
        return helperJson($data);
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function oldOrders(Request $request){
        $data = Order::where('customer_id',auth()->user()->id)
            ->wherein('status',['cancel','end'])->with('details','branch')->latest()->get();
        return helperJson($data);
    }//end fun
    //=================================================================
    //=================================================================
    public function storeOrder(Request $request){
        $rules = [
            'branch_id'=>'required|exists:branches,id',
            'customer_id'=>'required|exists:customers,id',
            'details.*.product_id'=>'required|exists:products,id',
            'is_delivary'=>'required',
            'receive_type'=>'required',
            'payment_type'=>'required',
            'notes'=>'nullable',
            'address'=>'nullable',
            'latitude'=>'nullable|regex:/^\d+(\.\d{1,9})?$/',
            'longitude'=>'nullable|regex:/^\d+(\.\d{1,9})?$/',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'status'=>422],422);
        }else{
            $customer = Customers::where('id',$request->customer_id)->first();
//            return $customer;
            if ($request->grand_total > $customer->total &&  $request->payment_type == 'wallet' ){
                return response()->json(['data'=>null,'message'=>'رصيدك ('.$customer->total.') غير كافى لهذا الطلب ','status'=>409],200);
            }

            $order = $request->except('details');
            $last_order = Order::create($order);
            $last_order->notes = $request->notes;
            $last_order->save();
            foreach($request->details as $detail){
                $new_detail = new OrderDetails();
                $new_detail->order_id   = $last_order->id;
                $new_detail->product_id = $detail['product_id'];
                $new_detail->qty        = $detail['qty'];
                $new_detail->tax        = $detail['tax'];
                $new_detail->subtotal   = $detail['subtotal'];
                $new_detail->save();
            }
            $data = Order::where('id',$last_order->id)->with('details')->first();

            return response()->json(['data'=>$data,'message'=>'order stored successfully','status'=>'200'],200);
        }
    }//end fun

    //=======================================================
    public function one_order(Request $request){
        $rules = [
            'order_id'=>'required|exists:orders,id'
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'status'=>422],422);
        }else{
            $order = Order::where('id',$request->order_id)->with('details.product','branch','customer')->first();
            return response()->json(['data'=>$order,'message'=>'','status'=>'200'],200);
        }
    }

}//end class
