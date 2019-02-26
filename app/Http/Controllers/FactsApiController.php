<?php

namespace App\Http\Controllers;

use App\Configs\ConcreteConfigs\FactsConfig;
use App\Services\Api\FetchingSingleFact\RandomFactFromRandomCatApi;
use App\Services\Api\FetchingSingleFact\RandomFactFromConcreteCatApi;
use App\Services\Api\FetchingSingleFact\ConcreteFactFromRandomCatApi;
use App\Services\Api\FetchingSingleFact\ConcreteFactFromConcreteCatApi;

/**
 * Controller for handling api requests. Uses API methods.
 *
 * @uses FactsConfig
 * @uses RandomFactFromRandomCatApi
 * @uses RandomFactFromConcreteCatApi
 * @uses ConcreteFactFromRandomCatApi
 * @uses ConcreteFactFromConcreteCatApi
 */
class FactsApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     *  @return Void Prints JSON
     */
    public function getRandomFactFromRandomCat() {
        $api = new RandomFactFromRandomCatApi;
        $response = $api->get();
        echo $response;
    }

    /**
     * @return Void Prints JSON
     */
    public function getFactFromRandomCat($fact_number) {
        $api = new ConcreteFactFromRandomCatApi;
        $response = $api->get(['number' => $fact_number]);
        echo $response;
    }

    /**
     * @return Void Prints JSON
     */
    public function getRandomFactFromConcreteCat($fact_category) {
        // checking if existing category was passed
        if (!in_array($fact_category, FactsConfig::FACTS_CATEGORIES)) {
            return redirect()->route('404');
        }

        $api = new RandomFactFromConcreteCatApi;
        $response = $api->get(['category' => $fact_category]);
        echo $response;
    }

    /**
     * @return Void Prints JSON
     */
    public function getFactFromConcreteCat($fact_category, $fact_number) {
        // checking if existing category was passed
        if (!in_array($fact_category, FactsConfig::FACTS_CATEGORIES)) {
            return redirect()->route('404');
        }

        $api = new ConcreteFactFromConcreteCatApi;
        $response = $api->get(['category' => $fact_category, 'number' => $fact_number]);
        echo $response;
    }
}
