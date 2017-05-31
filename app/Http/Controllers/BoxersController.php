<?php

namespace App\Http\Controllers;

use App\Boxer;
use Illuminate\Http\Request;

class BoxersController extends Controller
{
    public function index()
    {
    	$boxers = Boxer::with('fights')->get();

    	if (request()->wantsJson()) {
    		return $boxers;
    	}

    	return compact('boxers');
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
    		'name' => 'required|unique:boxers',
    		'promoter_id' => 'required'
    	]);



    	Boxer::create([
    		'name' => request('name'),
    		'promoter_id' => request('promoter_id'), 
            'slug' => strtolower(str_replace(" ", "", request('name')))
    	]);

    	return back();
    }

    public function show(Boxer $boxer)
    {
        return compact('boxer');
    }
}
