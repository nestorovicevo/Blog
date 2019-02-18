<?php

namespace App\Http\Middleware;

use Closure;

class CheckAgeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {                                                       ////pravimo uslov   a moze i only('age') ako zelimo da izvlacimo niz parametara iz requesta, a kod get jedan parametar
        if ($request->age < 18) {
            session()->flash(
                'message',
                'You are too young!'
            );
            return redirect()->back();
        }
        return $next($request);
    }
}
