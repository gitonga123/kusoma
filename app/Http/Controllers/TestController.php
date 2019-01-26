<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestController extends Controller
{
    /**
     * Test my own things not associated with the project
     *
     * @return \Illuminate\Http\Response
    */

    public function index()
    {
    	return view('testvue');
    }
}
