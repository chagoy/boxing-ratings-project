<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fight extends Model
{
	protected $guarded = [];

	protected $with = ['card'];

	public function boxers()
	{
		return $this->belongsToMany(Boxer::class, 'boxer_fight', 'fight_id', 'boxer_id');
	}

	public function card()
	{
		return $this->belongsTo(Card::class);
	}
}
