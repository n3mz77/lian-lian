<?php

namespace Persec\LianLian\Entities;

class CheckoutPageRequestAlipay extends CheckoutPageRequest
{
    public $order_info;

    public function __construct(Customer $customer, $orderId, $amount, $currency, $desc, $notifyUrl, $redirectUrl, $paymentMethod ,$service )
    {
        parent::__construct($customer, $orderId, $amount, $currency, $desc, $notifyUrl, $redirectUrl, $paymentMethod ,$service);
        $this->order_info = $desc;
    }
}
