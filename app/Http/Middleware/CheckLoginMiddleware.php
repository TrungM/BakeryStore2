<?php
//  php artisan make:middleware CheckLoginMiddleware
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // public function handle(Request $request, Closure $next)
    // {
    //     if ($request->session()->has('user')) {
    //         return $next($request);
    //     }
    //     return redirect('login');
    // }

// kiem tra tai khoan theo route
public function handle(Request $request, Closure $next, ...$roles)
{
    if ($request->session()->has('user')) {
$user=$request->session()->get('user');
//dd($roles); // echo+exit
$r=$user->role==1?"admin":"user";
if(in_array($r,$roles)){
    return $next($request);
}
}
    return redirect('login_checkout');
}


}
