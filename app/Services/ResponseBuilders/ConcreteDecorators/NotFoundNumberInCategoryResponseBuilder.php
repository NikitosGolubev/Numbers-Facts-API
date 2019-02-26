<?php

namespace App\Services\ResponseBuilders\ConcreteDecorators;

use App\Configs\ConcreteConfigs\FactsConfig;
use App\Services\ResponseBuilders\ResponseBuilder;
use App\Services\ResponseBuilders\ResponseBuilderDecorator;
use App\Services\ResponseBuilders\RB;
use App\Services\ResponseBuilders\ConcreteDecorators\JSONResponseBuilder;

/**
 * Decorator
 * @uses  FactsConfig
 * @uses RB - Response Builder wrapee
 * @uses JSONResponseBuilder
 */
class NotFoundNumberInCategoryResponseBuilder extends ResponseBuilderDecorator implements
    ResponseBuilder
{
    /**
     * Build response that says: the fact in PARTICULAR CATEGORY wasn't found.
     * @param  Array $data "number" => fact_number that was requested | NONE, 
     *     "category" => category that was requested
     * @return String|False
     */
    public function build($data) {
        $response = [];

        // Getting text message which describes the problem
        $empty_message = FactsConfig::getNotFoundCategoryMessage($data['category'], $data['number']);

        // Forming final response
        $response['fact'] = $empty_message;
        $response['number'] = $data['number'];
        $response['category'] = $data['category'];
        $response['notFound'] = true;

        $to_json = new JSONResponseBuilder(new RB);
        $response = $to_json->build($response);

        return parent::build($response);
    }
}