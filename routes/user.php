<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'user.',
    'prefix' => 'user',
], static function () {
    //Вход
    Route::get('login', [LoginController::class, 'login'])
        ->name('login');

    //Аутентификация
    Route::post('login', [LoginController::class, 'authenticate'])
        ->name('auth');

    //Выход
    Route::get('logout', [LoginController::class, 'logout'])
        ->name('logout');

    //Регистрация
    Route::get('register', [RegisterController::class, 'register'])
        ->name('register');

    //Создание пользователя
    Route::post('register', [RegisterController::class,'create'])
        ->name('create');

    //Главная
    Route::get('dashboard', [UserController::class, 'dashboard'])
        ->name('dashboard');

    //Отправить запрос
    Route::post('request', [UserController::class, 'request'])
        ->name('request');

    //Удаление заявки
    Route::post('delete', [UserController::class, 'deleteRequest'])
        ->name('delete');
});