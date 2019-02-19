<?php

use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 100)->create()->each(function($post){
            $user = App\User::inRandomOrder()->first();           ///dodeljujemo prvih sto korisnika korisniku u bazi
            $post->user_id = $user->id;                ////$post = new Post;
            $post->save();
            // $post->update([
            //     'user_id' => $user->id               ////Ovo su oba nacina apdejtovovanja nekog modela
            // ]);
        });
    }
}
