<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

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

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/login/siswa', [AuthController::class, 'showLoginFormSiswa'])->name('login.siswa');
Route::post('/login/siswa', [AuthController::class, 'loginSiswa']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/location', [HomeController::class, 'location'])->name('loc');
Route::get('/filtered-content', [HomeController::class, 'filteredContent'])->name('filtered.content');
Route::get('/content/{id}', [HomeController::class, 'showContent'])->name('content.show');
Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
Route::get('/profile/{id?}', [HomeController::class, 'user'])->name('user.profile');

Route::middleware(['auth'])->group(function () {

    Route::get('/produk', [HomeController::class, 'produk'])->name('produk');
    Route::post('/logout', [HomeController::class, 'logout'])->name('logout');

    Route::get('/edit-nis', [AuthController::class, 'editNis'])->name('edit.nis');
    Route::post('/update-nis', [AuthController::class, 'updateNis'])->name('update.nis');

    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/{content}', [FavoriteController::class, 'store'])->name('favorites.store');
    Route::delete('/favorites/{content}', [FavoriteController::class, 'destroy'])->name('favorites.destroy');

    Route::get('/profile', [HomeController::class, 'user'])->name('profile');
    Route::get('/profile-create', [HomeController::class, 'create'])->name('profile.create');
    Route::post('/create-profile', [HomeController::class, 'store'])->name('store-profile');
    Route::get('/profile-edit', [HomeController::class, 'user_setting'])->name('edit-profile');
    Route::put('/profile-edit', [HomeController::class, 'update'])->name('update-profile');
    Route::delete('/profile-image', [HomeController::class, 'deleteProfileImage'])->name('delete-profile-image');

    Route::get('/add-content', [HomeController::class, 'createContent'])->name('add-content');
    Route::post('/add-content', [HomeController::class, 'storeContent'])->name('store-content');
    Route::get('/content/{id}/edit', [HomeController::class, 'editContent'])->name('content.edit');
    Route::put('/content/{id}', [HomeController::class, 'updateContent'])->name('content.update');
    Route::delete('/content/{id}', [HomeController::class, 'destroyContent'])->name('content.destroy');
    Route::delete('/blog/content/{id}', [HomeController::class, 'destroyContents'])->name('contents.destroy');

    Route::get('/content/{content}/report', [ReportController::class, 'create'])->name('reports.create');
    Route::post('/content/{content}/report', [ReportController::class, 'store'])->name('reports.store');
    Route::get('/laporan', [ReportController::class, 'showLapor'])->name('laporkan');

    Route::get('/forgot', [ResetPasswordController::class, 'showResetForm'])->name('password.request');
    Route::post('/reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::middleware(['auth', 'check.admin.role'])->group(function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/search-users', [AdminController::class, 'searchUsers'])->name('search.users');
    Route::get('/admin/edit/{id}', [AdminController::class, 'edit'])->name('edit.user');
    Route::put('/admin/update/{id}', [AdminController::class, 'update'])->name('admin.update');
    Route::get('/admin/delete/{id}', [AdminController::class, 'deleteUser'])->name('delete.user');
    Route::get('/user/{id}/reports', [AdminController::class, 'showReports'])->name('user.report');

    Route::get('/create-user', [AdminController::class, 'create'])->name('create-user');
    Route::post('/create-user', [AdminController::class, 'store'])->name('create-user.store');

    Route::get('/users-analistik', [AdminController::class, 'UsersAnalistik'])->name('user-analitik');
    Route::get('/fav-analistik', [AdminController::class, 'FavAnalistik'])->name('fav-analitik');
    Route::get('/search-analistik', [AdminController::class, 'SearchAnalistik'])->name('search-analitik');
});
