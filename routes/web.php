<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ContactController;
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

// Route::get('/', [BookController::class, 'becomeAdmin'])->name('becomeAdmin');


Route::get('/welcome', [BookController::class, 'welcome'])->name('welcome');

Route::redirect('/', '/welcome');

Route::get('/book/{idyangdidapat}', [BookController::class, 'bookById'])->name('bookById');//buat halaman details book
Route::get('/category/{id}', [BookController::class, 'categoryById'])->name('categoryById');


Route::get('/publisher', [BookController::class, 'publisher'])->name('publisher');

Route::get('/contact', [BookController::class, 'contact'])->name('contact');

Route::post('/message', [ContactController::class, 'sendMail'])->name('contact.message');

//Route::[httpMethod]('url',[Controller::class, 'namaFunctionDiController']);
// tyang ->name(...) itu buat alias, ntar gampang manggil route ini di file php viewnya
//disini httpmethod bisa get,post,put,delete,etc



//ADMIN
Route::get('/admin/index', [BookController::class, 'index'])->middleware('auth')->name('index');



// ini buat halaman admin CREATE
Route::get('/admin/create', [BookController::class, 'adminCreate'])->middleware('auth')->name('adminCreate');
Route::post('/admin/create', [BookController::class, 'store'])->name('store');



// ini buat halaman admin ASSIGN-CATEGORY
Route::get('/bookCategory/index', [BookController::class, 'bookCategoryIndex'])->middleware('auth')->name('index');
Route::get('/bookCategory/assignCategory', [BookController::class, 'bookCategoryCreate'])->middleware('auth')->name('bookCategoryCreate');
Route::post('/bookCategory/assignCategory', [BookController::class, 'bookCategoryStore'])->name('bookCategoryStore');




// halaman admin UPDATE
Route::get('/admin/edit/{id}', [BookController::class, 'edit'])->middleware('auth')->name('edit');
Route::put('/admin/edit/{id}',[BookController::class, 'update'])->name('update');

// halaman admin DELETE
Route::delete('/admin/destroy/{id}', [BookController::class,'destroy'])->name('destroy');


// LOGIN + REGISTER
// login
Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// register
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest')->name('store');

// change profile name
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth')->name('Profile');
Route::post('/profile', [ProfileController::class, 'update']);

// change password
Route::get('/password', [PasswordController::class, 'index'])->middleware('auth')->name('Password');
Route::post('/password', [PasswordController::class, 'update']);

//Kalo Mau buat Cart
// Route::get('/cart', [CartController::class, 'index'])->middleware('auth')->name('Cart');
