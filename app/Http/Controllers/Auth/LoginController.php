<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

/**
 * Class LoginController
 * @package App\Http\Controllers\User
 */
class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * @return Application|Factory|View
     */
    public function login()
    {
        return view('user.login');
    }

    /**
     * @return RedirectResponse
     */
    public function authenticate(): RedirectResponse
    {
        return redirect()
            ->route('user.login')
            ->withErrors('Неверный логин или пароль');
    }

    /**
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();

        return redirect()
            ->route('user.login')
            ->with('success', 'Вы вышли из личного кабинета');
    }
}
