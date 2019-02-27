<?php

namespace App\Services\Api\FetchingSingleFact;

use App\Services\Api\Api;
use App\Services\DbFactsGetterService;
use App\Services\ResponseBuilders\RB;
use App\Services\ResponseBuilders\ConcreteDecorators\FactsDataSingleRecordBuilder;
use App\Services\ResponseBuilders\ConcreteDecorators\SingleFactResponseBuilders\SuccessFactResponseBuilder;
use App\Services\ResponseBuilders\ConcreteDecorators\SingleFactResponseBuilders\NotFoundFactNumberResponseBuilder;
use App\Services\ResponseBuilders\ConcreteDecorators\SingleFactResponseBuilders\NotFoundNumberInCategoryResponseBuilder;

/**
 * Abstract class for api for fetching single fact. (not collections of them).
 *
 * All the children of this class MUST fetch and return ONLY 1 single fact. No more.
 * 
 * @uses DbFactsGetterService - Provides API to fetch facts from DB
 * @uses RB - Response Builder wrapee
 * @uses FactsDataSingleRecordBuilder - proccess the db selection result
 * @uses SuccessFactResponseBuilder - builds success response
 * @uses NotFoundFactNumberResponseBuilder - builds response that says that fact wasn't found
 * @uses NotFoundNumberInCategoryResponseBuilder - builds response that says
 *     that fact wasn't fouund in particular category
 */
abstract class FetchingSingleFact implements Api {
    protected $dbFactsGetter;
    protected $rb;
    protected $dbFactRB;
    protected $successRB;
    protected $notFoundFactRB;
    protected $notFoundFactInCategoryRB;

    public function __construct() {
        $this->dbFactsGetter = new DbFactsGetterService;
        $this->rb = new RB;
        $this->dbFactRB = new FactsDataSingleRecordBuilder($this->rb);
        $this->successRB = new SuccessFactResponseBuilder($this->rb);
        $this->notFoundFactRB = new NotFoundFactNumberResponseBuilder($this->rb);
        $this->notFoundFactInCategoryRB = new NotFoundNumberInCategoryResponseBuilder($this->rb);
    }
}
