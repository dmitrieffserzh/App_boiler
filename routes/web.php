<?php

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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');









// NEWS
Route::group([
	'prefix'        => 'news'],
	//'middleware'    => 'filter.view.counts'],
	function() {
		Route::get('/',                         [ 'as' => 'news.index',                   'uses' => 'NewsController@index' ]);
		Route::get('{category}',                [ 'as' => 'news.category',                'uses' => 'NewsController@category' ]);
		Route::get('{category}/{slug}',         [ 'as' => 'news.show',                    'uses' => 'NewsController@show' ]);
	});
