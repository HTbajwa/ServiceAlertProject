<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    //

    public function UserCreate(Request $request){
      
      $data=Validator::make(request()->all(),[
        'name'=>'required|string|min:3',
        'email'=>'required|email|unique:users,email|regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.com$/',
        'phone'=>'required|numeric|digits:11',
        'password'=>'required|min:6',
        'role'=>'required|in:admin,user'
      ],[
        'email.regex'=>"Email must contain .com"
      ]);
      if($data->fails())
      {
        return response()->json(
          [
            "message"=>$data->errors()
          ],422
        );
      }
      $data1=$data->validated();
      
      $data1['password']=Hash::make($data1['password']);
      $alldata= User::create($data1);
      return response()->json([
       "message"=>"Registered Successfully",
       "data"=>$alldata
      ],201);

    }
}
