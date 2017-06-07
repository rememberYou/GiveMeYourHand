<?php

namespace GiveMeYourHelp\Http\Controllers;

use GiveMeYourHelp\Offer;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::paginate(3);
        return view('models.purchases.index')->withOffers($offers);
    }
}