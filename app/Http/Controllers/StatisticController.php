<?php

namespace GiveMeYourHelp\Http\Controllers;

use GiveMeYourHelp\Statistic;
use Purifier;
use Session;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    /**
     * Instantiate a new StatisticController instance.
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
        $statistics = Statistic::latest()->paginate(6);
        return view('models.statistics.index')->withStatistics($statistics);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('models.statistics.create');
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
            'icon'   => 'required|min:3|max:60',
            'name'   => 'required|min:2|max:30',
            'number' => 'required|max:9',
            'slug'   => 'required|alpha_dash|min:5|max:255|unique:statistics,slug'
        ));

        $statistic = new Statistic;

        $statistic->icon   = $request->icon;
        $statistic->name   = $request->name;
        $statistic->number = $request->number;
        $statistic->slug   = $request->slug;

        $statistic->save();

        return redirect()->route('statistics.show', $statistic)
            ->with('success', 'The statistic has been successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \GiveMeYourHelp\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function show(Statistic $statistic)
    {
        return view('models.statistics.show')->withStatistic($statistic);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \GiveMeYourHelp\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function edit(Statistic $statistic)
    {
        return view('models.statistics.edit')->withStatistic($statistic);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \GiveMeYourHelp\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statistic $statistic)
    {
        $this->validate($request, array(
            'icon'   => 'required|min:3|max:60',
            'name'   => 'required|min:2|max:30',
            'number' => 'required|max:9',
            'slug'   => 'required|alpha_dash|min:5|max:255|unique:statistics,slug,' . $statistic->id,
        ));

        $statistic->icon   = $request->icon;
        $statistic->name   = $request->name;
        $statistic->number = $request->number;
        $statistic->slug   = $request->slug;

        $statistic->save();

        return redirect()->route('statistics.show', $statistic)
            ->with('success', 'The statistic has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \GiveMeYourHelp\Statistic  $statistic
     * @return \Illuminate\Http\Response
     */
    public function destroy(Statistic $statistic)
    {
        $statistic->delete();

        return redirect()->route('statistics.index')
            ->with('success', 'The service has been successfully deleted!');
    }
}