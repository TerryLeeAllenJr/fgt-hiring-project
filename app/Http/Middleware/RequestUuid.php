<?php

namespace App\Http\Middleware;

use Closure;
use Ramsey\Uuid\Uuid;

class RequestUuid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        /*
          I am adding a unique uuid to each request to allow us to track and easily search for specific errors.
          Attaching the UUID directly to the request object here allows us to access the UUID from anywhere in the
          application, even when exceptions get thrown early in the request lifecycle.
        */
        $request->uuid = Uuid::uuid4();

        return $next($request);
    }
}
