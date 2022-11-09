<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/4/21, 11:36 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iOrder\iApp\Http\Controllers\WEB;

use iLaravel\Core\iApp\Http\Controllers\WEB\Controller;


class PaymentController extends Controller
{
    public $endpoint = \iLaravel\iOrder\iApp\Http\Controllers\API\v1\PaymentController::class;
    use Payment\Callback;
}
