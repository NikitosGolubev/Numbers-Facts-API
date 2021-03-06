<?php

namespace App\Services\Converters;

use App\Services\Converters\Converter;
use App\Configs\ConcreteConfigs\FactsConfig;

/**
 * Converts number to string with enough forward zeros, and opposit
 * string with forward zeros to number.
 *
 * @uses FactsConfig - to calculate how many zeros can be put forward
 */
class FactNumberToLeadingZerosConverter implements Converter {
    /**
     * Converts number to string number with forward zeros: 12 -> 0012
     * @param  Integer $number
     * @return String
     */
    public function forward($number) {
        $number_length = strlen("$number");
        $num_zeros_to_add = FactsConfig::MAX_AMOUNT_OF_SYMBOLS_IN_FACT_NUMBER - $number_length;

        $converted_number = $number;

        for ($i = 0; $i < $num_zeros_to_add; $i++) {
            $converted_number = "0".$converted_number;
        }

        return $converted_number;
    }

    /**
     * Doing opposit from $this.forward(): 0012 -> 12
     * @param  String $numberString
     * @return Integer
     */
    public function back($numberString) {
        $converted_number =  (int)$numberString;
        return $converted_number;
    }
}
