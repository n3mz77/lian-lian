<?php

namespace Persec\LianLian\Entities;

class CheckoutPageResponse
{
    public $merchant_id;
    public $merchant_order_id;
    public $order_id;
    public $order_status;
    public $order_amount;
    public $order_currency;
    public $create_time;
    public $link_url;
    public function __construct(array $properties)
    {
        foreach ($properties as $k => $v) {
            if (property_exists($this, $k)) {
                $this->{$k} = $v;
            }
        }
    }
}
