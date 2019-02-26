<?php

namespace App\Services\Verifiers;

use App\Configs\ConcreteConfigs\FactsConfig;

/**
 * @uses FactsConfig
 */
class FactNumberVerifier {
    /**
     * Checks if valid fact number was passed
     * @param  Integer $category
     * @return Boolean
     */
    public static function verify($number) {
    	// x < MIN === not allowed
    	// x > MAX === not allwoed as well
        if ($number < FactsConfig::MIN_FACT_NUMBER || $number > FactsConfig::MAX_FACT_NUMBER) {
            return false;
        }
        return true;
    }
}
