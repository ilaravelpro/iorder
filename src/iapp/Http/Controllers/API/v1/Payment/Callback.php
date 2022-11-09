<?php


namespace iLaravel\iOrder\iApp\Http\Controllers\API\v1\Payment;

use iLaravel\Core\iApp\Exceptions\iException;
use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait Callback
{
    public function callback(Request $request, $order, $payment, $payment_log) {
        $orderModel = imodal('Order');
        $order = $orderModel::findBySerial($order);
        $paymentModel = imodal('Payment');
        $payment = $paymentModel::findBySerial($payment);
        $paymentLogModel = imodal('PaymentLog');
        $payment_log = $paymentLogModel::findBySerial($payment_log);
        if ($payment_log->payed_at) {
            throw new iException("This payment has already been registered.");
        }
        return [
            'data' => $payment->provider($order)->verify($payment_log)
        ];
    }
}
