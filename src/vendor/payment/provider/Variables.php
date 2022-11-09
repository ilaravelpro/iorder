<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 9:32 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iOrder\Vendor\Payment\Provider;


trait Variables
{
    public $model = null;
    public $orderModel = null;
    public $order = null;
    public $payment = null;
    public $provider = null;
    public $log = null;
    public $message = null;
    public $messages = null;
}
