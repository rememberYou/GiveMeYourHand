<?php

namespace GiveMeYourHelp\Http\Controllers;

use Illuminate\Http\Request;

class TermController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('models.terms.index');
    }
}