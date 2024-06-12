<?php
declare (strict_types = 1);

namespace thedavidinyang\payment\helpers;

use Exception;

trait checkService
{

/**
 * Check if the provided service is in the list of expected services.
 *
 * @param string $providedService The service to check.
 * @param array $expectedService The list of expected services.
 * @return bool True if the provided service is in the list of expected services, false otherwise.
 * @throws Exception if the provided service is not in the list of expected services.
 */
public function serviceCheck(string $providedService, array $expectedService): bool
{
    if (in_array($providedService, $expectedService, true)) {
        return true;
    } else {
        throw new Exception('The chosen provider is not supported.');
    }
}

}
