<?php

namespace GiveMeYourHelp\Http\Controllers;

use GiveMeYourHelp\Offer;
use Image;
use Purifier;
use Session;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /**
     * Instantiate a new OfferController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('staff');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offers = Offer::latest()->paginate(6);
        return view('models.offers.index')->withOffers($offers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('models.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, array(
            'title'   => 'required|max:255',
            'price'   => 'required|between:0,999.99',
            'content' => 'required',
            'slug'    => 'required|alpha_dash|min:5|max:255|unique:offers,slug'
        ));

        $offer = new Offer;

        $offer->title   = $request->title;
        $offer->price   = $request->price;
        $offer->content = Purifier::clean($request->content);
        $offer->slug    = $request->slug;

        $offer->save();

        return redirect()->route('offers.show', $offer)
            ->with('success', 'The offer has been successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \GiveMeYourHelp\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer)
    {
        return view('models.offers.show')->withOffer($offer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \GiveMeYourHelp\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Offer $offer)
    {
        return view('models.offers.edit')->withOffer($offer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \GiveMeYourHelp\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        $this->validate($request, array(
            'title'   => 'required|max:255',
            'price'   => 'required',
            'slug'    => 'required|alpha_dash|min:5|max:255|unique:offers,slug,' . $offer->id,
            'content' => 'required'
        ));

        $offer->title   = $request->title;
        $offer->price   = $request->price;
        $offer->content = $request->content;
        $offer->slug    = $request->slug;

        $offer->save();        
        
        return redirect()->route('offers.show', $offer)
            ->with('success', 'The offer has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \GiveMeYourHelp\Offer  $offer
     * @return \Illuminate\Http\Response
        */
    public function destroy(Offer $offer)
    {
        $offer->delete();

        return redirect()->route('offers.index')
            ->with('success', 'The offer has been successfully deleted!'); 
    }
}