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

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/tarefas', 'TarefasController@index');
    $router->get('/tarefas/{id}', 'TarefasController@show');
    $router->post('/tarefas', 'TarefasController@store');
    $router->put('/tarefas/{id}', 'TarefasController@update');
    $router->delete('/tarefas/{id}', 'TarefasController@destroy');
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('/subtarefas', 'SubtarefasController@index');
    $router->get('/subtarefas/{id}', 'SubtarefasController@show');
    $router->post('/subtarefas', 'SubtarefasController@store');
    $router->put('/subtarefas/{id}', 'SubtarefasController@update');
    $router->delete('/subtarefas/{id}', 'SubtarefasController@destroy');
});

