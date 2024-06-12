<?php
declare (strict_types = 1);

namespace thedavidinyang\payment\monnify;

use thedavidinyang\payment\helpers\checkConfig;
use Exception;

class Bootstrap
{
    use checkConfig;

    public const SERVICES = [];
    public const PAY_CONFIG = [];

    public array $serviceConfig;

    public function __construct(array $param){

        if ($this->checker($param, self::PAY_CONFIG)){

            $this->setServiceConfig($param);
        } else {

            throw new Exception('Expected config parameters not met');

        }


    }

    private function setServiceConfig(array $config){

        $this->serviceConfig = $config;
    }

}
