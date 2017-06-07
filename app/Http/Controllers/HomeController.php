<?php

namespace GiveMeYourHelp\Http\Controllers;

use Illuminate\Http\Request;
use GiveMeYourHelp\Portrait;
use GiveMeYourHelp\Service;
use GiveMeYourHelp\Statistic;

use Session;
use GiveMeYourHelp\Mail\ContactForm;
use Mail;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portraits = Portrait::latest()->paginate(4);
        $services = Service::latest()->paginate(3);
        $statistics = Statistic::latest()->paginate(3);
        
        return view('home')
            ->withServices($services)
            ->withPortraits($portraits)
            ->withStatistics($statistics);
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email|max:255',
            'subject' => 'required|min:3|max:78',
            'message' => 'required|min:10|max:254',
        ]);

        $data = array (
            'email'       => $request->email,
            'subject'     => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::to('hello@giveyourhelp.io')->send(new ContactForm($data));

        $portraits = Portrait::latest()->paginate(4);
        $services = Service::latest()->paginate(3);
        $statistics = Statistic::latest()->paginate(3);       

        return view('home')->withServices($services)
            ->withPortraits($portraits)
            ->withStatistics($statistics)           
            ->with('success', 'The E-Mail has been successfully sended!');
    }
}