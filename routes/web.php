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

$router->group(['prefix' => 'api'], function () use ($router) {

    $router->get('/', function () use ($router) {
        return $router->app->version();
    });


    // User
    $router->post('user', ['as' => 'users.store', 'uses' => 'UserController@store']);
    $router->post('login', ['as' => 'login', 'uses' => 'UserController@login']);


    // Supplys
    $router->get('supplys', ['as' => 'supplys', 'uses' => 'SupplyController@index']);
    $router->get('supplys/{id}', ['as' => 'supplys.show', 'uses' => 'SupplyController@show']);
    $router->post('supplys', ['as' => 'supplys.store', 'uses' => 'SupplyController@store']);

    // Oxigens
    $router->get('oxigens', ['as' => 'oxigens', 'uses' => 'OxigenController@index']);
    $router->get('oxigens/{id}', ['as' => 'oxigens.show', 'uses' => 'OxigenController@show']);
    $router->post('oxigens', ['as' => 'oxigens.store', 'uses' => 'OxigenController@store']);


    // Routes auth
    $router->group(['middleware' => 'auth'], function () use ($router) {
        $router->put('supplys/{id}', ['as' => 'supplys.update', 'uses' => 'SupplyController@update']);
        $router->delete('supplys/{id}', ['as' => 'supplys.delete', 'uses' => 'SupplyController@delete']);
        $router->put('oxigens/{id}', ['as' => 'oxigens.update', 'uses' => 'OxigenController@update']);
        $router->delete('oxigens/{id}', ['as' => 'oxigens.delete', 'uses' => 'OxigenController@delete']);

        $router->get('user', function () use ($router) {
            return auth()->user();
        });

        $router->post('logout', ['as' => 'logout', 'uses' => 'UserController@logout']);
    });
});
