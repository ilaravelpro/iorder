<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 1/24/21, 9:08 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

Route::namespace('v1')->prefix('v1')->middleware('auth:api')->group(function () {
    if (iorder('routes.api.orders.status')) Route::apiResource('orders', 'OrderController', ['as' => 'api']);
    if (iorder('routes.api.payments.status')) Route::apiResource('payments', 'PaymentController', ['as' => 'api']);
});
