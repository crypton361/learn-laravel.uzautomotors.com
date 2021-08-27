<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

$route = Route::current();
$name = Route::currentRouteName();
$action = Route::currentRouteAction();

//$action = Request()->route()->getAction();
//$controller = class_basename($action['controller']);


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




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware'=> ['role:admin']], function (){

    Route::get('/test', function () {
        return view('test');
    });

});
