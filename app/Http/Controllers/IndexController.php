<?php

namespace App\Http\Controllers;

use App\Services\Api\FetchingSingleFact\RandomFactFromRandomCatApi;

/**
 * Index controller
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
        return view('index.index')->with('response', $response);
    }
}
