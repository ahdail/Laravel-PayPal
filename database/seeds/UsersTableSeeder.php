<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' 		=> 'Adail Viana Neto',
        	'email' 	=> 'ahdail@gmail.com',
        	'password' 	=> bcrypt('123456'),
        ]);
    }
}
