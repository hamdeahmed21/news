<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcateoryController;

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

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/logout', [HomeController::class, 'Logout'])->name('admin.logout');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/add/category', [CategoryController::class, 'create'])->name('add.category');
Route::post('/store/category', [CategoryController::class, 'store'])->name('store.category');
Route::get('/edit/category/{id}', [CategoryController::class, 'edit']);
Route::post('/update/category/{id}', [CategoryController::class, 'update']);
Route::get('/delete/category/{id}', [CategoryController::class, 'delete']);
Route::get('/subcategory', [SubcateoryController::class, 'index'])->name('subcategory');
Route::get('/add/subcategory', [SubcateoryController::class, 'create'])->name('add.subcategory');
Route::post('/store/subcategory', [SubcateoryController::class, 'store'])->name('store.subcategory');
Route::get('/edit/subcategory/{id}', [SubcateoryController::class, 'edit'])->name('edit.subcategory');
Route::post('/update/subcategory/{id}', [SubcateoryController::class, 'update'])->name('update.subcategory');
Route::get('/delete/subcategory/{id}', [SubcateoryController::class, 'destroy'])->name('delete.subcategory');
