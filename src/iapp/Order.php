<?php


/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 1/24/21, 10:11 AM
 * Copyright (c) 2021. Powered by iamir.net
 */

namespace iLaravel\iOrder\iApp;

class Order extends \iLaravel\Core\iApp\Model
{
    use \iLaravel\Core\iApp\Methods\Metable;
    public static $s_prefix = 'ILO';
    public static $s_start = 1155;
    public static $s_end = 1733270554752;

    public $metaTable = 'order_meta';

    protected $hidden = ['metas'];

    protected $casts = [
        'payed_at' => 'timestamp'
    ];

    public function getPayedAtAttribute($value)
    {
        return format_datetime($value, isset($this->datetime) ? $this->datetime : [], 'payed_at');
    }

    protected static function boot()
    {
        parent::boot();
        parent::saving(function (self $event) {
            if (isset($event->_ip)) {
                if ($ipmodel = imodal('LocationIp')){
                    if (!($event->ip = $ipmodel::findByIP($event->_ip))){
                        $event->ip = $ipmodel::create(['ip' => $event->_ip]);
                    }
                    $event->ip = $event->ip->id;
                }
                $event->ip = $event->_ip;
            }
            unset($event->_ip);
        });
        static::deleting(function (self $event) {
            $event->payments()->delete();
        });
    }

    public function creator()
    {
        return $this->belongsTo(imodal('User'), 'creator_id', 'id');
    }

    public function payments() {
        return $this->belongsToMany(imodal('PaymentLog'), 'order_payment_log');
    }
}
