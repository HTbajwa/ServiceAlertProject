<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

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
        $request->validate([
            "email" => "required|string",
            "password" => "required|min:6"
        ]);
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
                "access_token" => $token,
                "token_type" => 'Bearer'
            ]
        );
    }
}
