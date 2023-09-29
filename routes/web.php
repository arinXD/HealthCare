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


    //หน้าhome
    Route::get('/homepage', function () {
        return view('homepage');
    })->name('homepage');



    Route::get('/bmi', function () {
        return view('bmi');
    })->name('bmi');

    Route::POST('/bmi', [bmiController::class, 'calculateBMI']);


    Route::post('/bmi/save', [bmiController::class, 'savebmi'])->name('bmi.save');
    Route::get('/bmi/delete/{bmi_id}', [bmiController::class, 'deletebmi'])->name('bmi.delete');


    Route::get('/recommend', [bmiController::class, 'recommend'])->name('recommend');
    // แก้หน้านี้
    Route::get('/recommendpro', [bmiController::class, 'recommendpro'])->name('recommendpro');

    Route::get('/healthrecord', function () {
        return view('healthrecord');
    })->name('healthrecord');



    Route::get('/plan', function () {
        $user = Auth::user();

        return view("plan", ['user' => $user]);
    });
});

// Route::get('/rec', function () {
//     $user = Auth::user();

//     return view("rec", compact('user'));
// });
// Route::get('/bmi', [bmiController::class], 'calbmi');
