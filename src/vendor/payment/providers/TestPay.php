<?php

namespace iLaravel\iOrder\Vendor\Payment\Providers;

class TestPay
{
    public function send($order, $log, $amount, $callback, $description, $currency, $mobile = null, $email = null) {
        $input = [
            'amount' => $amount,
            'callback' => $callback,
            'description' => $description,
            'currency' => $currency,
            'mobile' => $mobile,
            'email' => $email,
        ];
        $output = [
            'token' => md5($order->serial.$log->serial.$amount.$currency),
        ];
        return [
            'status' => true,
            'endpoint' => route('payment.providers.test.show', ['payment_log' => $log->serial]),
            'token' => $output['token'],
            'message' => _t("Token created successfully."),
            'code' => 0,
            'input' => $input,
            'output' => $output,
        ];
    }

    public function verify($order, $log) {
        $request = request()->all();
        $status = _get_value($request, 'status', 2) == 1;
        return [
            'status' => $status,
            'state' => $status ? 'successful' : 'unsuccessful',
            'transaction' => request('transaction_id'),
            'message' => $status ? 'Payment was successful.' : 'Payment was unsuccessful.',
            'code' => $status ? 0 : -1,
            'input' => $request,
            'output' => [],
        ];
    }
}
