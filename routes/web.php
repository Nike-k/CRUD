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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix'=> 'api/book'],function() use ($router){
    $router->get('',['uses'=> 'BookController@showAllBooks']);
    $router->get('{id}', ['uses' => 'BookController@showOneBook']);
    $router->post('', ['uses'=> 'BookController@create']);
    $router->post('{id}', ['uses'=> 'BookController@create']);
    $router->post('{id}', ['uses'=> 'BookController@update']);
    $router->delete('{id}', ['uses'=> 'BookController@delete']);

});