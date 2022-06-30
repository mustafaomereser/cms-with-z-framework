<?php

use Core\Route;
use Core\Middleware;

use App\Middlewares\Auth;
use App\Middlewares\Guest;
use App\Middlewares\IsAdmin;

use App\Controllers\Admin\Auth\LoginController;
use App\Controllers\Admin\ContentController;
use App\Controllers\Admin\HomeController;
use App\Controllers\Admin\MenuController;
use App\Controllers\Admin\ThemeEditorController;
use App\Controllers\Admin\ThemesController;

Route::$preURL = '/admin';

Middleware::middleware([Guest::class], function ($declined) {
    if (count($declined)) return;

    Route::resource('/login', LoginController::class);
});

Middleware::middleware([Auth::class, IsAdmin::class], function ($declined) {
    if (count($declined) && (strstr(uri(), Route::$preURL) && !Route::$called)) redirect(Route::name('admin.login.index'));

    Route::any('/', [HomeController::class, 'index'], ['name' => 'admin.home.index']);
    Route::resource('/content', ContentController::class);
    Route::resource('/menu', MenuController::class);
    Route::resource('/themes', ThemesController::class);
    Route::resource('/themeEditor', ThemeEditorController::class, ['no-csrf' => true]);
});
