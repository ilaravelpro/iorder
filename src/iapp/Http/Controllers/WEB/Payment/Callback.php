<?php


namespace iLaravel\iOrder\iApp\Http\Controllers\WEB\Payment;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait Callback
{
    public function callback(Request $request, $order, $payment, $payment_log, $redirect = true) {
        $orderModel = imodal('Order');
        $order = $orderModel::findBySerial($order);
        $paymentModel = imodal('Payment');
        $payment = $paymentModel::findBySerial($payment);
        $paymentLogModel = imodal('PaymentLog');
        $payment_log = $paymentLogModel::findBySerial($payment_log);
        if (!$payment_log || $payment_log->payed_at)
            abort("403", "This payment has already been registered.");
        $result = $payment->provider($order)->verify($payment_log);
        if ($redirect)
            return redirect(route("callbacks.payment.{$order->type}"));
        return [$order, $payment, $payment_log, $result];
    }
}
