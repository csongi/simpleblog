<?php

use Illuminate\Database\Seeder;
use \App\User;
use \App\Role;
use \App\Permission;

class RolesTableSeeder extends Seeder {

    public function run()
    {    
    	// simple user role
        $blogger = new Role();
		$blogger->name         = 'blogger';
		$blogger->display_name = 'Blogger'; // optional
		$blogger->description  = 'User is allowed to view, soft delete and restore posts.'; // optional
		$blogger->save();

		// admin user role
		$admin = new Role();
		$admin->name         = 'admin';
		$admin->display_name = 'Administrator'; // optional
		$admin->description  = 'User is allowed to manage everything. :)'; // optional
		$admin->save();

		// attach admin role to admin user
		$adminUser = User::where('email', '=', 'csongor.mihaly@yahoo.com')->first();
		$adminUser->attachRole($admin); 

		// create permissions
		$viewPost = new Permission();
		$viewPost->name         = 'view-post';
		$viewPost->display_name = 'View Posts'; 
		$viewPost->description  = 'view new blog posts';
		$viewPost->save();

		$createPost = new Permission();
		$createPost->name         = 'create-post';
		$createPost->display_name = 'Create Posts'; 
		$createPost->description  = 'create new blog posts';
		$createPost->save();

		$editPost = new Permission();
		$editPost->name         = 'edit-post';
		$editPost->display_name = 'Edit Posts'; 
		$editPost->description  = 'edit new blog posts';
		$editPost->save();

		$trashPost = new Permission();
		$trashPost->name         = 'trash-post';
		$trashPost->display_name = 'Trash Posts'; 
		$trashPost->description  = 'trash new blog posts';
		$trashPost->save();

		$restorePost = new Permission();
		$restorePost->name         = 'restore-post';
		$restorePost->display_name = 'Restore Posts'; 
		$restorePost->description  = 'restore new blog posts';
		$restorePost->save();

		$deletePost = new Permission();
		$deletePost->name         = 'delete-post';
		$deletePost->display_name = 'Delete Posts'; 
		$deletePost->description  = 'delete new blog posts';
		$deletePost->save();
		
		// attach permissions to roles
		$admin->attachPermissions([$viewPost, $createPost, $editPost, $trashPost, $restorePost, $deletePost]);
		$blogger->attachPermissions([$viewPost, $trashPost, $restorePost]);

    }

}