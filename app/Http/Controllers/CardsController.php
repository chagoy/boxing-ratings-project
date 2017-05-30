<?php

namespace App\Http\Controllers;
use App\Card;
use App\Fight;

use Illuminate\Http\Request;

class CardsController extends Controller
{
	// public function __construct()
	// {
	// 	$this->middleware('auth')->except(['index', 'show']);
	// }

    public function index()
    {
        $cards = Card::get();

        if (request()->wantsJson()) {
            return $cards;
        }

        return compact('cards');
    }

    public function show(Card $card)
    {
        return compact('card');
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
        $date = \DateTime::createFromFormat('m-d-Y', request('date'));

        $newdate = $date->format('Y-m-d H:i:s');

    	$card = Card::create([
    		'promoter_id' => request('promoter_id'),
    		'network_id' => request('network_id'),
    		'location_id' => request('location_id'),
    		'date' => $newdate,
    		'time' => request('time'),
            'viewers' => request('viewers')
    	]);

    	// i'm guessing i need a return here
    	// because card doesn't get an ID until submitted

    	$fight = Fight::create([
    		'type' => request('type'),
    		'card_id' => $card->id
    	]);

    	// somewhere we're going to get that card id
    	// again i think we need to return fight but i don't know

    	$fight->boxers()->attach([
    		request('selected_headline_a'),
    		request('selected_headline_b')
    	]);

    	return back();
    }
}
