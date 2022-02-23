<?php

namespace App\Http\Controllers\Delivery\Orders;

use App\Http\Controllers\Controller;
use App\Models\Customers;
use App\Models\GeneralSetting;
use App\Models\Order;
use App\Models\Representative;
use App\Models\RepresentativeCancelledOrders;
use App\Models\Setting;
use App\Models\User;
use App\Http\Traits\GeneralTrait;
use App\Http\Traits\PhotoTrait;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    use GeneralTrait,PhotoTrait;
    use GeneralTrait;
    public function currentOrders(Request $request)
    {
        $rules = [
            'user_id'=>'required|exists:representative,id',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }

        $data   = Order::where('status', 'accept')->WhereIn('delivery_status', ['append','accepted','on_way'])
            ->where('delivery_id',$request->user_id)
            ->with('details.product','branch','customer')
            ->latest()
            ->get();

        return $this->returnData('data', $data, 'get successfully');
    }
//============================================================================
    public function acceptOrder(request $request){
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
        ]);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
            $data = Order::where('id', $request->order_id)->with('details.product','branch','customer')->first();
            if ($data['status'] != 'accept') {
                return $this->returnError('', 'لا يمكنك قبول هذا الطلب لانه قيد المراجعة او ربما تم قبوله مسبقا',405);
            }
            $data['delivery_status'] = 'accepted';
            $data->save();
            fireBase($data['customer_id'] , null , $data['id'] , ' قام ' .delivery()->user()->name. ' باستلام طلبك   ');
            return $this->returnData('data', $data, 'تم قبول الطلب بنجاح');
    }
//============================================================================
    public function on_way_order(request $request){
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
        ]);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],200);
        }
        $data = Order::where('id', $request->order_id)->with('details.product','branch','customer')->first();
        if ($data['status'] != 'accept' || $data['delivery_status'] != 'accepted') {
            return $this->returnError('', 'لا يمكنك توصيل هذا الطلب لانه قيد المراجعة او ربما لم يتم قبوله ',405);
        }
        $data['delivery_status'] = 'on_way';
        $data->save();
        fireBase($data['customer_id'] , null , $data['id'] , ' طلبك قيد التوصيل بواسطة المندوب ' . delivery()->user()->name);
        return $this->returnData('data', $data, 'جارى توصيل الطلب بنجاح');
    }

    public function endOrder(request $request){
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
        ]);
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
            $data = Order::where('id', $request->order_id)->with('details.product','branch','customer')->first();
            if($data['delivery_id'] != delivery()->user()->id){
                return $this->returnError('','لا يمكنك انهاء هذا الطلب',405);
            }
            if ($data['status'] == 'accept' && $data['delivery_status'] = 'on_way') {
                $data['delivery_status'] = 'done';
                $data['status'] = 'end';
                $data->save();
                $setting = GeneralSetting::first();
                if($data['grand_total'] >= $setting->purchase_gift){
                    $user  = Customers::where('id',$data->customer_id)->first();
                    $bonus = $setting->purchase_gift_value; // /*round($data->grand_total / $setting->purchase_gift) **/
                    $user->purchase_gifts += $bonus;
//                    $user->total += $bonus;
                    $user->save();
                }
//                $data['setting'] = Setting::select('phone', 'gmail', 'whats', 'address_' . App::getLocale() . ' as address', 'lat', 'longitude')->get()[0];
                if($data['payment_type'] == 'wallet'){
                    $user  = Customers::where('id',$data->customer_id)->first();
                    $total = $data['grand_total'];
                    if ($total <= $user->share_gifts){
                        $user->share_gifts -= $total;
                    }else{
                        $total -= $user->share_gifts;
                        $user->share_gifts = 0.0;
                        if ($total > $user->purchase_gifts){
                            $user->purchase_gifts = 0.0;
                            $total = 0;
                        }else{
                            $user->purchase_gifts -= $total;
                        }
                    }
//                    $user->grand_total -= $data['total'];
                    $user->save();
                }
                fireBase($data['customer_id'] , null , $data['id'] , ' تم انهاء طلبك بواسطة المندوب ' . delivery()->user()->name);
//                fireBase($data->user_id , null , $data->id , 'تم انهاء الطلب بنجاح شكرا لاستخدامك تطبيق أكابر');
                return $this->returnData('data', $data, 'تم انهاء الطلب بنجاح');
            }
            else{
                return $this->returnError('','حدث خطأ... ربما تم انهاء الطلب مسبقا او انه ما زال قيد المراجعة [تأكد من قبول الطلب اولا ثم التوصيل ثانيا]',405);
            }
    }

    public function cancelOrder(request $request){
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
        ]);
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $data = Order::where('id', $request->order_id)->with('details')->first();
        if ($data->status == 'accept'){
//            $data->status = 'cancel';
            $data->delivery_status = 'rejected';
            $data->save();
            fireBase($data['customer_id'] , null , $data['id'] , ' سيتم تعيين مندوب اخر للطلب ');
            return $this->returnData('data', $data, 'تم الغاء الطلب بنجاح');
        }
        else{
            return $this->returnError('','حدث خطأ... لا يمكنك الغاء حجز منتهي او قيد المراجعة',405);
        }
    }

    public function previousOrders(request $request){
        if ($request->time == 'week'){
            $date = date ("Y-m-d", strtotime (date('Y-m-d') ."-1 week"));
            $data = Order::where(['delivery_id'=>delivery()->user()->id , 'status'=>'end'])
                ->whereBetween('created_at',[$date,date('Y-m-d')])
                ->with('details.product','branch','customer')->latest()->get();
        }elseif($request->time == 'month'){
            $date = date ("Y-m-d", strtotime (date('Y-m-d') ."-1 month"));
            $data = Order::where(['delivery_id'=>delivery()->user()->id , 'status'=>'end'])
                ->whereBetween('created_at',[$date,date('Y-m-d')])
                ->with('details.product','branch','customer')->latest()->get();
        }elseif($request->time == 'year'){
            $date = date ("Y-m-d", strtotime (date('Y-m-d') ."-1 year"));
            $data = Order::where(['delivery_id'=>delivery()->user()->id , 'status'=>'end'])
                ->whereBetween('created_at',[$date,date('Y-m-d')])
                ->with('details.product','branch','customer')->latest()->get();
        }else{
            $data = Order::where(['delivery_id'=>delivery()->user()->id , 'status'=>'end'])
                ->with('details.product','branch','customer')->latest()->get();
        }
        for ($i = 0 ; $i < count($data) ; $i++) {
            // format date
            $data[$i]['day'] = Carbon::createFromFormat('Y-m-d H:i:s', $data[$i]['created_at'])->format('Y / m / d');
            $data[$i]['time'] = Carbon::createFromFormat('Y-m-d H:i:s', $data[$i]['created_at'])->format('g:i A');
        }


//        $data = Order::where(['delivery_id'=>delivery()->user()->id , 'status'=>'end']) //, 'delivery_status'=>'done'
//            ->with('details.product','branch','customer')->latest()->get();

        return $this->returnData('data',$data,'get successfully');
    }

    public function orderDetails(request $request){
        $validator = Validator::make($request->all(), [
            'order_id' => 'required|exists:orders,id',
        ]);
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $data = Order::where('id',$request->order_id)
            ->with('details.product','branch','customer')
            ->first();
        return $this->returnData('data', $data, 'get successfully');
    }


}
