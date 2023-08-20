<?php

use App\Http\Controllers\AnnounceController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/search', [SearchController::class, 'index'])
    ->name('search.index');

Route::prefix('users')->group(function () {
    Route::get('/mypage/{user}', [UserController::class, 'mypage'])
        ->name('users.mypage');
});

Route::prefix('followers')->group(function () {
    Route::get('{follower}/{type}', [FollowerController::class, 'list'])
        ->where('type', '(following|followed)')
        ->name('followers.list');
});

Route::resource('users', UserController::class);

Route::resource('announces', AnnounceController::class);

Route::resource('comments', CommentController::class);

Route::resource('favorites', FavoriteController::class);

Route::resource('followers', FollowerController::class)->except([
    'index',
    'create',
    'show',
    'edit',
    'update',
]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
