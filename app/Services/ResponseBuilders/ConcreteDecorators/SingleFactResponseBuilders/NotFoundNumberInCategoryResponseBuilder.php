<?php

namespace App\Services\ResponseBuilders\ConcreteDecorators\SingleFactResponseBuilders;

use App\Configs\ConcreteConfigs\FactsConfig;
use App\Services\ResponseBuilders\ResponseBuilder;
use App\Services\ResponseBuilders\ConcreteDecorators\SingleFactResponseBuilders\SingleFactResponseBuilder;

/**
 * Decorator
 * @uses  FactsConfig
 */
class NotFoundNumberInCategoryResponseBuilder extends SingleFactResponseBuilder implements
    ResponseBuilder
{
    /**
     * Build response that says: the fact in PARTICULAR CATEGORY wasn't found.
     * @param  Array $data "number" => fact_number that was requested | NONE, 
     *     "category" => category that was requested
     * @return String|False
     */
    public function build($data) {
        $category = $data['category'];
        $number = $data['number'];

        // Getting text message which describes the problem
        $empty_message = FactsConfig::getNotFoundCategoryMessage($category, $number);

        // Forming the final response
        $this->setFact($empty_message);
        $this->setNumber($number);
        $this->setCategory($category);
        $this->setNotFound(true);

        return parent::build($data);
    }
}