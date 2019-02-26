<?php

namespace App\Services\ResponseBuilders\ConcreteDecorators;

use App\Services\ResponseBuilders\ResponseBuilder;
use App\Services\ResponseBuilders\ResponseBuilderDecorator;
use App\Services\ResponseBuilders\RB;
use App\Services\ResponseBuilders\ConcreteDecorators\JSONResponseBuilder;

/**
 * Decorator
 * @uses RB - Response builder wrapee
 * @uses JSONResponseBuilder
 */
class SuccessFactResponseBuilder extends ResponseBuilderDecorator implements
    ResponseBuilder
{
    /**
     * Forming SUCCESS response (fact was succesfully found and fetched).
     * @param  Array|Object $data Fact data
     * @return String|False
     */
    public function build($data) {
        $to_json = new JSONResponseBuilder(new RB);
        $response = $to_json->build($data);
        return parent::build($response);
    }
}
