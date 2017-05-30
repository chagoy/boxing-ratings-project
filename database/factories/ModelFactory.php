<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Boxer::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->firstName . ' ' . $faker->lastName,
		'slug' => $faker->firstName.$faker->lastName,
		'promoter_id' => 1
	];
});

$factory->define(App\Promoter::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->company,
		'slug' => str_replace(" ", "", $faker->company)
	];
});

$factory->define(App\Fight::class, function (Faker\Generator $faker) {
	return [
		'type' => $faker->firstName,
		'card_id' => 1
	];
});

$factory->define(App\Location::class, function (Faker\Generator $faker) {
	return [
		'venue' => $faker->company . ' Arena',
		'city' => $faker->city,
		'state' => $faker->state,
		'country' => $faker->country
	];
});

$factory->define(App\Card::class, function (Faker\Generator $faker) {
	return [
		'promoter_id' => 1,
		'location_id' => 2,
		'network_id' => 3,
		'viewers' => mt_rand(300000, 4000000)
	];
});

$factory->define(App\Network::class, function (Faker\Generator $faker) {
	return [
		'name' => $faker->company
	];
});