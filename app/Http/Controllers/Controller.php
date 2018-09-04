<?php

namespace App\Http\Controllers;

use App\Models\MetaTag;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    // METATAGS
	public function callAction( $method, $parameters ) {

		$action = $parameters[0]->route()->getAction();
		$controller = class_basename($action['controller']);
		list( $controller, $action ) = explode( '@', $controller );
		$controller = mb_strtolower(str_replace( 'Controller', '', $controller ));

		$this->meta = $this->setMeta( $controller, $action );

		return parent::callAction( $method, $parameters );
	}


	public function setMeta ( $controller, $action ) {

		$data = MetaTag::where( 'controller', $controller )->where( 'action', $action )->first();

		$meta = (object) [
			'title'         => $data->title,
			'description'   => $data->description,
			'keywords'      => $data->keywords
		];

		return $meta;



	}
}
