<?php
namespace Persec\LianLian;

use Persec\LianLian\Entities\CheckoutPageRequest;
use Persec\LianLian\Entities\CheckoutPageResponse;

class CheckoutPage extends BaseSDK
{
    /**
     * @param CheckoutPageRequest $params
     * @return CheckoutPageResponse
     * @throws Exceptions\RequestException
     * @throws Exceptions\RuntimeException
     */
    public function request(CheckoutPageRequest $params): CheckoutPageResponse
    {
        $params->merchant_id = $this->merchantId;
        $endpoint = $this->getEndpoint();
        $paramsArray = (array) $params;
        $headers['sign'] = $this->generateBodySignature($paramsArray);
        $response = $this->request->post($endpoint, $paramsArray, $headers);
        $responseArray = json_decode($response, true);
        return new CheckoutPageResponse($responseArray);
    }
}
