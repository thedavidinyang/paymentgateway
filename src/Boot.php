<?php
declare(strict_types=1);
namespace thedavidinyang\paymentGateway;

class Boot
{

    protected $monnifyConfig;
    protected $paystackConfig;
    protected $flutterwaveConfig;
    protected $config;

    protected $provider;

    // initialize the service and set provider
    public function init(string $data)
    {

        try {
            return $this->setProvider($data);

        } catch (\Throwable $e) {

            throw new Exception($e->getMessage());
        }


    }

    /// set the payment service provider
    protected function setProvider($data)
    {
        
        try {
            $this->provider = $data;
            return $this;

        } catch (\Throwable $e) {

            throw new Exception($e->getMessage());
        }
    }

}
