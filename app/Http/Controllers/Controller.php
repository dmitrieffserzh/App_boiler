<?php

namespace App\Http\Controllers;

use App\Models\MetaTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;


class Controller extends BaseController {

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


	public $meta = [];

	protected $thisRequest;

	public function __construct(Request $request) {
		$this->thisRequest = $request;
		View::share('meta', $this->meta);
	}


    // META-TAGS
	public function callAction( $method, $parameters ) {

		$action = $this->thisRequest->route()->getAction();
		$controller = class_basename($action['controller']);
		list( $controller, $action ) = explode( '@', $controller );
		$controller = mb_strtolower(str_replace( 'Controller', '', $controller ));

		$this->meta = $this->getMetaTags( $controller, $action );

		return parent::callAction( $method, $parameters );
	}

	public function getMetaTags( $controller, $action ) {

		$data = MetaTag::where( 'controller', $controller )->where( 'action', $action )->first();

		$meta = (object) [
			'title'         => $data->title,
			'description'   => $data->description,
			'keywords'      => $data->keywords,
		];

		return $meta;
	}
}
