<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\RegencyController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\VillageController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TindakanController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PemeriksaanController;

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
    return redirect('login');
});

Auth::routes();



Route::middleware(['auth'])->group(function(){
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('provinces', ProvinceController::class);
    Route::resource('regencies', RegencyController::class);
    Route::resource('districts', DistrictController::class);
    Route::resource('villages',VillageController::class);
    Route::resource('employees',EmployeeController::class);
    Route::resource('users',UserController::class);
    Route::resource('tindakans',TindakanController::class);
    Route::resource('obats',ObatController::class);
    Route::resource('pasiens',PasienController::class);
    Route::resource('pemeriksaans',PemeriksaanController::class);
    Route::post('pemeriksaans/{id}/tindakan',[PemeriksaanController::class, 'tindakan'])->name('pemeriksaan-tindakan');
    Route::get('pemeriksaans/{id}/cektagihan',[PemeriksaanController::class, 'cekTagihan'])->name('pemeriksaan-cekTagihan');

});

Route::middleware(['auth', 'checkRole:ADMIN'])->group(function () {
    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    // Route::resource('provinces', ProvinceController::class);

});
