<?php
declare (strict_types = 1);

namespace thedavidinyang\paymentGateway;

use Exception;

class Boot
{
    protected array $monnifyConfig;
    protected array $paystackConfig;
    protected array $flutterwaveConfig;
    protected string $config;

    protected string $provider;

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
            $this->provider = $data;
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
            $this->provider = $data;
            return $this;
        } catch (\Throwable $e) {
            // Optionally log the error or perform other actions before throwing
            throw new Exception('Configuratioin error: ' . $e->getMessage(), 0, $e);
        }
    }
}
