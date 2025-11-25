<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models;
class UserMiddleware
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
      return  response()->json([
"message"=>"User is not logged in"
        ],401);
       }
       
/**  @var App\Models\User $user; */
$user=Auth::user();
       if(!$user->isRegUser()){
return response()->json([
"message"=>"User Authenticated is not logged in"
        ],403);
       }




        return $next($request);
    }
}
