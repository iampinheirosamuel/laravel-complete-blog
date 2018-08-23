<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
       $user = App\User::create([
            'name' => 'Samuel Pinheiro',
            'email' => 'pinheirolaoluwa@gmail.com',
            'admin' => 1,
            'password' => bcrypt('samsam')
        ]);

        App\Profile::create([
            'user_id' => $user->id,
            'avatar'  => 'uploads\posts\avatar\1527084096lovethis.PNG',
            'about' => 'I am an admin here! Respect the boss ',
            'facebook' => 'facebook.com',
            'youtube' => 'youtube.com'
        ]);
    }
}
