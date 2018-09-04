<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\ContentType;
use Illuminate\Http\Request;

class ContentController extends Controller {

	public function index(Request $request, $content_type) {

		//$meta = $this->getActionName($request);



		//print_r($meta);
		if(!ContentType::where('type', $content_type)->first())
			abort(404);

		$content = Content::with('contentType')->paginate(15);


		print_r($this->meta);

		return view('content.posts.index', compact('content'));
	}

}
