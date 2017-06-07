<?php

namespace GiveMeYourHelp\Http\Controllers;

use GiveMeYourHelp\Service;
use Purifier;
use Session;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Instantiate a new ServiceController instance.
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
        $services = Service::latest()->paginate(6);
        return view('models.services.index')->withServices($services);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('models.services.create');
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
            'icon'    => 'required|min:4|max:30',
            'color'   => 'required|min:3|max:35',
            'title'   => 'required|min:3|max:30',
            'content' => 'required|min:8|max:150',
            'slug'    => 'required|alpha_dash|min:5|max:255|unique:services,slug'
        ));

        $service = new Service;

        $service->icon    = $request->icon;
        $service->color   = $request->color;
        $service->title   = $request->title;
        $service->content = Purifier::clean($request->content);
        $service->slug    = $request->slug;

        $service->save();

        return redirect()->route('services.show', $service)
            ->with('success', 'The service has been successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \GiveMeYourHelp\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('models.services.show')->withService($service);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \GiveMeYourHelp\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('models.services.edit')->withService($service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \GiveMeYourHelp\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $this->validate($request, array(
            'icon'    => 'required|min:4|max:30',
            'color'   => 'required',
            'title'   => 'required|min:3|max:30',
            'content' => 'required|min:8|max:150',
            'slug'    => 'required|alpha_dash|min:5|max:255|unique:services,slug,' . $service->id,
        ));

        $service->icon    = $request->icon;
        $service->color   = $request->color;
        $service->title   = $request->title;
        $service->content = Purifier::clean($request->content);
        $service->slug    = $request->slug;

        $service->save();

        return redirect()->route('services.show', $service)
            ->with('success', 'The service has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \GiveMeYourHelp\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index')
            ->with('success', 'The service has been successfully deleted!');
    }
}