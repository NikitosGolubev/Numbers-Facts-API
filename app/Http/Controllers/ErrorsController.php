<?php

namespace App\Http\Controllers;

class ErrorsController extends Controller
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
     * Returns 404 HTTP NOT FOUND response page
     *
     * @return View
     */
    public function action404() {
        return response(view("errors.404"), 404);
    }
}
