<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;
use \Illuminate\Routing\Middleware\SubstituteBindings;

use function Pest\Laravel\json;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //
        $middleware->alias(
            [
                'admin'=>AdminMiddleware::class,
                'user'=>UserMiddleware::class,
            ]
            );
        $middleware->redirectGuestsTo(function(){
             return response()->json([
            "message" => "NOT Authenticated user"
        ], 401);
        });
        $middleware->group('api', [
       
        // 'throttle:api',
        SubstituteBindings::class,
    ]);
    })
   ->withExceptions(function (Exceptions $exceptions): void {

    


    // Handle unauthenticated
    $exceptions->render(function(AuthenticationException $e, $request) {
        return response()->json([
            "message" => "NOT-Authenticated user"
        ], 401);
    });
    })->create();
