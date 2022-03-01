<?php

namespace App\Http\Controllers\Api\Home;

use App\Http\Controllers\Controller;
use App\Http\Resources\SliderResources;
use App\Models\Branches;
use App\Models\Categories;
use App\Models\Favorite;
use App\Models\Products;
use App\Models\SecondSlider;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt')->only('addDeleteFavorite');
    }

    public function products(Request $request){
        $data = Products::where('is_sale',true)->where('is_active',true)->latest();

        if ($request->has('category_id') && count($request->category_ids)){
            $data->wherein('category_id',$request->category_id);
        }

        if ($request->has('search') && $request->search != ''){
            $data->where('name','LIKE','%'.$request->search.'%');
        }


        return helperJson($data->get());
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function categories(Request $request){
        $data = Categories::where('is_sale',true)->where('is_active',true)->latest()->get();
        return helperJson($data);
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function branches(Request $request){
        $data = Branches::where('is_active',true)->latest()->get();
        foreach ($data as $item){
            if($item->image == null){
                $item->image = asset('uploads/branch_default.jpg');
            }
        }
        return helperJson($data);
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function slider(Request $request){
        return helperJson(SliderResources::collection(Slider::latest()->get()));
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function second_slider(Request $request){
        return helperJson(SliderResources::collection(SecondSlider::latest()->get()));
    }//end fun

    public function addDeleteFavorite(Request $request){
        $data = $request->validate([
            'product_id'=>'required|exists:products,id',
        ]);

        $data['customer_id'] = auth()->user()->id;

        $count = Favorite::where($data)->count();
        if (!$count){
            Favorite::create($data);
            return helperJson(null,'good');
        }else{
            Favorite::where($data)->delete();
            return helperJson(null,'removed',201);
        }

    }//end fun

    //===========================================================
    public function offers(Request $request){
        $offers = Products::with('offer.products')->where(['is_active'=>true,'is_sale'=>true,'category_id'=>18])->latest()->get();
        return helperJson($offers);
    }//end fun
    //===========================================================
    public function one_product(Request $request){
        $rules = [
            'product_id'=>'required|exists:products,id',
        ];
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()){
            return response()->json(['data'=>null,'message'=>$validator->errors(),'code'=>422],422);
        }else {
            $offers = Products::where(['id' => $request->product_id , 'is_active' => true, 'is_sale' => true])->first();
            if ($offers){
                if ($offers->category_id == 18){
                    $data = Products::with('offer.products')->where(['id' => $offers->id ])->first();
                }else{
                    $data = Products::where(['id' => $offers->id ])->first();
                }
            }else{
                return response()->json(['data'=>null,'message'=>'product not active or not for sale','code'=>409],409);
            }

            return helperJson($data);
        }
    }//end fun


}//end class
