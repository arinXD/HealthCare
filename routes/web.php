<?php

use Illuminate\Support\Facades\Route;
use App\Models\diet_plan;
use App\Models\food;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\bmiController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');





    Route::get('/bmi', function () {
        return view('bmi');
    });
    Route::POST('/bmi', [bmiController::class, 'calculateBMI']);
});

Route::get('/plan', function () {
    $user = Auth::user();

    return view("plan", compact('user'));
});
// Route::get('/rec', function () {
//     $user = Auth::user();

//     return view("rec", compact('user'));
// });
// Route::get('/bmi', [bmiController::class], 'calbmi');





