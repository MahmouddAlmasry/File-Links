<?php

use App\Http\Controllers\FilesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [SearchController::class, 'main'])->name('main');

    Route::resource('/dashboard', FilesController::class)
    ->names([
        'index' => 'dashboard.index',
        'show' => 'dashboard.show',
        'edit' => 'dashboard.edit',
        'update' => 'dashboard.update',
        'store' => 'dashboard.store',
        'create' => 'dashboard.create',
        'destroy' => 'dashboard.destroy',
    ])->middleware(['auth', 'verified']);

Route::get('/search', [SearchController::class, 'search_code'])->name('search_code');
Route::get('/download/{code}', [SearchController::class, 'download'])->name('download');
Route::get('/https://{url}', [SearchController::class, 'search_url'])->name('search_show');

require __DIR__.'/auth.php';
