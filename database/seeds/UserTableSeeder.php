<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'Muller caetano',
            'email' => 'miilleramaral@gmail.com',
            'password' => bcrypt('123456')
        ]);
    }
}
