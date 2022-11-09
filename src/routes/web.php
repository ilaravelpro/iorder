<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 1/24/21, 9:08 AM
 * Copyright (c) 2021. Powered by iamir.net
 */
if (iorder('routes.web.payments.callback.status'))
    Route::any('callbacks/payment/{order}/{payment}/{payment_log}', 'PaymentController@callback')->name('callbacks.payment');

Route::namespace('Providers\Payment')->prefix('providers/payment')->group(function () {
    if (iorder('routes.web.providers.payment.test.status')) {
        Route::get('test/{payment_log}', 'TestProviderController@show')->name('payment.providers.test.show');
        Route::post('test/{payment_log}', 'TestProviderController@back')->name('payment.providers.test.back');
    }

});
