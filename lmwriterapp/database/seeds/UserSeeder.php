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

        $file = new File;
        $file->title = 'Lo que';
        $file->content = 'el viento se llevo';
        $file->tags = '#lo#vieto';
        $file->user_id = $user->id;
        $file->save();

        $file = new File;
        $file->title = 'Aveng';
        $file->content = 'ers';
        $file->tags = '#iron#loki';
        $file->user_id = $user->id;
        $file->save();

    }
}
