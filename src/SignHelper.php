<?php

namespace Persec\LianLian;

class SignHelper
{
    public static function signMap($params, $privateKey): string
    {
        ksort($params);
        $preSign = createLinkstring($params);
        $preSign = stripslashes($preSign);
        return rsa_sign($preSign, $privateKey);
    }

}
