<?php

namespace Persec\LianLian;

class BaseSDK
{
    private $isSandbox;
    protected $request;
    protected $merchantId;

    public function __construct($merchantId, bool $isSandbox = false, bool $isDebugRequest = false)
    {
        $this->isSandbox = $isSandbox;
        $this->request = new Request($isDebugRequest);
        $this->merchantId = $merchantId;
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
        //todo waiting for signature specification
        return null;
    }

    protected function generateQuerySignature (array $params): ?string
    {
        //todo waiting for signature specification
        return null;
    }
}
