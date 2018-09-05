<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentType;
use Illuminate\Http\Request;

class ContentController extends Controller {

	public function index($content_type) {

		if(!ContentType::where('type', $content_type)->first())
			abort(404);

		$content = Content::with('contentType')->paginate(15);

		return view('content.posts.index', ['content'=> $content, 'meta'=>$this->meta]);
	}

}
