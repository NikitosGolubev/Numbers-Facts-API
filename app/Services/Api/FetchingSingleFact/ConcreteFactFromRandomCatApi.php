<?php

namespace App\Services\Api\FetchingSingleFact;

use App\Services\Api\Api;
use App\Services\Api\FetchingSingleFact\FetchingSingleFact;

/**
 * Gets fact appropriate to particular number in random category
 * 
 * @api
 */
class ConcreteFactFromRandomCatApi extends FetchingSingleFact implements Api {
    /**
     * Fetches concrete fact from random category. Returns JSON.
     *
     * REQUIRED: $data[number] - fact number
     * 
     * @param  Array $data
     * @return String
     */
    public function get(Array $data = []) {
        $fact_number = $data['number'];

        // Details db request that fact should be appropriate to generated fact number
        $this->dbFactsGetter->whereNumber($fact_number);
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
