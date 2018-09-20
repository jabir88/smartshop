<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 5)->create();
        factory(App\Contact::class, 20)->create();
        factory(App\Manufacturer::class, 10)->create();
        factory(App\Manufacturer::class, 10)->create();
        factory(App\Category::class, 4)->create();
        factory(App\Userrole::class, 5)->create();
        factory(App\Product::class, 10)->create();
        factory(App\Customer::class, 10)->create();
        factory(App\Shipping::class, 10)->create();
        factory(App\Order::class, 10)->create();
        factory(App\Orderdetail::class, 10)->create();
        factory(App\Payment::class, 10)->create();



    }
}
