<?php

namespace App\Http\Controllers;

use App\Network;

use Illuminate\Http\Request;

class NetworksController extends Controller
{
    public function index()
    {
    	$networks = Network::orderBy('name')->get();

    	if (request()->wantsJson()) {
    		return $networks;
    	}

    	return compact('networks');
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
    		'name' => 'required|unique:networks'
    	]);

    	Network::create([ 
    		'name' => request('name'),
    		'slug' => strtolower(str_replace(" ", "", request('name')))
    	]);

    	return back();
    }

    public function show(Network $network) 
    {  
        $network = $network->where('slug', $network->slug)->with(['cards' => function ($query) {
            $query->orderBy('date', 'desc');
            }, 'cards.fights.boxers'])
            ->get();

        return compact('network');
    }
}
