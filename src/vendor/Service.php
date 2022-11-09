<?php

namespace iLaravel\iOrder\Vendor;

use iLaravel\Core\iApp\Exceptions\iException;

class Service
{

    public $orderModel = 'Order';
    public $order;

    public function __construct()
    {
        $this->orderModel = imodal($this->orderModel);
    }

    public function parse($payment, $shipping, $title, $description, $type, $currency, $cost, $discount = 0, $tax = 0, $wallet = 0) {
        if ($payment->status == 'active') {
            $this->order = $this->orderModel::create([
                'title' => $title,
                'description' => $description,
                'type' => $type,
                'tax' => $tax,
                'wallet' => $wallet,
                'discount' => $discount,
                'cost' => $cost,
                'wage' => $payment->wage,
                'currency' => $currency,
            ]);
            $this->order->_ip = _get_user_ip();
            $this->order->save();
            return $payment->provider($this->order)->send();
        }else {
            throw new iException('Payment method not active.');
        }
    }
}
