<?php
/**
 * @param $data
 * @param $priKey
 * @param int $sign_type
 * @return string
 */
function rsa_sign($data, $priKey, $sign_type=OPENSSL_ALGO_SHA1): string
{
    $res = openssl_get_privatekey($priKey);
    openssl_sign($data, $sign, $res, $sign_type);
    return base64_encode($sign);
}

/********************************************************************************/

/**
 * @param $data
 * @param $sign
 * @param $pubKey
 * @param int $sign_type
 * @return bool
 */
function rsa_verify($data, $sign, $pubKey, $sign_type=OPENSSL_ALGO_SHA1): bool
{
    $res = openssl_get_publickey($pubKey);
    return (bool) openssl_verify($data, base64_decode($sign), $res, $sign_type);
}
