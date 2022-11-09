<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 12:31 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iOrder\Vendor\Payment\Provider;


trait Construct
{
    public function __construct($payment, $order)
    {
        $this->model = imodal('PaymentLog');
        $this->orderModel = imodal('Order');
        $this->order = $order;
        $this->payment = $payment;
        $this->provider = new $payment->vendor($payment);
    }
}
