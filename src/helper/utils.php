<?php
function createLinkString(array $para): string
{
    $arg = linkString($para);
    return substr($arg, 0, strlen($arg) - 1);
}

function linkString(array $para): string
{
    $arg  = '';
    foreach ($para as $key => $val) {
        if (is_array($val)) {
            ksort($val);
            $arg .= linkString($val);
        } else {
            $arg .= $key . '=' . $val . '&';
        }
    }
    return $arg;
}

