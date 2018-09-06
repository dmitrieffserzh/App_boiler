<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller {

    public function __construct(Request $request) {
	    parent::__construct($request);
        //$this->middleware('auth');
    }

    public function index() {

    	// META
	    $this->meta->title = 'Главная страница';

        return view('home');
    }
}
