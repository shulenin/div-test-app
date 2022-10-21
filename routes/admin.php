<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'admin.',
    'prefix' => 'admin',
], static function () {
    //Главная
    Route::get('requests', [AdminController::class, 'getRequests'])->name('requests');

    //Страница юзера
    Route::get('user', [AdminController::class, 'getUserPage'])->name('user');

    //Отправить запрос на почту клиента
    Route::put('request', [AdminController::class, 'request'])->name('request');
});
