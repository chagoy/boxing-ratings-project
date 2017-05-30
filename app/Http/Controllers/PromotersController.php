<?php

namespace App\Http\Controllers;

use App\Promoter;

use Illuminate\Http\Request;

class PromotersController extends Controller
{
    public function index()
    {
    	$promoters = Promoter::get();

    	if (request()->wantsJson()) {
    		return $promoters;
    	}
        
    	return compact('promoters');
    }

    public function show(Promoter $promoter)
    {
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
