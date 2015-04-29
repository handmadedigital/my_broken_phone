<?php

$router->get('/', ['as' => 'home', 'uses' => 'Pages\Http\Controllers\PageController@getHome']);