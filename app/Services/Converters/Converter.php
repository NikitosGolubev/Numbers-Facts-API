<?php

namespace App\Services\Converters;

/**
 * Common interface for all data converters
 */
interface Converter {
	// Convert to what
    public function forward($value);
    // Opposite to forward
    public function back($value);
}
