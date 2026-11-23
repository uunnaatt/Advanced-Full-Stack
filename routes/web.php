<?php

use App\Http\Controllers\DebugController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Section 7 - Static pages (Home, About, Contact) using Blade layouts
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('home');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

/*
|--------------------------------------------------------------------------
| Section 5 - Basic routes
|--------------------------------------------------------------------------
*/

// 5.2 Closure route returning a string
Route::get('/hello', function () {
    // 6.1 dd('This is the /hello route');   <- removed after testing (6.5 clean up)
    return 'Hello, Laravel!';
});

// 5.4 / 5.5 Route with an optional parameter (replaces the required-parameter version)
Route::get('/greet/{name?}', function (string $name = 'Guest') {
    return 'Hello, ' . $name . '!';
});

/*
|--------------------------------------------------------------------------
| Section 6 - dd() debugging routes (dd() calls commented out per 6.5)
|--------------------------------------------------------------------------
*/

// 6.2 dd() with the Request object - visit /debug?name=Ram&age=22
Route::get('/debug', function (Request $request) {
    // dd($request->all());
    return $request->all();
});

// 6.3 dd() inside a controller
Route::get('/debug-controller', [DebugController::class, 'index']);
