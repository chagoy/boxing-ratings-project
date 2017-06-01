<?php

namespace App\Http\Controllers;
use App\Card;
use App\Fight;
use App\Network;
use App\Promoter;
use App\Location;

use Illuminate\Http\Request;

class CardsController extends Controller
{
	// public function __construct()
	// {
	// 	$this->middleware('auth')->except(['index', 'show']);
	// }

    public function index()
    {
        $cards = Card::with('location', 'promoter', 'fights')->get();
       
        if (request()->wantsJson()) {
            return $cards;
        }

        return compact('cards');
    }

    public function show($network, $date)
    {
        $network = Network::where(['name' => $network])->first();
        $card = Card::where(['network_id' => $network->id, 'date' => $date])->first();
        $promoter = Promoter::where(['id' => $card->promoter_id])->first();
        $location = Location::where(['id' => $card->location_id])->first();
        $fight = Fight::where(['card_id' => $card->id])->with('boxers')->get();
        
        return compact('card', 'network', 'fight', 'location', 'promoter');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'promoter_id' => 'required',
            'network_id' => 'required',
            'location_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'viewers' => 'required|numeric',
            'type' => 'required',
            'selected_headline_a' => 'required',
            'selected_headline_b' => 'required'
        ]);
        // ensure that the date that is submitted will be accepted
        // by the DB
        $date = \DateTime::createFromFormat('m-d-Y', request('date'));
        $newdate = $date->format('Y-m-d H:i:s');

        // create the initial card and save it's data to a variable
    	$card = Card::create([
    		'promoter_id' => request('promoter_id'),
    		'network_id' => request('network_id'),
    		'location_id' => request('location_id'),
    		'date' => $newdate,
    		'time' => request('time'),
            'viewers' => request('viewers')
    	]);

        // we use $card to persist it's ID to make sure we have
        // a relationship between fights and cards

    	$fight = Fight::create([
    		'type' => request('type'),
    		'card_id' => $card->id
    	]);

        // we now attach boxers to a fight and it's stored in our pivot table
    	$fight->boxers()->attach([
    		request('selected_headline_a'),
    		request('selected_headline_b')
    	]);

    	return back();
    }
}
