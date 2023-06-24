<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

// ルートURL(Laravelが置かれているフォルダ)にアクセスした時、投稿一覧ページを表示
Route::get('/', [PostController::class, 'index']);

/*
// 投稿の一覧ページ
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');

// 投稿の作成ページ
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// 投稿の作成機能
Route:: post('/posts', [PostController::class, 'store'])->name('posts.store');			// create.blade.php内のformでpostメソッドが設定されている。

// 投稿の詳細ページ
Route:: get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');		// '{post}(URL)'は各投稿のidが入る

// 投稿の更新ページ
Route:: get('posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');

// 投稿の更新機能
Route:: patch('posts/{post}', [PostController::class, 'update'])->name('posts.update');

// 投稿の削除機能
Route::delete('posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
*/

Route::resource('posts', PostController::class);