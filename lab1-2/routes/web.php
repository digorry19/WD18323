<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\BookController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('layout');
// });
// // routes/web.php
// Route::get('/header', function () {
//     return view('header');
// });

// Route::get('/books', function () {
//     $books = DB::table('books')
//     ->join('categories', 'books.category_id', '=', 'categories.id')
//     ->get();
// });
// Route::get('/', [BookController::class, 'index'])->name('home');
// Route::get('/category/{id}', [BookController::class, 'category'])->name('category');
// Route::get('/book/{id}', [BookController::class, 'show'])->name('book.show');
// Route::prefix('categories')->group(function (){
//     Route::get('/list', [CategoryController::class, 'index'])->name('category.index');
// });
Route::prefix('books')->group(function (){
    Route::get('/list-book', [BookController::class, 'index'])->name('books.index');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
    Route::delete('/books/delete-all', [BookController::class, 'destroyAll'])->name('books.destroyAll');
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');
    Route::post('books/{id}', [BookController::class, 'update'])->name('books.update');
});
