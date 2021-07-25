<?php

namespace Persec\LianLian\Entities;

class CheckoutPageRequest
{
    public $version;
    public $service;
    public $merchant_id;
    public $merchant_order_id;
    public $order_amount;
    public $order_currency;
    public $order_desc;
    /**
     * @var Customer $customer
     */
    public $customer;
    public $notify_url;
    public $redirect_url;

    public function __construct(Customer $customer, $orderId, $amount, $currency, $desc, $notifyUrl, $redirectUrl)
    {
        $this->customer = $customer;
        $this->merchant_order_id = $orderId;
        $this->order_amount = $amount;
        $this->order_currency = $currency;
        $this->order_desc = $desc;
        $this->notify_url = $notifyUrl;
        $this->redirect_url = $redirectUrl;
    }
}
