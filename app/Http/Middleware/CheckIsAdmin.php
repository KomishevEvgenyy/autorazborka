<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckIsAdmin
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
        $user = Auth::user();
        //васад Auth позволяет получить пользщователя через метод user
        if (!$user->isAdmin()){
            // если true то выполняем условие
            session()->flash('warning', 'У вас нет прав администратора');
            return redirect()->route('index');
        }
        return $next($request);
    }
}
