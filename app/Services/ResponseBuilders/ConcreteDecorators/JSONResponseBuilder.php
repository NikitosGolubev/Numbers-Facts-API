<?php

namespace App\Services\ResponseBuilders\ConcreteDecorators;

use App\Services\ResponseBuilders\ResponseBuilder;
use App\Services\ResponseBuilders\ResponseBuilderDecorator;

/**
 * Decorator
 */
class JSONResponseBuilder extends ResponseBuilderDecorator implements
    ResponseBuilder
{
    /**
     * Gets data and turns it into JSON format.
     * @param  Array|Object $data
     * @return String|False
     */
    public function build($data) {
        $response = json_encode($data);
        return parent::build($response);
    }
}
