<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArtistController;
use App\Http\Controllers\Admin\MusicController;
use App\Http\Controllers\Website\HomeController;
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

Route::get('/', [AuthenticatedSessionController::class, 'create']);

Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth']);


Route::post('/save_image/{id?}', [AdminController::class, 'save_image'])->middleware(['auth'])->name('upload.image');

Route::post('/store_image', [AdminController::class, 'storeImage'])->middleware(['auth'])->name('ckeditor.upload');


/**
 * BannerController
 */
Route::get('/dashboard/artist', [ArtistController::class, 'index'])->middleware(['auth'])->name('artist.index');
Route::get('/dashboard/banner/artist', [ArtistController::class, 'create'])->middleware(['auth'])->name('artist.create');
Route::post('/dashboard/artist/store', [ArtistController::class, 'store'])->middleware(['auth'])->name('artist.store');
Route::delete('/dashboard/artist/{id}', [ArtistController::class, 'destory'])->middleware(['auth'])->name('artist.destroy');
Route::get('/dashboard/artist/edit/{id}', [ArtistController::class, 'edit'])->middleware(['auth'])->name('artist.edit');
Route::put('/dashboard/artist/update/{id}', [ArtistController::class, 'update'])->middleware(['auth'])->name('artist.update');

require __DIR__ . '/auth.php';

// Route::match(['get', 'post'], '/{slug}', [HomeController::class, 'slug'])->where('slug', '.*');