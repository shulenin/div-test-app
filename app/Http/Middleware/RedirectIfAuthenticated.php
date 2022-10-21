<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * @param Request $request
     * @param Closure $next
     * @param ...$guards
     * @return RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if ($request->post('email') === env('ADMIN_LOGIN') && $request->post('password') === env('ADMIN_PASSWORD')) {
                return redirect()
                    ->route('admin.requests', ['filterByStatus' => 'all', 'filterByDate' => 'asc']);
            }

            return redirect()
                ->route('user.dashboard')
                ->with('success', 'Вы вошли в личный кабинет');
        }

        return $next($request);
    }
}
