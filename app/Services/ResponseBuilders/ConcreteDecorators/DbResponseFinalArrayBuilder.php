<?php

namespace App\Services\ResponseBuilders\ConcreteDecorators;

use App\Services\ResponseBuilders\ResponseBuilder;
use App\Services\ResponseBuilders\ResponseBuilderDecorator;

/**
 * Decorator
 */
class DbResponseFinalArrayBuilder extends ResponseBuilderDecorator implements
    ResponseBuilder 
{
    /**
     * Query builder select result to Array.
     * 
     * Turns query builder select result into indexed array, 
     * where each index represents a single record.
     * 
     * @param  Object $data QB select res.
     * @return Array
     */
    public function build($data) {
        $final_result_array = [];

        foreach ($data as $row) {
            $final_result_array[] = $row;
        }

        return parent::build($final_result_array);
    }
}
