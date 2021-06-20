<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 2/4/21, 11:35 PM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iOrder\iApp\Http\Controllers\API\v1\Payment;


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
                'name' => 'name',
                'title' => _t('name'),
                'type' => 'text'
            ],
            [
                'name' => 'code',
                'title' => _t('code'),
                'type' => 'text'
            ],
            [
                'name' => 'provider',
                'title' => _t('provider'),
                'type' => 'text'
            ],
            [
                'name' => 'wage',
                'title' => _t('wage'),
                'type' => 'text'
            ],
            [
                'name' => 'description',
                'title' => _t('description'),
                'type' => 'text'
            ],
            [
                'name' => 'property',
                'title' => _t('property'),
                'type' => 'text'
            ],
        ];
        return [$filters, $current, $operators];
    }
}
