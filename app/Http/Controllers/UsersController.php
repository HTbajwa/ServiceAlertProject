<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //

    public function UserCreate(Request $request){
      
      $data=$request->validate([
        'name'=>'required|string',
        'email'=>'required|email|unique:users,email',
        'phone'=>'required|string',
        'password'=>'required|min:6',
        'role'=>'required'
      ]);
      $data['password']=Hash::make($data['password']);
      return User::create($data);

    }
}
