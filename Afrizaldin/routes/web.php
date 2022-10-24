<?php

use Illuminate\Support\Facades\Route;   
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\AuthController;


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
    return view('admin.Dashboard');
});

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/project', function () {
//     return view('project');
// });

// Route::get('/contact', function () {
//     return view('contact');
// });

// Route::get('/mastersiswa', function () {
//     return view('admin.MasterSiswa');
// });

// Route::get('/masterproject', function () {
//     return view('admin.MasterProject');
// });

// Route::get('/masterkontak', function () {
//     return view('admin.MasterKontak'); 
// });

// Route::get('/masterkontak', function () {
//     return view('admin.MasterKontak');
// });
// Route::get('/dashboard', function () {
//     return view('admin.Dashboard');
// });


//admin
Route::middleware('auth')->group(function (){
    Route::get('/dashboard', [DashboardController::class,'index']);
    Route::post('/Logout', [AuthController::class,'Logout'])->name('logout');
    Route::get('/masterproject/{id_project}/hapus', [ProjectController::class,'hapus'])->name('masterproject.hapus');
    Route::resource('/mastersiswa', SiswaController::class);   
    Route::resource('/masterproject', ProjectController::class); 
    Route::resource('/masterkontak', KontakController::class); 
});


//guest
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class,'login'])->name('login')->middleware('guest');
    Route::post('/login', [AuthController::class,'authenticate'])->name('login.auth');       
});


Route::get('/dashboard', [DashboardController::class,'index'])->middleware('auth');
Route::get('/mastersiswa/{id_siswa}/hapus', [SiswaController::class,'hapus'])->name('mastersiswa.hapus');
Route::get('/masterproject/{id_project}/hapus', [ProjectController::class,'hapus'])->name('masterproject.hapus');
Route::resource('/mastersiswa', SiswaController::class)->middleware('auth');   
Route::resource('/masterproject', ProjectController::class)->middleware('auth'); 
Route::resource('/masterkontak', KontakController::class)->middleware('auth'); 
Route::get('/login', [AuthController::class,'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class,'authenticate'])->name('login.auth');
Route::post('/Logout', [AuthController::class,'Logout'])->name('logout');
Route::get('/register', [AuthController::class,'register'])->name('register');