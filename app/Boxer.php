<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Boxer extends Model
{
	protected $fillable = ['name', 'promoter_id', 'slug'];

    protected $with = ['fights'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
	
    public function fights()
    {
    	return $this->belongsToMany(Fight::class, 'boxer_fight', 'boxer_id', 'fight_id');
    }
    public function promoter()
    {
    	return $this->belongsTo(Promoter::class, 'promoter_id');
    }
}
