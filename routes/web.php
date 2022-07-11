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

Route::get('admin/create/police/account',[App\Http\Controllers\Admin\AdminController::class, 'police_account'])->name('admin.account.police');
Route::get('admin/create/community/account',[App\Http\Controllers\Admin\AdminController::class, 'community_account'])->name('admin.account.community');
Route::get('admin/manage/police',[App\Http\Controllers\Admin\AdminController::class, 'manage_police'])->name('admin.manage.police');
Route::get('admin/manage/community',[App\Http\Controllers\Admin\AdminController::class, 'manage_community'])->name('admin.manage.community');

Route::post('admin/store/police/account/details',[App\Http\Controllers\Admin\AdminController::class, 'create_police_account'])->name('admin.store.police');

Route::get('admin/get/sectorname/{district_id}',[App\Http\Controllers\Admin\AdminController::class, 'getSectors']);
Route::get('admin/get/cellname/{sector_id}',[App\Http\Controllers\Admin\AdminController::class, 'getCells']);


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