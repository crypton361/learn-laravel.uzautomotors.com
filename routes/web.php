<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
//
//$route = Route::current();
//$name = Route::currentRouteName();
//$action = Route::currentRouteAction();
//
//
//$route = Route::currentRouteName();
//
//$url = Request::url();
//$path = Request::path();
//$root = Request::root();
//
//$pieces = explode("/", $url);
//echo $pieces[3]; // piece2
//echo "<br>";
//echo $pieces[4];
//echo "<br>";
//echo $pieces[5];
//echo "<br>";
//
//$pieces2 = explode(",", $pieces[5]);
//echo $pieces2[0];
//echo "<br>";
//echo $pieces2[1];
//
//$controller = $pieces[3];

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

Route::middleware(['role:user'])->prefix('admin_panel')->group(function(){
    Route::get('/', [\App\Http\Controllers\Admin\HomeController::class, 'index']);
});


//Route::group(['middleware'=> ['role:user']], function (){
////    $url = Request::url();
////    $controller_url = explode("/", $url);
////
////    $controller_exploded = $controller_url[3];
////    $controller_first_char = substr($controller_exploded, 0, 1);
////    $controller_exclude_first_char = substr($controller_exploded, 1);
////
////    $controller = strtoupper($controller_first_char) . $controller_exclude_first_char;
////    $controller_class = $controller . "Controller";
//////
////    Route::get('/'.$controller_exploded, [SiteController::class, 'index']);
//////    Route::get('site', SiteController::class);
//
//    Route::get("/", function () {
//        return view('test');
//    });
//
//});
