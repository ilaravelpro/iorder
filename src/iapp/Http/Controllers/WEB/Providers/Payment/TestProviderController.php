<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/4/21, 11:36 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iOrder\iApp\Http\Controllers\WEB\Providers\Payment;

use iLaravel\Core\iApp\Http\Controllers\WEB\Controller;
use Illuminate\Http\Request;


class TestProviderController extends Controller
{
    public $endpoint = null;

    public function show(Request $request, $payment_log) {
        $model = imodal('PaymentLog');
        $payment_log = $model::findBySerial($payment_log);
        if ($payment_log->payed_at) {
            abort("403", "This payment has already been registered.");
        }
        return view('plugins.iorder.payments.test', ['log' => $payment_log]);
    }

    public function back(Request $request, $payment_log) {
        $model = imodal('PaymentLog');
        $payment_log = $model::findBySerial($payment_log);
        if ($payment_log->payed_at) {
            abort("403", "This payment has already been registered.");
        }
        return redirect_post($payment_log->input['callback'], $request->all());
    }
}
