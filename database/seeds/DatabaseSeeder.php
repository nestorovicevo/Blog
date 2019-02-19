<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);      //////ne moramo use jer imaju isti namespace, koji ovde nije naveden i to je ok
        $this->call(PostsSeeder::class);          ///ova funkcija uvek pokrece ovu run metodu u drugim userima 
    }
}
