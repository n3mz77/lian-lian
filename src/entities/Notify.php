<?php

namespace Persec\LianLian\Entities;

class Notify
{
    public $complete_time;
    public $merchant_id;
    public $merchant_order_id;
    public $order_amount;
    public $order_currency;
    public $order_id;
    public $order_status;

    public function __construct(array $properties)
    {
        foreach ($properties as $k => $v) {
            if (property_exists($this, $k)) {
                $this->{$k} = $v;
            }
        }
    }
}
