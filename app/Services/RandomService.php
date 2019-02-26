<?php

namespace App\Services;

use App\Services\Service;

/**
 * Responsible for generating random stuff or fetching random stuff from somewhere
 */
class RandomService implements Service {
    /**
     * Generates random integer at particular range.
     * 
     * @param  int    $min Min integer that might be generated.
     * @param  int    $max Max integer that might be generated.
     * @return Integer
     */
    public static function getRandomNumInRange(int $min, int $max) {
        return rand($min, $max);
    }

    /**
     * Fetches random item from array
     * 
     * @param  array  $array 
     * @return [Mixed]
     */
    public static function getRandomItemFromIndexedArray(array $array) {
        $random_item_index = array_rand($array);
        $random_item = $array[$random_item_index];
        return $random_item;
    }
}
