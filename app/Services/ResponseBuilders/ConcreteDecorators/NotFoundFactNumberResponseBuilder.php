<?php

namespace App\Services\ResponseBuilders\ConcreteDecorators;

use App\Services\ResponseBuilders\ResponseBuilder;
use App\Services\ResponseBuilders\ResponseBuilderDecorator;
use App\Services\ResponseBuilders\RB;
use App\Configs\ConcreteConfigs\FactsConfig;
use App\Services\RandomService;
use App\Services\ResponseBuilders\ConcreteDecorators\JSONResponseBuilder;

/**
 * Decorator
 * @uses  RB - Response builder wrapee
 * @uses  FactsConfig
 * @uses  RandomService
 * @uses  JSONResponseBuilder
 */
class NotFoundFactNumberResponseBuilder extends ResponseBuilderDecorator implements
    ResponseBuilder
{
    /**
     * Builds response which says that fact wasn't found
     * @param  Array $data "number" - fact number which hasn't matched with any fact
     * @return String|False
     */
    public function build($data) {
        $response = [];

        $empty_messagies_arr = FactsConfig::FACTS_EMPTY_MESSAGIES;
        // Getting random NOT FOUND message to put it into response.
        $random_empty_message = RandomService::getRandomItemFromIndexedArray($empty_messagies_arr);

        // Adding fact number to response TEXT string
        $random_empty_message = $random_empty_message.$data['number'];

        // Forming the final response
        $response['fact'] = $random_empty_message;
        $response['number'] = $data['number'];
        $response['category'] = "Doesn't matter";
        $response['notFound'] = true;

        // Turning response into JSON format
        $to_json = new JSONResponseBuilder(new RB);
        $response = $to_json->build($response);

        return parent::build($response);
    }
}
