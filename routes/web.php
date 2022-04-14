<?php

use App\Http\Controllers\ExtraController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SocialsController;
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
    return view('main.home');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/admin/logout', [HomeController::class, 'Logout'])->name('admin.logout');
Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::get('/add/category', [CategoryController::class, 'create'])->name('add.category');
Route::post('/store/category', [CategoryController::class, 'store'])->name('store.category');
Route::get('/edit/category/{id}', [CategoryController::class, 'edit'])->name('edit.category');
Route::post('/update/category/{id}', [CategoryController::class, 'update']);
Route::get('/delete/category/{id}', [CategoryController::class, 'delete'])->name('delete.category');
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
Route::get('/edit/post/{id}', [PostsController::class, 'edit'])->name('edit.post');
Route::post('/update/post/{id}', [PostsController::class, 'update'])->name('update.post');
Route::get('/delete/post/{id}', [PostsController::class, 'destroy'])->name('delete.post');
Route::get('/social/setting', [SocialsController::class, 'index'])->name('social.setting');
Route::post('/update/setting/{id}', [SocialsController::class, 'store'])->name('update.social');
Route::get('seo/setting', [SocialsController::class, 'seo'])->name('seo.setting');
Route::post('/update/seo/{id}', [SocialsController::class, 'storeseo'])->name('update.seo');
Route::get('/prayer/setting', [SocialsController::class, 'prayersetting'])->name('prayer.setting');
Route::post('/update/prayer/{id}', [SocialsController::class, 'updateprayersetting'])->name('update.prayer');
Route::get('/livetv/setting', [SocialsController::class, 'livetvsetting'])->name('livetv.setting');
Route::post('/update/livetv/{id}', [SocialsController::class, 'updatelivetv'])->name('update.livetv');
Route::get('/deactive.livetv/{id}', [SocialsController::class, 'deactivelivetv'])->name('deactive.livetv');
Route::get('/active/livetv/{id}', [SocialsController::class, 'activelivetv'])->name('active.livetv');
Route::get('/notice/setting', [SocialsController::class, 'noticesetting'])->name('notice.setting');
Route::post('/update/notice/{id}', [SocialsController::class, 'updatenotice'])->name('update.notice');
Route::get('/deactive/notice/{id}', [SocialsController::class, 'deactivenotice'])->name('deactive.notice');
Route::get('/active/notice/{id}', [SocialsController::class, 'activenotice'])->name('active.notice');
Route::get('/website/setting', [SocialsController::class, 'websitesetting'])->name('website.all');
Route::get('/add/website', [SocialsController::class, 'addwebsite'])->name('add.website');
Route::post('/store/website', [SocialsController::class, 'storewebsite'])->name('store.website');
Route::get('/edit/website/{id}', [SocialsController::class, 'editwebsite'])->name('edit.website');
Route::post('/update/website/{id}', [SocialsController::class, 'updatewebsite'])->name('update.website');
Route::get('/delete/website/{id}', [SocialsController::class, 'deletewebsite'])->name('delete.website');
Route::get('/photo/gallery', [GalleryController::class, 'index'])->name('photo.gallery');
Route::get('/add/photo', [GalleryController::class, 'create'])->name('add.photo');
Route::post('/store/photo', [GalleryController::class, 'store'])->name('store.photo');
Route::get('/photo/gallery/{id}', [GalleryController::class, 'edit'])->name('edit.gallery');
Route::post('/update/photo/{id}', [GalleryController::class, 'update'])->name('update.photo');
Route::get('/delete/photo/{id}', [GalleryController::class, 'delete'])->name('delete.gallery');
Route::get('/video/gallery', [GalleryController::class, 'videogallery'])->name('video.gallery');
Route::get('/add/video', [GalleryController::class, 'addvideo'])->name('add.video');
Route::post('/store/video', [GalleryController::class, 'storevideo'])->name('store.video');
Route::get('/edit/Video/{id}', [GalleryController::class, 'editVideo'])->name('edit.Video');
Route::post('/update/video/{id}', [GalleryController::class, 'updatevideo'])->name('update.video');
Route::get('/delete/video/{id}', [GalleryController::class, 'deleteVideo'])->name('delete.Video');


Route::get('/lang/english', [ExtraController::class, 'English'])->name('lang.english');
Route::get('/lang/Arabic', [ExtraController::class, 'Arabic'])->name('lang.arabic');
Route::get('/search/district', [ExtraController::class, 'SearchDistrict'])->name('searchby.districts');
Route::get('/view/post/{id}', [ExtraController::class, 'SinglePost']);
Route::get('/catpost/{id}/{category_en}', [ExtraController::class, 'CatPost']);
Route::get('/subcatpost/{id}/{subcategory_en}', [ExtraController::class, 'SubCatPost']);
Route::get('/get/subdistrict/frontend/{district_id}', [ExtraController::class, 'GetSubDist']);
