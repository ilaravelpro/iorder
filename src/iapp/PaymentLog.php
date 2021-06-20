<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 1/24/21, 10:11 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iOrder\iApp;

class PaymentLog extends \iLaravel\Core\iApp\Model
{
    public static $s_prefix = 'ILOPL';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    public function creator()
    {
        return $this->belongsTo(imodal('User'), 'creator_id', 'id');
    }

    public function payment()
    {
        return $this->belongsTo(imodal('Payment'));
    }

    public function orders() {
        return $this->belongsToMany(imodal('Order'), 'orders_payment_logs');
    }
}
