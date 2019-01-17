<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Admin as AdminModel;

class Admin
{
    public function handle($request, Closure $next)
    {
        // cek jika sessi telah habis
        if (Cookie::get('adminsession') === null && Cookie::get('adminsession') === null && $request->username === null && $request->password === null)
        return redirect('/admin/login');

        // cek jika user berusaha untuk login
        if(Cookie::get('adminsession') !== null && Cookie::get('adminsession') == 1) {
            return $next($request);
        } else {
            $auth = auth()->guard('admin');
            
            $credentials = [
                'username' => $request->username,
                'password' => $request->password
            ];
            
            if ($auth->attempt($credentials)) {
                Cookie::queue(Cookie::make('adminsession', 1, 120, '/'));
                Cookie::queue(Cookie::make('adminid', $auth->user()->id, 120, '/'));
                
                return $next($request);
            } else {
                return back()->with('error', "invalid credentials")->withCookie(Cookie::forget('adminsession'))->withCookie(Cookie::forget('adminid'));
            }
            
            
        }
    }
}
