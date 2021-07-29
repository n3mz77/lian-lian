<?php

namespace Persec\LianLian\Entities;

class OrderStatus
{
    const INIT = 'PI';
    const START_PAYMENT = 'WP';
    const SUCCESS = 'PS';
    const EXPIRE = 'PE';
    const CANCEL = 'PC';
}
