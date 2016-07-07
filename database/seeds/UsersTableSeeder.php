<?php

use Illuminate\Database\Seeder;
use \App\User;

class UsersTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();

        User::create([
        	'name' => 'Csongi',
        	'email' => 'csongor.mihaly@yahoo.com',
        	'password' => Hash::make('jel520')
    	]);
    }

}