<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function login(Request $req)
    {
        $val = Validator::make($req->all(), [
            'email' => "required|exists:users,email",
            'password' => "required"
        ]);
        if ($val->fails()) {
            return response()->json(['status' => false, 'error' => $val->errors()->all()]);
        } else {
            $user = Auth::attempt(["email" => $req->email, "password" => $req->password]);
            if ($user) 
            {
                return response()->json(['status' => true, 'user' => Auth()->user()]);
            }
            else{
                return response()->json(['status' => false,'error'=>$user]);
            }
        }
    }
    public function register(Request $req)
    {
        $val = Validator::make($req->all(), [
            'name' => 'required|max:255',
            'email' => 'required|unique:users,email|max:60',
            'password' => 'required|max:10|min:4',
            'mobile_phone' => 'required|max:10|unique:users,mobile_phone',
            'sem' => 'required',
            'shift' => 'required|max:10'
        ]);
        if ($val->fails()) {
            return response()->json(['status' => false, 'error' => $val->errors()->all()]);
        } else {
            $data = $req->all();
            $data['password'] = bcrypt($req->password);
            $temp = User::create($data);
            return response()->json(['status' => true, 'message' => 'User Successfully Created', 'user' => $temp]);
        }
    }
    public function listUsers()
    {
        $list = User::get();
        return response()->json($list);
    }
    public function singleUser(Request $req)
    {
        $val= Validator::make($req->all(), ['remember_token'=>'required| exists:users,remember_token']);
        if($val->fails())
        {
            return response()->json(['status'=>false, 'error'=>$val->errors()->all()]);
        }
        else{
            $list=User::get()->where('remember_token',$req->remember_token);
            return response()->json(['status' => true, 'data' =>$list]);
        }
    }
}
