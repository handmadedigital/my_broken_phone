<?php

$router->group(['middleware' => 'auth'], function($router)
{
    /*******************************/
    /*
     * PAYMENTS
     */
    /*******************************/
    $router->get('/buy-phone/get-paid', ['as' => 'buy.payment', 'uses' => 'Orders\Http\Controllers\PaymentController@getPaymentOptions']);
    $router->post('/buy-phone/get-paid', ['as' => 'buy.payment', 'uses' => 'Orders\Http\Controllers\PaymentController@postPaymentOptions']);
    /*
    * Paypal method
    */
    $router->get('/buy-phone/get-paid/paypal', ['as' => 'buy.paypal.payment', 'uses' => 'Orders\Http\Controllers\PaymentController@getPaypalPayment']);
    $router->post('/buy-phone/get-paid/paypal', ['as' => 'buy.paypal.payment', 'uses' => 'Orders\Http\Controllers\PaymentController@postPaypalPayment']);
    /*
     * Confirmation
     */
    $router->get('/buy-phone/confirmation', ['as' => 'buy.confirmation', 'uses' => 'Orders\Http\Controllers\PaymentController@getOrderConfirmation']);
    /*
     * Thank You
     */
    $router->get('/buy-phone/thank-you', ['as' => 'buy.thank.you', 'uses' => 'Orders\Http\Controllers\PaymentController@getThankYou']);



    /************************/
    /*
     * SUBMIT ORDERS
     */
    /************************/
    $router->post('/order/add-order', ['as' => 'add.order', 'uses' => 'Orders\Http\Controllers\OrderController@postAddOrder']);
    $router->post('/order/decline', ['as' => 'decline.order', 'uses' => 'Orders\Http\Controllers\OrderController@postDeclineOrder']);
    $router->post('/order/accept', ['as' => 'accept.order', 'uses' => 'Orders\Http\Controllers\OrderController@postAcceptOrder']);



    /******************************/
    /*
     * ADMIN ORDERS
     */
    /******************************/
    $router->group(['middleware' => 'is_admin'], function($router)
    {
        $router->post('/admin/order/set-price', ['as' => 'set.order.price', 'uses' => 'Orders\Http\Controllers\AdminOrderController@postSetPrice']);
        $router->get('/admin/orders', ['as' => 'admin.orders', 'uses' => 'Orders\Http\Controllers\AdminOrderController@getOrders']);
        $router->get('/admin/order/{order_number}', ['as' => 'admin.order', 'uses' => 'Orders\Http\Controllers\AdminOrderController@getOrder']);
    });


    /**********************/
    /*
     * USER ORDERS
     */
    /**********************/
    $router->group(['middleware' => 'is_owner'], function($router)
    {
        $router->get('/{user_slug}/orders', ['as' => 'user.orders', 'uses' => 'Orders\Http\Controllers\UserOrderController@getOrders']);
        $router->get('/{user_slug}/order/{order_number}', ['as' => 'user.order', 'uses' => 'Orders\Http\Controllers\UserOrderController@getOrder']);
    });


});