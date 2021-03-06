<?php

namespace App\Services\ResponseBuilders\ConcreteDecorators\SingleFactResponseBuilders;

use App\Services\ResponseBuilders\ResponseBuilder;
use App\Services\ResponseBuilders\ResponseBuilderDecorator;
use App\Services\ResponseBuilders\RB;
use App\Services\ResponseBuilders\ConcreteDecorators\JSONResponseBuilder;

/**
 * Abstract decorator.
 * 
 * Unifies the response that should be returned to user
 * when he fetches a single fact. Setters should be used by children to
 * form the response.
 *
 * @uses RB
 * @uses JSONResponseBuilder - to convert response to JSON
 */
abstract class SingleFactResponseBuilder extends ResponseBuilderDecorator implements
    ResponseBuilder
{
    /**
     * The fact itself.
     * @var String
     */
    private $fact;

    /**
     * Fact number.
     * @var Mixed
     */
    private $number;

    /**
     * Fact category.
     * @var String
     */
    private $category;

    /**
     * Fact availability indicator.
     * @var Boolean
     */
    private $notFound;

    /**
     * Defines the common structure for response, fills it with data
     * and applies other common decorators to build correct response.
     * 
     * @param  Mixed $data Not really matters here.
     * @return String|False
     */
    public function build($data) {
        $response = [];
        
        // Forming the final response
        // Following properties should be defined by child objects
        $response['fact'] = $this->fact;
        $response['number'] = $this->number;
        $response['category'] = $this->category;
        $response['notFound'] = $this->notFound;
        
        // Turn into JSON
        $to_json = new JSONResponseBuilder(new RB);
        $response = $to_json->build($response);

        return parent::build($response);
    }

    /**
     * Fact setter
     * @param String $fact
     */
    public function setFact($fact) {
        $this->fact = $fact;
    }

    /**
     * Fact number setter
     * @param Mixed $fact
     */
    public function setNumber($number) {
        $this->number = $number;
    }

    /**
     * Fact category setter
     * @param String $fact
     */
    public function setCategory($category) {
        $this->category = $category;
    }

    /**
     * Fact availability property setter
     * @param Boolean $fact
     */
    public function setNotFound($notFound) {
        $this->notFound = $notFound;
    }
}