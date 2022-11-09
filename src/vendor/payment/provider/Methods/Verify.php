<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/12/20, 9:35 PM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iOrder\Vendor\Payment\Provider\Methods;

use Carbon\Carbon;

trait Verify
{
    public function verify($log)
    {
        $this->log = $log;
        $result = $this->provider->verify($this->order, $this->log, $this->order->pay, $this->order->currency);
        $this->log->_ip = _get_user_ip();
        $this->log->input = ['send' => $this->log->input, 'verify' => $result['input']];
        $this->log->output = ['send' => $this->log->output, 'verify' => $result['output']];
        $this->log->message = $result['message'];
        $this->log->code = $result['code'];
        if ($result['status']){
            $this->log->status = 'payed';
            $this->log->transaction = $result['transaction'];
            $payed_at = Carbon::now()->format('Y-m-d H:i:s');
            $this->log->payed_at = $payed_at;
            $this->order->update(['payed_at' => $payed_at, 'status' => 'completed']);
        }else {
            $this->log->status = $result['state'];
            $this->order->update(['status' => 'canceled']);
        }
        $this->log->save();
        $out = ['status' => $result['status'], 'message' => $result['message'], 'code' => $result['code']];
        return $out;
    }
}
