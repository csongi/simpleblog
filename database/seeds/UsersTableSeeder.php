<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Role;
use \App\Permission;
use \App\Post;

class UsersTableSeeder extends Seeder {

    public function run()
    {
    	Post::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

    	// detach all role and permission
    	$roles = Role::all();
    	foreach ($roles as $role) {
    		$role->users()->sync([]);
			$role->perms()->sync([]);
			$role->forceDelete();
    	}

    	Permission::truncate();
        User::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        User::create([
        	'name' => 'Csongi',
        	'email' => 'csongor.mihaly@yahoo.com',
        	'password' => Hash::make('jel520')
    	]);
    }

}