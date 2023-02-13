<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\PictureController;
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

// update password user
Route::get('/update_password', [HomeController::class, 'update_password'])->name('update_password');

// mengirim data password user yang mau diubah
Route::patch('/store_password', [HomeController::class, 'store_password'])->name('store_password');

// middleware untuk admin
Route::middleware(['admin'])->group(function() {
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// put locale
Route::get('/locale/{locale}', [LocaleController::class, 'set_locale'])->name('set_locale');

// storage
// menambahkan data pictures ke database
Route::get('/picture/create', [PictureController::class, 'create'])->name('create_picture');

// mengirim data pictures ke database
Route::post('/picture/create', [PictureController::class, 'store'])->name('store_picture');

// melihat data pictures dari database
Route::get('/picture/{picture}', [PictureController::class, 'show'])->name('show_picture');

// menghapus data picture dari database
Route::delete('/picture/{picture}', [PictureController::class, 'delete'])->name('delete_picture');

// menggandakan data picture dari database ke folder tertentu
Route::get('/copy/{picture}', [PictureController::class, 'copy'])->name('copy_picture');

// memindahkan data picture dari database ke folder tertentu
Route::get('/move/{picture}', [PictureController::class, 'move'])->name('move_picture');