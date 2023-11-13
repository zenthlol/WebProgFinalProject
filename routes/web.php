<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
// ini import2 kek java, kalo beda folder baru import

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


Route::get('/', [BookController::class, 'welcome'])->name('welcome');

Route::get('/book/{idyangdidapat}', [BookController::class, 'bookById'])->name('bookById');//buat halaman details book

Route::get('/category/{id}', [BookController::class, 'categoryById'])->name('categoryById');

Route::get('/publisher', [BookController::class, 'publisher'])->name('publisher');

Route::get('/contact', [BookController::class, 'contact'])->name('contact');
//Route::[httpMethod]('url',[Controller::class, 'namaFunctionDiController']);

// tyang ->name(...) itu buat alias, ntar gampang manggil route ini di file php viewnya

//disini httpmethod bisa get,post,put,delete,etc


