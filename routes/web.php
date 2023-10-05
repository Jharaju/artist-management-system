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

Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');


Route::post('/save_image/{id?}', [AdminController::class, 'uploadImage'])->middleware(['auth'])->name('upload.image');

Route::post('/store_image', [AdminController::class, 'storeImage'])->middleware(['auth'])->name('ckeditor.upload');


/**
 * UserController
 */
Route::get('/dashboard/user', [UserController::class, 'index'])->middleware(['auth'])->name('user.index');
Route::post('/dashboard/user/store', [UserController::class, 'store'])->middleware(['auth'])->name('user.store');
Route::delete('/dashboard/user/{id}', [UserController::class, 'destroy'])->middleware(['auth'])->name('user.destroy');
Route::get('/dashboard/user/edit/{id}', [UserController::class, 'edit'])->middleware(['auth'])->name('user.edit');
Route::put('/dashboard/user/update/{id}', [UserController::class, 'update'])->middleware(['auth'])->name('user.update');

Route::post('/import-user',[UserController::class,'importUser'])->name('user.import');


/**
 * ArtistController
 */
Route::get('/dashboard/artist', [ArtistController::class, 'index'])->middleware(['auth'])->name('artist.index');
Route::post('/dashboard/artist/store', [ArtistController::class, 'store'])->middleware(['auth'])->name('artist.store');
Route::delete('/dashboard/artist/{id}', [ArtistController::class, 'destroy'])->middleware(['auth'])->name('artist.destroy');
Route::get('/dashboard/artist/edit/{id}', [ArtistController::class, 'edit'])->middleware(['auth'])->name('artist.edit');
Route::put('/dashboard/artist/update/{id}', [ArtistController::class, 'update'])->middleware(['auth'])->name('artist.update');

Route::post('/import-artist',[ArtistController::class,'importArtist'])->name('artist.import');

/**
 * MusicController
 */
Route::get('/dashboard/music', [MusicController::class, 'index'])->middleware(['auth'])->name('music.index');
Route::post('/dashboard/music/store', [MusicController::class, 'store'])->middleware(['auth'])->name('music.store');
Route::delete('/dashboard/music/{id}', [MusicController::class, 'destroy'])->middleware(['auth'])->name('music.destroy');
Route::get('/dashboard/music/edit/{id}', [MusicController::class, 'edit'])->middleware(['auth'])->name('music.edit');
Route::put('/dashboard/music/update/{id}', [MusicController::class, 'update'])->middleware(['auth'])->name('music.update');


require __DIR__ . '/auth.php';

// Route::match(['get', 'post'], '/{slug}', [HomeController::class, 'slug'])->where('slug', '.*');