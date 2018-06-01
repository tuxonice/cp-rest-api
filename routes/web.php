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

$app->get('/', 'IndexController@Index');

$app->group(['prefix' => 'api/v1', 'namespace' => 'ApiV1', 'middleware' => 'throttle:45,1'], function () use ($app) {
    $app->get('/{cp4}/{cp3}', 'IndexController@Index');
    $app->get('/random', 'IndexController@Random');
});
