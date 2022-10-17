<?php
namespace Persec\LianLian;

use Persec\LianLian\Entities\CheckoutPageRequest;
use Persec\LianLian\Entities\CheckoutPageResponse;
use Persec\LianLian\Entities\Response;
use Persec\LianLian\Exceptions\RuntimeException;

require_once 'helper/rsa.php';
require_once 'helper/utils.php';

class CheckoutPage extends BaseSDK
{
    /**
     * @param CheckoutPageRequest $params
     * @return Response
     * @throws Exceptions\RequestException
     * @throws Exceptions\RuntimeException
     */
    public function request(CheckoutPageRequest $params): Response
    {
        $params->merchant_id = $this->merchantId;
        $endpoint = $this->getEndpoint();
        $paramsArray = $this->convertObjectToArray($params);
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Accept: application/json';
        $headers[] = 'sign:'.$this->generateBodySignature($paramsArray);
        $json = json_encode($paramsArray, JSON_UNESCAPED_SLASHES);
        $response = $this->request->post($endpoint, $json, $headers);
        $responseArray = json_decode($response, true);
        $responseCode = intval($responseArray['code'] ?? '-1');
        if ($responseCode !== 200000) {
            $msg = $responseArray['message'] ?? 'failed to connect provider';
            throw new RuntimeException($msg, $responseCode);
        }
        return new Response($responseArray);
    }
}
