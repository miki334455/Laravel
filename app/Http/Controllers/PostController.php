<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// やりとりするモデルを宣言
use App\Models\Post;

class PostController extends Controller
{
	// 一覧ページ
	public function index() {
		// postsテーブルの全データを新しい順で取得する
		$posts = Post::latest()->get();

		// 変数$postsをposts/index.blade.phpに渡す
		return view('posts.index', compact('posts'));
	}

	// 作成ページ
	public function create() {
		return view('posts.create');
	}

	// レコード追加
	public function store(Request $request) {
		// バリデーション(空白チェック)
		$request->validate([
			'title' => 'required',
			'content' => 'required',
		]);
		
		$post = new Post();								// 新しいレコードを用意
		$post->title = $request->input('title');		// フォームに入力された値を取得して代入
		$post->content = $request->input('content');
		$post->save();									// レコードをテーブルに保存

		return redirect()->route('posts.index')->with('flash_message','投稿が完了しました。');		// 一覧ページにリダイレクトし、フラッシュメッセージを表示
	}

	// 詳細ページ
	public function show(Post $post) {
		// postモデルのインスタンスをshow.blade.phpに渡す
		return view('posts.show', compact('post'));
	}

	//更新ページ
	public function edit(POST $post) {
		// postモデルのインスタンスをedit.blade.phpに渡す
		return view('posts.edit', compact('post'));
	}

	// 更新
	public function update(Request $request, Post $post) {
		// バリデーション(空白チェック)
		$request->validate([
			'title' => 'required',
			'content' => 'required',
		]);
		
		// $postを変更するため、モデルのインスタンス化はしなくて良い
		$post->title = $request->input('title');					// フォームに入力された値を取得して代入
		$post->content = $request->input('content');
		$post->save();
		
		return redirect()->route('posts.show', $post)->with('flash_message', '投稿を編集しました。');
	}

	// 削除
	public function destroy(POST $post) {
		$post->delete();

		return redirect()->route('posts.index')->with('flash_message', '投稿を削除しました。');
	}
}
