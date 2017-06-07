<?php

namespace GiveMeYourHelp\Http\Controllers;

use GiveMeYourHelp\Portrait;
use Image;
use Purifier;
use Session;
use Storage;
use Illuminate\Http\Request;

class PortraitController extends Controller
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
        $portraits = Portrait::latest()->paginate(8);
        return view('models.portraits.index')->withPortraits($portraits);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('models.portraits.create');
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
            'picture'   => 'required',
            'firstname' => 'required|min:3|max:30',
            'name'      => 'required|min:2|max:70',
            'status'    => 'required|min:3|max:30',
            'content'   => 'required|min:5|max:150',
            'facebook'  => 'sometimes|nullable|min:25|max:191',
            'linkedin'  => 'sometimes|nullable||min:25|max:191',
            'email'     => 'required|min:8|max:191',
            'slug'      => 'required|alpha_dash|min:5|max:255|unique:portraits,slug'
        ));

        $portrait = new Portrait;

        $portrait->firstname = $request->firstname;
        $portrait->name      = $request->name;
        $portrait->status    = $request->status;
        $portrait->content   = Purifier::clean($request->content);
        $portrait->facebook  = $request->facebook;
        $portrait->linkedin  = $request->linkedin;
        $portrait->email     = $request->email;
        $portrait->slug      = $request->slug;

        $picture = $request->file('picture');
        $filename = time() . '.' . $picture->getClientOriginalExtension();
        $location = public_path('pictures/' . $filename);
        Image::make($picture)->resize(110, 110)->save($location);
        $portrait->picture = $filename;

        $portrait->save();

        return redirect()->route('portraits.show', $portrait)
            ->with('success', 'The portrait has been successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \GiveMeYourHelp\Portrait  $portrait
     * @return \Illuminate\Http\Response
     */
    public function show(Portrait $portrait)
    {
        return view('models.portraits.show')->withPortrait($portrait);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \GiveMeYourHelp\Portrait  $portrait
     * @return \Illuminate\Http\Response
     */
    public function edit(Portrait $portrait)
    {
        return view('models.portraits.edit')->withPortrait($portrait);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \GiveMeYourHelp\Portrait  $portrait
        * @return \Illuminate\Http\Response
        */
    public function update(Request $request, Portrait $portrait)
    {
        $this->validate($request, array(
            'firstname' => 'required|min:3|max:30',
            'name'      => 'required|min:2|max:70',
            'status'    => 'required|min:3|max:30',
            'content'   => 'required|min:5|max:150',
            'facebook'  => 'sometimes|nullable|min:25|max:191',
            'linkedin'  => 'sometimes|nullable||min:25|max:191',
            'email'     => 'required|min:8|max:191',
            'slug'      => 'required|alpha_dash|min:5|max:255|unique:portraits,slug,' . $portrait->id
        ));

        $portrait->firstname = $request->firstname;
        $portrait->name      = $request->name;
        $portrait->status    = $request->status;
        $portrait->content   = Purifier::clean($request->content);
        $portrait->facebook  = $request->facebook;
        $portrait->linkedin  = $request->linkedin;
        $portrait->email     = $request->email;
        $portrait->slug      = $request->slug;

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $filename = time() . '.' . $picture->getClientOriginalExtension();
            $location = public_path('pictures/' . $filename);
            Image::make($picture)->resize(110, 110)->save($location);
            $oldFilename = $portrait->picture;
            $portrait->picture = $filename;
            Storage::delete($oldFilename);
        }

        $portrait->save();

        return redirect()->route('portraits.show', $portrait)
            ->with('success', 'The portrait has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \GiveMeYourHelp\Portrait  $portrait
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portrait $portrait)
    {
        $portrait->delete();

        return redirect()->route('portraits.index')
            ->with('success', 'The portrait has been successfully deleted!');
    }
}