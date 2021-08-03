<?php
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaController;
use App\Http\Controllers\KriteriaController;
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

// Route::get('/', function () {
//     return view('backend/home');
// });

Route::middleware(['belum_login'])->group(function () {
    Route::get('/','App\Http\Controllers\UserController@indexExt')->name('login');
    Route::get('/login','App\Http\Controllers\UserController@indexExt');
    Route::post('aksilogin','App\Http\Controllers\UserController@aksilogin')->name('login-admin');
    Route::post('/register-user','App\Http\Controllers\UserController@aksiregister')->name('saveuser');
    Route::get('register','App\Http\Controllers\UserController@register')->name('register');
});

Route::middleware(['sudah_login'])->group(function () {
    Route::get('logout','App\Http\Controllers\UserController@logout')->name('logout');
    Route::get('home','App\Http\Controllers\UserController@indexExt')->name('home');

    //Dashboard
    Route::get('count','App\Http\Controllers\HomeController@count');
    Route::get('countta','App\Http\Controllers\HomeController@count');

    //User
    Route::get('/user',[UserController::class, 'index'])->name('user');
    Route::get('/user/create',[UserController::class, 'create'])->name('user.create');
    Route::post('/user',[UserController::class, 'store'])->name('user.store');
    Route::get('/user/{user}',[UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{user}',[UserController::class, 'update'])->name('user.update');
    Route::get('/user/delete/{user}',[UserController::class, 'destroy'])->name('user.delete');

    //Murid
    Route::get('/ta',[TaController::class, 'index'])->name('ta');
    Route::get('/ta/create',[TaController::class, 'create'])->name('ta.create');
    Route::post('/ta',[TaController::class, 'store'])->name('ta.store');
    Route::get('/ta/{ta}',[TaController::class, 'edit'])->name('ta.edit');
    Route::put('/ta/{ta}',[TaController::class, 'update'])->name('ta.update');
    Route::get('/ta/delete/{ta}',[TaController::class, 'destroy'])->name('ta.delete');

    // Kriteria
    Route::get('/kriteria',[KriteriaController::class, 'index'])->name('kriteria');
    Route::get('/kriteria/create/{id}',[KriteriaController::class, 'create'])->name('kriteria.create');
    Route::post('/kriteria',[KriteriaController::class, 'store'])->name('kriteria.store');
    Route::get('/kriteria/{kriteria}',[KriteriaController::class, 'edit'])->name('kriteria.edit');
    Route::put('/kriteria/{kriteria}',[KriteriaController::class, 'update'])->name('kriteria.update');
    Route::get('/kriteria/delete/{kriteria}',[KriteriaController::class, 'destroy'])->name('kriteria.delete');

});
