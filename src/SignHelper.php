<?php

namespace Persec\LianLian;

class SignHelper
{
    public static function signMapWithPrefix($prefix, $params, $privateKey): string
    {
        ksort($params);
        $preSign = $prefix . createLinkstring($params);
        $preSign = stripslashes($preSign);
        return rsa_sign($preSign, $privateKey);
    }

    public static function signMap($params, $privateKey): string
    {
        ksort($params);
        $preSign = createLinkstring($params);
        $preSign = stripslashes($preSign);
        return rsa_sign($preSign, $privateKey);
    }

    public static function signString($param, $privateKey): string
    {
        $param = stripslashes($param);
        return rsa_sign($param, $privateKey);
    }

}
