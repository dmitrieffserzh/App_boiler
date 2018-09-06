<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Category;
use Illuminate\Http\Request;

class NewsController extends Controller {

	public function index() {
		return view('content.news.index', [
			'content'=> News::latest()->paginate(15)
		]);
	}


	public function category( $category_slug ) {
		$category = Category::where( 'slug', $category_slug )->firstOrFail();
		$content = $category->getNews()->latest()->paginate( 15 );

		//dd($caregory);
		$this->meta->title = $category->title
		                     .$this->meta->divider
		                     .$this->meta->title;

		return view( 'content.news.index', ['content' => $content]);
	}


	public function show( $category, $slug ) {
		$post = News::where( 'slug', $slug )->firstOrFail();
		if ($post->getCategory->slug != $category ) {
			abort( 404 );
		}


//		Event::fire( 'news.show', $news );
		$content = view( 'content.news.show', [
			'post' => $post,
		]);

		$this->meta->title = $post->title
		                     .$this->meta->divider
		                     .$post->getCategory->title
		                     .$this->meta->divider
		                     .$this->meta->title;

		return response($content)->header('Last-Modified', $post->updated_at->tz('GMT')->toAtomString());
	}


}
