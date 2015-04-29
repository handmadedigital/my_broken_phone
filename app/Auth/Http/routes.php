<?php

$router->get('/auth/sign-up', ['as' => 'auth.login', 'uses' => 'Auth\Http\Controllers\AuthController@getSignUp']);
$router->post('/auth/login', ['as' => 'auth.login', 'uses' => 'Auth\Http\Controllers\AuthController@postLogin']);
$router->post('/auth/register', ['as' => 'auth.register', 'uses' => 'Auth\Http\Controllers\AuthController@postRegister']);
$router->get('/auth/logout', ['as' => 'auth.logout', 'uses' => 'Auth\Http\Controllers\AuthController@getLogout']);