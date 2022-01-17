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
    public $payment_method;
    /**
     * @var Customer $customer
     */
    public $customer;
    public $notify_url;
    public $redirect_url;

    public function __construct(Customer $customer, $orderId, $amount, $currency, $desc, $notifyUrl, $redirectUrl, $paymentMethod)
    {
        $this->customer = $customer;
        $this->merchant_order_id = $orderId;
        $this->order_amount = round($amount, 2);
        $this->order_currency = $currency;
        $this->order_desc = $desc;
        $this->notify_url = $notifyUrl;
        $this->redirect_url = $redirectUrl;
        $this->service = 'llpth.checkout.apply';
        $this->version = 'v1';
        $this->payment_method = $paymentMethod;
    }
}
