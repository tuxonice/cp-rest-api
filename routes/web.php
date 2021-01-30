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

$router->get('/', 'IndexController@Index');

$router->group(['prefix' => 'api/v1', 'namespace' => 'ApiV1', 'middleware' => 'throttle:45,1'], function () use ($router) {
    $router->get('/{cp4}/{cp3}', 'IndexController@Index');
    $router->get('/random', 'IndexController@Random');
});
