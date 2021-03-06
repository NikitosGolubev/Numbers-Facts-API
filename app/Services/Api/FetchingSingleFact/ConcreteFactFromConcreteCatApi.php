<?php

namespace App\Services\Api\FetchingSingleFact;

use App\Services\Api\Api;
use App\Services\Api\FetchingSingleFact\FetchingSingleFact;

/**
 * Gets fact appropriate to particular number in particular category
 * 
 * @api
 */
class ConcreteFactFromConcreteCatApi extends FetchingSingleFact implements Api {
    /**
     * Fetches concrete fact from concrete category. Returns JSON.
     *
     * REQUIRED: $data[category] - fact category
     * REQUIRED: $data[number] - fact number
     * 
     * @param  Array $data
     * @return String
     */
    public function get(Array $data = []) {
        $fact_category = $data['category'];
        $fact_number = $data['number'];

        $this->dbFactsGetter->whereCategory($fact_category);
        $this->dbFactsGetter->whereNumber($fact_number);

        $query_results = $this->dbFactsGetter->get();

        $response = $this->dbFactRB->build($query_results);

        if (!$response) {
            $response = $this->notFoundFactInCategoryRB->build(
                ['number' => $fact_number, 'category' => $fact_category]
            ); 
        } else {
            $response = $this->successRB->build($response);
        }
        
        return $response;
    }
}
