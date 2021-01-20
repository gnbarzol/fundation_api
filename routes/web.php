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

$router->get('/api', function () use ($router) {
    return $router->app->version();
});


// User
$router->post('api/user', ['as' => 'users.store', 'uses' => 'UserController@store']);
$router->post('api/login', ['as' => 'login', 'uses' => 'UserController@login']);


// Supplys
$router->get('api/supplys', ['as' => 'supplys', 'uses' => 'SupplyController@index']);
$router->get('api/supplys/{id}', ['as' => 'supplys.show', 'uses' => 'SupplyController@show']);
$router->post('api/supplys', ['as' => 'supplys.store', 'uses' => 'SupplyController@store']);

// Oxigens
$router->get('api/oxigens', ['as' => 'oxigens', 'uses' => 'OxigenController@index']);
$router->get('api/oxigens/{id}', ['as' => 'oxigens.show', 'uses' => 'OxigenController@show']);
$router->post('api/oxigens', ['as' => 'oxigens.store', 'uses' => 'OxigenController@store']);


// Routes auth
$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->put('api/supplys/{id}', ['as' => 'supplys.update', 'uses' => 'SupplyController@update']);
    $router->delete('api/supplys/{id}', ['as' => 'supplys.delete', 'uses' => 'SupplyController@delete']);
    $router->put('api/oxigens/{id}', ['as' => 'oxigens.update', 'uses' => 'OxigenController@update']);
    $router->delete('api/oxigens/{id}', ['as' => 'oxigens.delete', 'uses' => 'OxigenController@delete']);

    $router->get('api/user', function () use ($router) {
        return auth()->user();
    });

    $router->post('api/logout', ['as' => 'logout', 'uses' => 'UserController@logout']);
});
