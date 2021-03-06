<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PackageController;

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
    return redirect()->route('packages.index');
});

Route::resource('packages', PackageController::class);
Route::get('/packages/result/{order_size}', [ PackageController::class, 'result']);