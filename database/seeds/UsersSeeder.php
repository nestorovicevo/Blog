<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 20)->create();    ///ovaj drugi paramaetar je broj korisnika koliko zelimo da ih izgenerisemo
                                                    //umesto create() metode mozemo koristiti i make()
    }
}
