<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OurWorkController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SiteIdentityController;
use Illuminate\Support\Facades\Route;

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
Route::get('/admin',[AdminController::class,'index']);

Route::prefix('admin')->group(function () {
    
Route::resource('siteidentity',SiteIdentityController::class);
Route::resource('ourwork',OurWorkController::class );
Route::resource('service',ServiceController::class );
Route::resource('aboutus',AboutUsController::class );


});


