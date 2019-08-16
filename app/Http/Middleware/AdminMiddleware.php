<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class AdminMiddleware
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
        /* if (!Auth::check()) {
            abort(403, 'Unauthorized action.');
        }
*/
        if (!Auth::check() && $request->user() && $request->user()->type != 'admin') {
            return new Response(view('unauthorized')->with('type', 'ADMIN'));
        }
        return $next($request);


        //return parent::handle($request, $next);
        //return view('admin');
    }
}
