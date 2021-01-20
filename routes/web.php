<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

// Oxigens
$router->get('oxigens', ['as' => 'oxigens', 'uses' => 'OxigenController@index']);
$router->get('oxigens/{id}', ['as' => 'oxigens.show', 'uses' => 'OxigenController@show']);
$router->post('oxigens', ['as' => 'oxigens.store', 'uses' => 'OxigenController@store']);
$router->put('oxigens/{id}', ['as' => 'oxigens.update', 'uses' => 'OxigenController@update']);
$router->delete('oxigens/{id}', ['as' => 'oxigens.delete', 'uses' => 'OxigenController@delete']);
