<?php

namespace Persec\LianLian;

class BaseSDK
{
    private $isSandbox;
    protected $request;
    protected $merchantId;
    private $privateKey;

    public function __construct($merchantId, string $privateKey, bool $isSandbox = false, bool $isDebugRequest = false)
    {
        $this->isSandbox = $isSandbox;
        $this->request = new Request($isDebugRequest);
        $this->merchantId = $merchantId;
        $this->privateKey = $privateKey;
    }

    public function getProductionEndpoint(): string
    {
        return 'https://api.lianlianpay.co.th/gateway';
    }

    public function getSandboxEndpoint(): string
    {
        return 'https://sandbox-th.lianlianpay-inc.com/gateway';
    }

    public function getEndpoint() : string
    {
        if ($this->isSandboxMode()) {
           return $this->getSandboxEndpoint();
        }
        return $this->getProductionEndpoint();
    }

    public function isSandboxMode(): bool
    {
        return $this->isSandbox;
    }

    protected function generateBodySignature (array $params): ?string
    {
        return SignHelper::signMap($params, $this->privateKey);
    }

    protected function generateQuerySignature (array $params): ?string
    {
        return SignHelper::signMap($params, $this->privateKey);
    }

    protected function convertObjectToArray($object): array {
        return json_decode(json_encode($object), true);
    }
}
