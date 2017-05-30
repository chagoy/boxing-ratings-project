<?php

namespace Tests\Feature;

use Carbon\Carbon;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SubmitCardTest extends TestCase
{
	use DatabaseMigrations;
    
    /** @test */
    public function authorized_users_can_submit_a_card()
    {
        $this->signIn();

        $card = create('App\Card', [
        	'promoter_id' => create('App\Promoter')->id,
        	'location_id' => create('App\Location')->id,
        	'network_id' => create('App\Network')->id,
        	'date' => Carbon::today(),
        	'time' => Carbon::today()
        ]);

        $fight = create('App\Fight', [
        	'card_id' => $card->id,
        	'type' => 'Headline'
        ]);

        $fight->boxers()->attach([
        	create('App\Boxer')->id,
        	create('App\Boxer')->id
        ]);

        $response = $this->post('/api/card', $card->toArray())
        	->assertRedirect('/submit');
    }
}
