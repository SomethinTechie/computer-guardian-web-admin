<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\User;
use App\Http\Controllers\ParcelController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\QuoteController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/api/users', function (Request $request) {
    $users = User::all();

    return response()->json($users);
});

//Auth::routes(['register' => false]);
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::resource('parcels', ParcelController::class);
    Route::resource('customers', CustomerController::class);
    Route::resource('support', SupportController::class);
    Route::resource('quotes', QuoteController::class);
});
