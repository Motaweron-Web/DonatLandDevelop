<?php

namespace App\Http\Controllers\Web\Branch;

use App\Http\Controllers\Controller;
use App\Models\Branches;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index(){
        $branches = Branches::where('is_active',true)->get();
        return view('Web.CRUD.Branch.index',compact('branches'));
    }
    //===========================================================
    public function change_name2(Request $request){
        $branches = Branches::where('id',$request->id)->first();
        $branches->name2 = $request->name2;
        $branches->save();
        return response()->json(['status'=>200],200);
    }
    //===========================================================
    public function branch_control(Request $request){
        $branches = Branches::where('id',$request->id)->first();
//        return $branches;
        $branches->is_show = $branches->is_show == '1' ? '0' : '1' ;
        $branches->save();
        return response()->json(['status'=>200],200);
    }
    //===========================================================

}
