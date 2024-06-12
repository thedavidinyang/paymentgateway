<?php
declare (strict_types = 1);

namespace thedavidinyang\payment;

use Exception;

use thedavidinyang\payment\flutterwave\Bootstrap as ftw;
use thedavidinyang\payment\monnify\Bootstrap as mfy;
use thedavidinyang\payment\paystack\Bootstrap as pst;

class Gateway
{
    protected array $monnifyConfig;
    protected array $paystackConfig;
    protected array $flutterwaveConfig;
    protected string $config;

    protected string $provider;

    protected $service;

    protected const PROVIDERS = ['paystack', 'flutterwave', 'monnify'];

    public function __construct($data)
    {

    }

    /**
     * Initialize the service and set provider
     *
     * @param string $data
     * @return $this
     * @throws Exception
     */

    public function init(string $data): self
    {
        try {
            return $this->setProvider($data);
        } catch (\Throwable $e) {
            // Optionally log the error or perform other actions before throwing
            throw new Exception('Error initializing the service: ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Set the payment service provider
     *
     * @param string $data
     * @return $this
     * @throws Exception
     */
    protected function setProvider(string $data): self
    {
        try {
            $data = strtolower($data);
            if (in_array($data, self::PROVIDERS)) {
                $this->provider = $data;
            } else {
                throw new Exception('your chosen provider is not supported yet');
            }
            return $this;
        } catch (\Throwable $e) {
            // Optionally log the error or perform other actions before throwing
            throw new Exception('Error setting the provider: ' . $e->getMessage(), 0, $e);
        }
    }

    /**
     * Set the payment service provider configuration
     *
     * @param array $data
     * @return $this
     * @throws Exception
     */
    public function config(array $data): self
    {
        try {
            switch ($this->provider) {
                case 'paystack':
                    $this->paystackConfig = $data;
                    $this->service = new pst();
                    break;
                case 'flutterwave':
                    $this->flutterwaveConfig = $data;
                    $this->service = new ftw();
                    break;
                case 'monnify':
                    $this->monnifyConfig = $data;
                    $this->service = new mfy();
                    break;
                default:
                    throw new Exception('Provider not set');
            }

            return $this;
        } catch (\Throwable $e) {
            // Optionally log the error or perform other actions before throwing
            throw new Exception('Configuration error: ' . $e->getMessage(), 0, $e);
        }
    }
}
