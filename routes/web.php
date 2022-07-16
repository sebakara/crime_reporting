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
Route::post('/login-v2', 'App\Http\Controllers\HomeController@login')->name('loginv2');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


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
Route::post('admin/store/community/account/details',[App\Http\Controllers\Admin\AdminController::class, 'create_community_account'])->name('admin.store.community');

Route::get('admin/police/account/inactive/{id}',[App\Http\Controllers\Admin\AdminController::class, 'inactiveStatus']);
Route::get('admin/police/account/active/{id}',[App\Http\Controllers\Admin\AdminController::class, 'activeStatus']);
Route::get('admin/full_address/{id}',[App\Http\Controllers\Admin\AdminController::class, 'viewAddresses']);

Route::get('admin/community/account/inactive/{id}',[App\Http\Controllers\Admin\AdminController::class, 'inactiveStatus']);
Route::get('admin/community/account/active/{id}',[App\Http\Controllers\Admin\AdminController::class, 'activeStatus']);
Route::get('admin/full_address/{id}',[App\Http\Controllers\Admin\AdminController::class, 'viewAddresses']);
Route::get('admin/change/password',[App\Http\Controllers\Admin\AdminController::class, 'changePassword'])->name('admin.changePassword');
Route::post('admin/change/password',[App\Http\Controllers\Admin\AdminController::class, 'saveChangePassowrd'])->name('admin.store.password');

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

Route::get('community/submit/report/',[App\Http\Controllers\Community\CommunityController::class, 'submit_report'])->name('community.submit.report');
Route::get('community/view/report/',[App\Http\Controllers\Community\CommunityController::class, 'view_report'])->name('community.view.report');
Route::get('community/edit/report/',[App\Http\Controllers\Community\CommunityController::class, 'edit_report'])->name('community.edit.report');
Route::get('community/change/password/',[App\Http\Controllers\Community\CommunityController::class, 'change_password'])->name('community.change.password');
Route::post('community/update/password/',[App\Http\Controllers\Community\CommunityController::class, 'update_password'])->name('community.update.password');



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
