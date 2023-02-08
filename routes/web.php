<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use PhpParser\Builder\Function_;

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
//     return view('welcome');
// });

// Route::get('/greeting', function () {
//     return 'Hello World';
// })->name('greeting');

// Route::get('/greeting/{name}', function ($name) {
//     return view('index', [
//         'name' => $name
//     ]);
// })->name('greeting_with_name');

// menampilkan data sesuai dengan id student
Route::get('/show/{id}', [StudentController::class, 'show'])->name('show');

// menampilkan semua data
Route::get('/', [StudentController::class, 'index'])->name('index');

// menampilkan data yang sudah di filter di controller
Route::get('/filter', [StudentController::class, 'filter']);

// menambahkan data ke database
Route::get('/create', [StudentController::class, 'create'])->name('create');

// mengirim data ke dalam database
Route::post('/create', [StudentController::class, 'store'])->name('store');

// mendapatkan data inputan lama dari database
Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('edit');

// mengupdate data ke dalam database
Route::patch('/update/{student}', [StudentController::class, 'update'])->name('update');

// menghapus data
Route::delete('/delete/{student}', [StudentController::class, 'delete'])->name('delete');

// update password user
Route::get('/update_password', [HomeController::class, 'update_password'])->name('update_password');

// mengirim data password user yang mau diubah
Route::patch('/store_password', [HomeController::class, 'store_password'])->name('store_password');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
