<?php



/**
 * Author: Amir Hossein Jahani | iAmir.net
 * Last modified: 9/13/20, 7:23 AM
 * Copyright (c) 2020. Powered by iamir.net
 */

namespace iLaravel\iOrder\Vendor\Payment\Provider\Methods;

trait Send
{
    public function send()
    {
        $amount = $this->order->cost;
        $amount +=  $this->order->tax;
        $amount +=  $this->order->shipping;
        $amount -=  $this->order->wallet;
        $amount -=  $this->order->discount;
        if ($this->order->wage) $amount += round(($amount * $this->order->wage) / 100);
        $mobile = $this->order->creator->mobile;
        $email = $this->order->creator->email;
        $this->log = $this->model::create([
            'payment_id' => $this->payment->id,
        ]);
        $this->log->orders()->sync([$this->order->id]);
        $result = $this->provider->send($this->order, $this->log, $amount, route('callbacks.payment', [
            'order' => $this->order->serial,
            'payment' => $this->payment->serial,
            'payment_log' => $this->log->serial,
        ]), $this->order->description, $this->order->currency, $mobile ? $mobile->text : null, $email ? $email->text : null);
        $this->log->_ip = _get_user_ip();
        $this->log->input = $result['input'];
        $this->log->output = $result['output'];
        $this->log->message = $result['message'];
        $this->log->code = $result['code'];
        if ($result['status']){
            $this->log->status = 'waiting';
            $this->log->token = $result['token'];
        }else {
            $this->log->status = 'bank_error';
        }
        $this->order->update(['pay' => $amount]);
        $this->log->save();
        $out = ['status' => $result['status'], 'message' => $result['message'], 'code' => $result['code']];
        if ($result['status']){
            $out['endpoint'] = $result['endpoint'];
            $out['token'] = $result['token'];
        }
        return $out;
    }
}
