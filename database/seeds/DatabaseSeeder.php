<?php

use Illuminate\Database\Seeder;
use \App\Database\Seeds\UsersTableSeeder;
use \App\Database\Seeds\PostsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call('UsersTableSeeder');
        $this->call('PostsTableSeeder');
    }
}
