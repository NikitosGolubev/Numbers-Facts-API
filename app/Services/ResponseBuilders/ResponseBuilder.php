<?php

namespace App\Services\ResponseBuilders;

/**
 * Common interface for all response builders
 */
interface ResponseBuilder {
    /**
     * Handles the data in particular way; Builds convinient response.
     * @param  [Mixed] $data Data that should be somehow handled.
     */
    public function build($data);
}
