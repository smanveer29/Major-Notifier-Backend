<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function addEvent(Request $req)
    {
        $val=Validator::make($req->all(),[
            'token'=>'required | exists:users,remember_token'
        ]);
        if($val->fails())
        {
            return response()->json(['status'=>false,'error'=>$val->errors()->all()]);
        }
        else{
            // $get=Event::get()->where('remember_token',$req->token);
            // if($get==null){
            //     return response()->json(['status'=>false,'error'=>'Invalid Operation!']);
            // }
            // else{
            //     return response()->json(['status'=>true,'message'=>'Event Added Successfully','data'=>$get]);
            // }
        }
    }
    public function getEvents()
    {
        # code...
        $get=Event::latest()->get();
        if($get==null){
            return response()->json(['status'=>false,'error'=>'Some Error Occured']);
        }
        else{
            return response()->json(['status'=>true,'data'=>$get]);
        }
    }
    public function onGoingEvent(Request $req)
    {
        $get=Event::latest()->get()->first();
        if($get==null){
            return response()->json(['status'=>false,'error'=>'Some Error Occured']);
        }
        else{
            return response()->json(['status'=>true,'data'=>$get]);
        }
    }
}
