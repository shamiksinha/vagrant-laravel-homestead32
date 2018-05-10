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
$factory->define(App\Model\PaymentRequest::class, function (Faker\Generator $faker) {
    return [
        'payment_request_id' => $faker->md5,
        'email' => $faker->safeEmail,
        'buyer_name' => $faker->name,
        'amount' => $faker->numberBetween(10,5000),
		'purpose' => $faker->text(100),
		'status' => $faker->randomElement(['Pending','Sent','Failed','Completed']),
		'longurl' => $faker->url,
		'redirect_url' => $faker->url,
		'payment_req_created_at' => $faker->iso8601,
		'payment_req_modified_at' => $faker->iso8601,
		'allow_repeated_payments' => false,
		'group_id' => $faker->randomElement(['GRP002','GRP008',]),
    ];
});


$factory->define(App\Model\UserBook::class, function (Faker\Generator $faker) {
    return [
        'user_id' => 1,
        'user_email' => 'shamikchand002@gmail.com',
        'book_id' => $faker->numberBetween(10,5000),
		'book_name' => $faker->text(100),
		'book_month' => $faker->randomElement(['Pending','Sent','Failed','Completed']),
		'book_year' => $faker->url,
		'book_number' => $faker->url,
    ];
});

$factory->define(App\Model\UserGroup::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->md5,
        'user_email' => $faker->safeEmail,
        'group_id' => $faker->name,
        'books_in_group' => $faker->numberBetween(10,5000),
		'start_book_id' => $faker->text(100),
		'end_book_id' => $faker->randomElement(['Pending','Sent','Failed','Completed']),
    ];
});