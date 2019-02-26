<?php

namespace App\Configs\ConcreteConfigs;

use App\Configs\Config;

/**
 * Stores all the static data related to facts (validational, response, categories, etc...)
 */
class FactsConfig implements Config {
    /**
     * @var Integer Min value that fact number can be equalled to.
     */
    const MIN_FACT_NUMBER = 0;
    /**
     * @var Integer Max value that fact number can be equalled to.
     */
    const MAX_FACT_NUMBER = 9999;

    /**
     * @var Integer Max length of fact number. (treating it like a string here)
     */
    const MAX_AMOUNT_OF_SYMBOLS_IN_FACT_NUMBER = 4;

    /**
     * @var Array Categories of facts. (Important - they MUST match with categrories names in DB)
     */
    const FACTS_CATEGORIES = ['year', 'date', 'math'];

    /**
     * @var Array Text responses that fact with appropriate number wasn't found.
     * Supposed that at the end of each response, a particular number would be pasted.
     */
    const FACTS_EMPTY_MESSAGIES = [
        "This number is boring: ", // .$number
        "We couldn't find the fact for number ",
        "I wish we would have an appropriate fact for following number: "
    ];
    
    /**
     * Returns message that says that fact in PARTICULAR CATEGORY wasn't found
     * 
     * @param  String $cat
     * @param  Integer $num
     * @return String
     */
    public static function getNotFoundCategoryMessage($cat, $num) {
        return "There are no facts with number '".$num."' in '".$cat."' category.";
    }
}