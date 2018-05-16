<?php

use Illuminate\Database\Seeder;
use App\User;
use App\File;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'raul';
        $user->email = 'raulgalindorosales@gmail.com';
        $user->password = bcrypt('secret123');
        $user->save();

        for ($x = 0; $x <= 200; $x++) {
            $file = new File;
            $file->title = str_random(10);
            $file->content = str_random(100);
            $file->tags = '#'.str_random(10).'#'.str_random(10);
            $file->user_id = $user->id;
            $file->save();
        } 
       


    }
}
