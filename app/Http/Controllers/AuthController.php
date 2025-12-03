<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function Pest\Laravel\json;

class AuthController extends Controller
{
    //// Validate request
    // Find user by email
    // Check password
    // Create token
    //Return Token

    public function UserLogin(Request $request)
    {
      $validation=  Validator::make($request->all(),[
          
            'email'=>'required|email|regex:/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.com$/',
            "password" => "required|min:6"
        ],
    [
        'email.regex'=>"email must contain .com"
    ]);
        if($validation->fails())
        {
            return response()->json([
                "error"=>$validation->errors()
            ],422);
        }
        $user=$validation->validated();
        $user = User::where('email', $request->email)->first();
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(
                [
                    "message" => "InValid Credenrials"
                ],
                401
            );
        }

        $token = $user->createToken("Authentication-Token")->plainTextToken;
        return response()->json(
            [
                "message"=>"Login Successfully",
                "user"=>$user,
                "access_token" => $token,
                "token_type" => 'Bearer'
            ]
        );
    }
}
