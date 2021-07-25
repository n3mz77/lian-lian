<?php

namespace Persec\LianLian\Entities;

class Customer
{
    public $merchant_user_id;
    public $full_name;

    public function __construct($userId, $fullName)
    {
        $this->merchant_user_id = $userId;
        $this->full_name = $fullName;
    }
}
