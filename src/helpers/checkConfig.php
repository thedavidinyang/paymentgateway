<?php
declare (strict_types = 1);

namespace thedavidinyang\payment\helpers;

use Exception;

trait checkConfig
{

/**
 * Compare provided config with expected config.
 *
 * @param array $providedConfig The first array to compare.
 * @param array $expectedConfig The second array to compare.
 * @return bool Returns true if the arrays have the same keys and the same count, false otherwise.
 */
    public function checker(array $providedConfig, array $expectedConfig) : bool
    {
        try {

            // Get the keys of both arrays
            $keys1 = array_keys($providedConfig);
            $keys2 = array_keys($expectedConfig);

            // Check if both arrays have the same count of elements
            if (count($providedConfig) !== count($expectedConfig)) {
                throw new Exception('Expected config parameters not met');

            }

            // Check if both arrays have the same keys
            if (array_diff($keys1, $keys2) || array_diff($keys2, $keys1)) {
                throw new Exception('Expected config parameters not met');
            }

            return true;

        } catch (\Throwable $e) {
            // Optionally log the error or perform other actions before throwing
            throw new Exception('Configuration error: ' . $e->getMessage(), 0, $e);
        }
    }

}
