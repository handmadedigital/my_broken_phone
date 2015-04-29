<?php

/*
 * BUY PHONE
 */

$router->get('/buy-phone/carriers', ['as' => 'buy.phone.carriers', 'uses' => 'Devices\Phones\Http\Controllers\BuyController@getCarriers']);
$router->post('/buy-phone/carriers', ['as' => 'buy.phone.carriers', 'uses' => 'Devices\Phones\Http\Controllers\BuyController@postCarrier']);
$router->get('/buy-phone/{carrier_slug}/brands', ['as' => 'buy.phone.brands', 'uses' => 'Devices\Phones\Http\Controllers\BuyController@getBrands']);
$router->post('/buy-phone/{carrier_slug}/brands', ['as' => 'buy.phone.brands', 'uses' => 'Devices\Phones\Http\Controllers\BuyController@postBrand']);
$router->get('/buy-phone/{carrier_slug}/{brand_slug}/models', ['as' => 'buy.phones.models', 'uses' => 'Devices\Phones\Http\Controllers\BuyController@getModels']);
$router->post('/buy-phone/{carrier_slug}/{brand_slug}/models', ['as' => 'buy.phones.models', 'uses' => 'Devices\Phones\Http\Controllers\BuyController@postModel']);
$router->get('buy-phone/{carrier_slug}/{brand_slug}/{model_slug}/capacity', ['as' => 'buy.phones.capacities', 'uses' => 'Devices\Phones\Http\Controllers\BuyController@getCapacities']);
$router->post('buy-phone/{carrier_slug}/{brand_slug}/{model_slug}/capacity', ['as' => 'buy.phones.capacities', 'uses' => 'Devices\Phones\Http\Controllers\BuyController@postCapacity']);
$router->get('buy-phone/{carrier_slug}/{brand_slug}/{model_slug}/{capacity_slug}/conditions', ['as' => 'buy.phones.conditions', 'uses' => 'Devices\Phones\Http\Controllers\BuyController@getConditions']);
$router->post('buy-phone/{carrier_slug}/{brand_slug}/{model_slug}/{capacity_slug}/conditions', ['as' => 'buy.phones.conditions', 'uses' => 'Devices\Phones\Http\Controllers\BuyController@postCondition']);
$router->get('buy-phone/{carrier_slug}/{brand_slug}/{model_slug}/{capacity_slug}/{conditions_slug}/price', ['as' => 'buy.phones.price', 'uses' => 'Devices\Phones\Http\Controllers\BuyController@getPrice']);
$router->get('buy-phone/problems', ['as' => 'buy.phones.problems', 'uses' => 'Devices\Phones\Http\Controllers\BuyController@getPhoneProblems']);
$router->post('buy-phone/problems', ['as' => 'buy.phones.problems', 'uses' => 'Devices\Phones\Http\Controllers\BuyController@postPhoneProblems']);
$router->get('buy-phone/problems/price', ['as' => 'buy.phones.price.wt.fix', 'uses' => 'Devices\Phones\Http\Controllers\BuyController@getPhoneWithFixPrice']);

/*
 * FIX PHONE
 */
$router->get('/fix-phone/brands', ['as' => 'fix.phone.brands', 'uses' => 'Devices\Phones\Http\Controllers\FixController@getBrands']);
$router->post('/fix-phone/brands', ['as' => 'fix.phone.brands', 'uses' => 'Devices\Phones\Http\Controllers\FixController@postBrand']);
$router->get('/fix-phone/{brand_slug}/models', ['as' => 'fix.phone.models', 'uses' => 'Devices\Phones\Http\Controllers\FixController@getModels']);
$router->post('/fix-phone/{brand_slug}/models', ['as' => 'fix.phone.models', 'uses' => 'Devices\Phones\Http\Controllers\FixController@postModel']);
$router->get('/fix-phone/{brand_slug}/{model_slug}/problems', ['as' => 'fix.phone.problems', 'uses' => 'Devices\Phones\Http\Controllers\FixController@getProblems']);
$router->post('/fix-phone/{brand_slug}/{model_slug}/problems', ['as' => 'fix.phone.problems', 'uses' => 'Devices\Phones\Http\Controllers\FixController@postProblem']);
$router->get('/fix-phone/{brand_slug}/{model_slug}/problem/price', ['as' => 'fix.phone.price', 'uses' => 'Devices\Phones\Http\Controllers\FixController@getPrice']);
$router->get('/fix-phone/carriers', ['as' => 'fix.phone.carriers', 'uses' => 'Devices\Phones\Http\Controllers\FixController@getCarriers']);
$router->post('/fix-phone/carriers', ['as' => 'fix.phone.carriers', 'uses' => 'Devices\Phones\Http\Controllers\FixController@postCarrier']);
$router->get('/fix-phone/{carriers_slug}/capacities', ['as' => 'fix.phone.capacities', 'uses' => 'Devices\Phones\Http\Controllers\FixController@getCapacities']);
$router->post('/fix-phone/{carriers_slug}/capacities', ['as' => 'fix.phone.capacities', 'uses' => 'Devices\Phones\Http\Controllers\FixController@postCapacity']);
$router->get('/fix-phone/{carriers_slug}/{capacities_slug}/condition', ['as' => 'fix.phone.conditions', 'uses' => 'Devices\Phones\Http\Controllers\FixController@getConditions']);
$router->post('/fix-phone/{carriers_slug}/{capacities_slug}/condition', ['as' => 'fix.phone.conditions', 'uses' => 'Devices\Phones\Http\Controllers\FixController@postCondition']);
$router->get('/fix-phone/{carriers_slug}/{capacities_slug}/{condition_slug}/price', ['as' => 'fix.phone.price.wt.buy.price', 'uses' => 'Devices\Phones\Http\Controllers\FixController@getPriceWithBuyPrice']);
