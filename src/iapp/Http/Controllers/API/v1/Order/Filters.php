<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/4/21, 11:35 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iOrder\iApp\Http\Controllers\API\v1\Order;


trait Filters
{
    public function filters($request, $model, $parent = null, $operators = [])
    {
        $current = [];
        $filters = [
            [
                'name' => 'all',
                'title' => _t('all'),
                'type' => 'text',
            ],
            [
                'name' => 'number',
                'title' => _t('number'),
                'type' => 'text'
            ],
            [
                'name' => 'tax',
                'title' => _t('tax'),
                'type' => 'text'
            ],
            [
                'name' => 'shipping',
                'title' => _t('shipping'),
                'type' => 'text'
            ],
            [
                'name' => 'wallet',
                'title' => _t('wallet'),
                'type' => 'text'
            ],
            [
                'name' => 'discount',
                'title' => _t('discount'),
                'type' => 'text'
            ],
            [
                'name' => 'cost',
                'title' => _t('cost'),
                'type' => 'text'
            ],
            [
                'name' => 'currency',
                'title' => _t('currency'),
                'type' => 'text'
            ],
            [
                'name' => 'ip',
                'title' => _t('ip'),
                'type' => 'text'
            ],
            [
                'name' => 'payed_at',
                'title' => _t('payed_at'),
                'type' => 'text'
            ],
        ];
        return [$filters, $current, $operators];
    }
}
