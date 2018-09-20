<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'conus_name' => $faker->name,
        'conus_email' => $faker->unique()->safeEmail,
        'conus_mess' => $faker->paragraph,

    ];
});
$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'customer_firstname' => $faker->firstName,
        'customer_lastname' => $faker->lastName,
        'customer_email' => $faker->safeEmail,
        'customer_phone' => $faker->randomNumber,
        'customer_password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'customer_address'=> $faker->address,
    ];
});
$factory->define(App\Manufacturer::class, function (Faker $faker) {
    return [
        'manu_name' => $faker->company,
        'manu_des' => $faker->paragraph,
        'pub_status' => $faker->boolean,
    ];
});
$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->company,
        'category_des' => $faker->paragraph,
        'pub_status' => $faker->boolean,
    ];
});
$factory->define(App\Userrole::class, function (Faker $faker) {
    return [
        'role_name' => $faker->company,
    ];
});
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->word,
        'cate_id' => $faker->numberBetween($min = 0, $max = 4),
        'manu_id' => $faker->numberBetween($min = 0, $max = 10),
        'product_price' => $faker->numberBetween($min = 50, $max = 100),
        'product_quantity' => $faker->numberBetween($min = 0, $max = 10),
        'product_short_des' => $faker->paragraph,
        'product_long_des' => $faker->paragraph,
        'product_img' => $faker->imageUrl($width = 640, $height = 480) ,
        'pub_status' => $faker->boolean,
    ];
});
$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'product_name' => $faker->word,
        'cate_id' => $faker->numberBetween($min = 0, $max = 4),
        'manu_id' => $faker->numberBetween($min = 0, $max = 10),
        'product_price' => $faker->numberBetween($min = 50, $max = 100),
        'product_quantity' => $faker->numberBetween($min = 0, $max = 10),
        'product_short_des' => $faker->paragraph,
        'product_long_des' => $faker->paragraph,
        'product_img' => $faker->imageUrl($width = 640, $height = 480) ,
        'pub_status' => $faker->boolean,
    ];
});
$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'customer_id' => $faker->numberBetween($min = 0, $max = 10),
        'shipping_id' => $faker->numberBetween($min = 0, $max = 10),
        'order_total' => $faker->numberBetween($min = 100, $max = 5000),

    ];
});
$factory->define(App\Orderdetail::class, function (Faker $faker) {
    return [
        'order_id' => $faker->numberBetween($min = 1, $max = 10),
        'product_id' => $faker->numberBetween($min = 100, $max = 5000),
        'product_name' => $faker->word,
        'product_price' => $faker->numberBetween($min = 100, $max = 5000),
        'product_sales_quantity' => $faker->numberBetween($min = 1, $max = 20),
    ];
});
$factory->define(App\Shipping::class, function (Faker $faker) {
    return [
        'shipping_fullname' => $faker->name,
        'shipping_email' => $faker->safeEmail,
        'shipping_phone' => $faker->numberBetween($min = 10000000, $max = 999999999),
        'shipping_address' => $faker->address,
        'shipping_city' => $faker->city,
        'shipping_country' => "Bangladesh",
    ];
});
$factory->define(App\Payment::class, function (Faker $faker) {
    return [
        'order_id' => $faker->numberBetween($min = 1, $max = 10),
        'payment_type' => 'cash',
        'payment_status' => $faker->boolean,

    ];
});
