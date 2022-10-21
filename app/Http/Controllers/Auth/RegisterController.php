<?php

namespace App\Http\Controllers\Auth;

use App\Forms\RegisterForm;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

/**
 * Class RegisterController
 * @package App\Http\Controllers\User
 */
class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * @return Application|Factory|View
     */
    public function register()
    {
        return view('user.register');
    }

    /**
     * @param RegisterForm $request
     * @return string
     */
    public function create(RegisterForm $request): string
    {
        DB::beginTransaction();

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            DB::commit();
        } catch (Throwable $exception) {
            DB::rollBack();

            return $exception->getMessage();
        }

        return redirect()
            ->route('user.login')
            ->with('success', 'Вы успешно зарегистрировались');
    }
}
