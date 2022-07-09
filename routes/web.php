<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Admin Router

Route::group([ 'as' =>'admin.','prefix'=>'admin','namespace'=>'Admin','middleware'=> ['auth','admin']],
function(){
    Route::get('dashboard',[App\Http\Controllers\Admin\AdminController::class, 'index'])->name('dashboard');

}
);

//Police Router

Route::group([ 'as' =>'police.','prefix'=>'police','namespace'=>'Police','middleware'=> ['auth','police']],
function(){
    Route::get('dashboard',[App\Http\Controllers\Police\PoliceController::class, 'index'])->name('dashboard');

}
);

//Community Router

Route::group([ 'as' =>'community.','prefix'=>'community','namespace'=>'Community','middleware'=> ['auth','community']],
function(){
    Route::get('dashboard',[App\Http\Controllers\Community\CommunityController::class, 'index'])->name('dashboard');

}
);