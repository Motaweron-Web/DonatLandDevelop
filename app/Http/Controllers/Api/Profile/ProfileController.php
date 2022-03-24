<?php

namespace App\Http\Controllers\Api\Profile;

use App\Http\Controllers\Controller;
use App\Models\Products;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfile(Request $request){
        return helperJson(auth()->user());
    }//end fun
    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function favoriteProducts(Request $request){
        $data = Products::wherehas('favorite')->latest()->get();
        return helperJson($data);
    }//end fun
}//end class
