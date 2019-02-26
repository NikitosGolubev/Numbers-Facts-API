<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', ['uses' => 'IndexController@index']);

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('random', ['uses' => 'FactsApiController@getRandomFactFromRandomCat']);
    // number reg exp filter: 
    // only positive or negative correct integer, NO: (-0, -, -01, 00, 0012, 12-1 and etc...)
    $router->get('random/{number: -?[1-9]+[0-9]*|0}', ['uses' => 'FactsApiController@getFactFromRandomCat']);

    $router->get('{category: [A-Za-z]+}', ['uses' => 'FactsApiController@getRandomFactFromConcreteCat']);
    $router->get('{category: [A-Za-z]+}/{number: -?[1-9]+[0-9]*|0}', ['uses' => 'FactsApiController@getFactFromConcreteCat']);
});

// Http responses
$router->group(['prefix' => 'error'], function () use ($router) {
    $router->get('404', ['uses' => 'ErrorsController@action404', 'as' => '404']);
});