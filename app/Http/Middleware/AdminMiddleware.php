<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
 use Illuminate\Support\Facades\Auth;
 use App\Models\User;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       

        if(!Auth::check())
        {
             return response()->json([
            "message" => "User not logged in"
        ], 401);

}

/** @var \App\Models\User $user */
    $user = Auth::user();

    // 2. Now the editor knows $user has the isAdmin method
    if (!$user->isAdmin()) {
        return response()->json(["message" => "NOT-Authenticated admin"], 403);
    }
return $next($request);
    }
}
