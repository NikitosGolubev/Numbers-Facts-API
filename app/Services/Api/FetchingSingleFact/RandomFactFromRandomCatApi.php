<?php

namespace App\Services\Api\FetchingSingleFact;

use App\Services\Api\Api;
use App\Services\Api\FetchingSingleFact\FetchingSingleFact;
use App\Configs\ConcreteConfigs\FactsConfig;
use App\Services\RandomService;

/**
 * Gets 1 random fact(related to random fact number) from random category.
 * 
 * @uses FactsConfig
 * @uses RandomService
 * @api
 */
class RandomFactFromRandomCatApi extends FetchingSingleFact implements Api {
    /**
     * Generates random fact. Returns JSON.
     * 
     * @param  Array $data SHOULD BE EMPTY THERE. NOTHING NEEDED.
     * @return String
     */
    public function get(Array $data = []) {
        // Generates random fact number
        $fact_number = RandomService::getRandomNumInRange(
            FactsConfig::MIN_FACT_NUMBER,
            FactsConfig::MAX_FACT_NUMBER
        );
        
        // Details db request that fact should be appropriate to generated fact number
        $this->dbFactsGetter->whereNumber($fact_number);
        // Implements db request
        $query_results = $this->dbFactsGetter->get();

        // Handles the result, returns false or data with fact
        $response = $this->dbFactRB->build($query_results);

        // if false, than nothing were found
        if (!$response) {
            $response = $this->notFoundFactRB->build(
                ['number' => $fact_number]
            ); 
        } else {
            $response = $this->successRB->build($response);
        }
        
        return $response;
    }
}
