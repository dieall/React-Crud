<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //
    ];

    /**
     * Determine if the request should be excluded from CSRF verification.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return bool
     */
    protected function shouldPassThrough(Request $request)
    {
        $routeName = Route::currentRouteName();

        // Add your custom logic here to determine if the request should pass through CSRF verification
        // For example, you can check if the route name is in a whitelist
        $whitelist = [
            // Add your whitelisted route names here
        ];

        return in_array($routeName, $whitelist);
    }
}
