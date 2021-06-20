<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 1/24/21, 10:11 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iOrder\iApp;

use iLaravel\Core\iApp\Http\Requests\iLaravel as Request;

class Payment extends \iLaravel\Core\iApp\Model
{
    use \iLaravel\Core\iApp\Methods\Metable;
    public static $s_prefix = 'ILOP';
    public static $s_start = 810000;
    public static $s_end = 24299999;

    public $metaTable = 'payment_meta';

    protected $hidden = ['metas'];

    public function creator()
    {
        return $this->belongsTo(imodal('User'), 'creator_id', 'id');
    }

    public function logs() {
        return $this->hasMany(imodal('PaymentLog'));
    }

    public function rules(Request $request, $action, $parent = null, $unique = null)
    {
        $rules = [];
        switch ($action) {
            case 'store':
            case 'update':
                $rules = [
                    'name' => 'required|string',
                    'code' => 'required|string',
                    'provider' => 'required|string',
                    'wage' => 'nullable|numeric',
                    'description' => 'nullable|string',
                    'property' => 'nullable|numeric',
                ];
                break;
        }
        return $rules;
    }
}
