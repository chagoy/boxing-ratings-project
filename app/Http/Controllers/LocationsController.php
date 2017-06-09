<?php

namespace App\Http\Controllers;

use App\Location;

use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function index()
    {
    	$locations = Location::orderBy('venue')->with('cards.network')->get();

    	if (request()->wantsJson()) {
    		return $locations;
    	}

    	return compact('locations');
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
    		'venue' => 'required',
    		'city' => 'required',
    		'state' => 'required',
    		'country' => 'required'
    	]);

    	Location::create([
    		'venue' => request('venue'),
    		'city' => request('city'),
    		'state' => request('state'),
    		'country' => request('country'),
    		'slug' => strtolower(str_replace(" ", "", request('venue')))
    	]);

    	return back();
    }

    public function show($venue)
    {
        $location = Location::where(['slug' => $venue])->with(['cards' => function ($query) {
            $query->orderBy('date', 'desc');
        }, 'cards.network'])->get();

        return compact('location');
    }
}
