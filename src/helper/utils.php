<?php
function createLinkString(array $para): string
{
    $arg = linkString($para);

    $arg = substr($arg, 0, strlen($arg) - 1);
    if (get_magic_quotes_gpc()) {
        $arg = stripslashes($arg);
    }
    return $arg;
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

