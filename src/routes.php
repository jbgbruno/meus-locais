<?php

use core\Router;

$router = new Router();

$router->get('/', 'LocalController@index');
$router->get('/cadastrar', 'LocalController@create');
$router->post('/cadastrar', 'LocalController@store');
$router->get('/editar/{id}', 'LocalController@edit');
$router->post('/editar/{id}', 'LocalController@update');
$router->get('/deletar/{id}', 'LocalController@delete');

// AJAX
$router->get('/cep/{cep}', 'LocalController@buscarCep');
