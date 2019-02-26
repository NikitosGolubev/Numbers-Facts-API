<?php

namespace App\Http\Controllers;

use App\Services\Api\FetchingSingleFact\RandomFactFromRandomCatApi;
use App\Services\Converters\FactNumberToLeadingZerosConverter;

/**
 * Index controller
 * 
 * @uses FactNumberToLeadingZerosConverter - to convert fact number to appropriate format
 */
class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Responsible for correct displaying of index page
     * @return View
     */
    public function index() {
        // Calls API to get relevant data
        $api = new RandomFactFromRandomCatApi;
        $response_json = $api->get();

        // handles response
        $response = json_decode($response_json);
        // adding forward zeros if needed to fact numbers
        $converter = new FactNumberToLeadingZerosConverter;
        $response->number = $converter->forward($response->number);

        return view('index')->with('response', $response);
    }
}
