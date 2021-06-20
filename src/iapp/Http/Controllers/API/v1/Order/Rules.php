<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/4/21, 11:35 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iOrder\iApp\Http\Controllers\API\v1\Order;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

trait Rules
{
    public function rules(Request $request, $action, $parent = null, $unique = null)
    {
        $rules = [];
        switch ($action) {
            case 'store':
            case 'update':
                $rules = [
                    'number' => 'nullable|string',
                    'currency' => 'nullable|string',
                ];
                break;
        }
        return $rules;
    }
}
