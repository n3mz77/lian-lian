<?php
include_once './vendor/autoload.php';
use Dotenv\Dotenv;
use Persec\LianLian\CheckoutPage;
use Persec\LianLian\Entities\CheckoutPageRequest;
use Persec\LianLian\Entities\Customer;

$dotenv = Dotenv::createImmutable(__DIR__, '.env');
$dotenv->load();

$mid = $_ENV['MID'];
$isSandbox = $_ENV['SANDBOX'] === '1';
$isDebug = $_ENV['DEBUG'] === '1';
$privateKey = $_ENV['PRIVATE_KEY'];

$checkoutPage = new CheckoutPage($mid, $privateKey, $isSandbox, $isDebug);

$customer = new Customer(1, 'test');
$orderId = '123456';
$amount = 199;
$currency = 'THB';
$desc = 'Example product';
$notifyUrl = 'https://www.test.com/notify';
$redirectUrl = 'https://www.test.com/order/status';

$requestParams = new CheckoutPageRequest($customer, $orderId, $amount, $currency, $desc, $notifyUrl, $redirectUrl, 'CARD');

$json = json_decode(json_encode($requestParams), true);
try {
    echo "before request\n";
    $res = $checkoutPage->request($requestParams);
    echo "after request\n";
} catch (Exception $e) {
    echo $e->getMessage();
}
