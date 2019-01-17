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
Route::get('/', 'MagicCardsController@home');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::group([
		'as' => 'cards.',
		'prefix' => '{sec}',
		'where' => ['sec' => 'cards'],
	], function ($sec) {
	Route::match(['get','post'],'/',['uses'=>'MagicCardsController@index','as'=>'index']);
	Route::get('/page/{pnum}', 'MagicCardsController@index');
	Route::get('/show/{id}', 'MagicCardsController@show');
	Route::match(['get','post'],'/view', 'MagicCardsController@view');
	Route::match(['get','post'],'/ajax',['uses'=>'MagicCardsController@ajax','as'=>'ajax']);
	Route::match(['get','post'],'/others',['uses'=>'MagicCardsController@others','as'=>'others']);
	Route::match(['get','post'],'/filter',['uses'=>'MagicCardsController@filter','as'=>'filter']);
});

Route::group(['as'=> 'boosters.', 'prefix' => '{boosters}', 'where' => ['boosters' => 'boosters|sets|accessory']], function ($boosters) {
	Route::match(['get','post'],'/',['uses'=>'BusterController@index','as'=>'index']);
	Route::get('/page/{pnum}', 'BusterController@index');
	Route::get('/show/{id}', 'BusterController@show');
	Route::match(['get','post'],'/filter',['uses'=>'BusterController@filter','as'=>'filter']);
});
Route::match(['get','post'],'/subscribe', ['uses'=>'SubscribeController@subscribe','as'=>'subscribe']);

Route::match(['get','post'],'/search', ['uses'=>'MagicCardsController@search','as'=>'search']);
Route::match(['get','post'],'/search/page/{pnum}', 'MagicCardsController@search');

Route::group(['prefix' => 'basket'], function () {
    Route::match(['get','post'],'/',['uses'=>'BasketController@index','as'=>'basket.index']);
	Route::match(['get','post'],'/add',['uses'=>'BasketController@add','as'=>'basket.add']);
	Route::match(['get','post'],'/del',['uses'=>'BasketController@del','as'=>'basket.del']);
	Route::match(['get','post'],'/del/{id}',['uses'=>'BasketController@del','as'=>'basket.del']);
	Route::match(['get','post'],'/send',['uses'=>'BasketController@send','as'=>'basket.send']);
});

Route::match(['get','post'],'/subscribe/send', ['uses'=>'SubscribeListController@send','as'=>'subscribe.send']);
Route::match(['get','post'],'/subscribe/sendAll', ['uses'=>'SubscribeListController@send_all','as'=>'subscribe.send_all']);

Route::get('activate/{id}/{token}', 'SubscribeController@activation')->name('activation');
Route::get('inactivate/{email}', 'SubscribeController@inactivation')->name('inactivation');

Route::post('/exel', 'ExelController@index');
Route::post('/exel/read', 'ExelController@reader');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('{slug}', [
	'uses' => 'PagesController@getPage'
])->where('slug', '([A-Za-z0-9\-\/]+)');