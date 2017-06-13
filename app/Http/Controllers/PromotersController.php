<?php

namespace App\Http\Controllers;

use App\Promoter;

use Illuminate\Http\Request;

class PromotersController extends Controller
{
    // $network = $network->where('slug', $network->slug)->with(['cards' => function ($query) {
    //         $query->orderBy('date', 'desc');
    //         }, 'cards.fights.boxers'])
    //         ->get();

    public function index()
    {
    	$promoters = Promoter::orderBy('name')->get();
        $boxers = Promoter::with('boxers')->get();
    	if (request()->wantsJson()) {
    		return $promoters;
    	}

    	return compact('promoters', 'boxers');
    }

    public function show(Promoter $promoter)
    {
        $promoter->load(['cards' => function ($query) {
            $query->orderBy('date', 'desc');
        }, 'cards.fights.boxers'])->get();
        
    	return compact('promoter');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|unique:promoters'
        ]);

        Promoter::create([
            'name' => request('name'),
            'slug' => strtolower(str_replace(" ", "", request('name')))
        ]);

        return back();
    }
}
