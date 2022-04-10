<?php
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcateoryController;
use App\Http\Controllers\DisctrictController;
use App\Http\Controllers\SubdisctrictController;
use App\Http\Controllers\PostsController;

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
Route::get('/disctrict', [DisctrictController::class, 'index'])->name('district');
Route::get('/add/disctrict', [DisctrictController::class, 'create'])->name('add.district');
Route::post('/store/disctrict', [DisctrictController::class, 'store'])->name('store.district');
Route::get('/edit/disctrict/{id}', [DisctrictController::class, 'edit'])->name('edit.district');
Route::post('/update/disctrict/{id}', [DisctrictController::class, 'update'])->name('update.district');
Route::get('/delete/disctrict/{id}', [DisctrictController::class, 'destroy'])->name('delete.district');
Route::get('/subdistrict', [SubdisctrictController::class, 'index'])->name('subdistrict');
Route::get('/add/subdistrict', [SubdisctrictController::class, 'create'])->name('add.subdistrict');
Route::post('/store/subdistrict', [SubdisctrictController::class, 'store'])->name('store.subdistrict');
Route::get('/edit/subdistrict/{id}', [SubdisctrictController::class, 'edit'])->name('edit.subdistrict');
Route::post('/update/subdistrict/{id}', [SubdisctrictController::class, 'update'])->name('update.subdistrict');
Route::get('/delete/subdistrict/{id}', [SubdisctrictController::class, 'destroy'])->name('delete.subdistrict');
Route::get('/get/subcategory/{category_id}', [PostsController::class, 'GetSubCategory']);
Route::get('/get/subdistrict/{district_id}', [PostsController::class, 'GetSubDistrict']);
Route::get('/all/post', [PostsController::class, 'index'])->name('all.post');
Route::get('/createpost', [PostsController::class, 'create'])->name('create.post');
Route::post('/store/post', [PostsController::class, 'store'])->name('store.post');

