<?php

namespace App\Services\Verifiers;

use App\Configs\ConcreteConfigs\FactsConfig;

/**
 * @uses FactsConfig
 */
class FactCategoryVerifier {
    /**
     * Checks if existing fact category was passed
     * @param  String $category
     * @return Boolean
     */
    public static function verify($category) {
        return in_array($category, FactsConfig::FACTS_CATEGORIES);
    }
}
