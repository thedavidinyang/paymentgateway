<?php
declare(strict_types=1);

namespace thedavidinyang\paymentGateway;

use Exception;

class Boot
{
    protected string $monnifyConfig;
    protected string $paystackConfig;
    protected string $flutterwaveConfig;
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
        return $this->setProvider($data);
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
        $this->provider = $data;
        return $this;
    }
}
