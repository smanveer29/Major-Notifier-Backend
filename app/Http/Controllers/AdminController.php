<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
class AdminController extends Controller
{
    public function check(Request $req)
    {
        $val=Validator::make($req->all(),[
            'adminPin'=>'required|max:4',
        ]);
        if($val->fails())
        {
            return response()->json(['status'=>false,'message'=>$val->errors()->all()]);
        }
        else
        {
            // $get=admin::where('adminPin',$req->adminPin);
            $get = Admin::find(['adminPin'=>$req->adminPin]);
            if($get!=null)
            {
                return response()->json(['status'=>true,'message'=>'Permission Granted','data'=>$get]);
            }
            else{
                return response()->json(['status'=>false,'error'=>'Error']);
            }
        }
    }
    public function register(Request $req)
    {
        $val=Validator::make($req->all(),[
            'adminPin'=>'required|max:4',
        ]);
    }
}
