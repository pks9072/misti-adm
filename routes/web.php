<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
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
/*
Route::get('/', function () {
    return view('welcome');
});*/

Auth::routes();

Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('dashboard');
    //return redirect()->route('dashboard');
})->name('home');

Route::prefix('goods')->group(function () {
    //Route::resource('/info', TeamController::class)->middleware('admin');
    //Route::resource('/info', TeamController::class);
    Route::resource('/brand', BrandController::class);

});

Route::get('/test', function () {
    return view('test');
});


Route::get('/test', function () {
    return view('test');
});

