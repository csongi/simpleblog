<?php

use Illuminate\Database\Seeder;
use \App\Post;

class PostsTableSeeder extends Seeder {

    public function run()
    {
        $content = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse vitae magna enim. Curabitur non vestibulum justo, ut rutrum massa. Maecenas non massa a mi bibendum mollis. Suspendisse potenti. Ut ut semper velit. Curabitur dui turpis, placerat id imperdiet in, congue non leo. Vivamus at turpis sed felis condimentum vehicula. Aliquam erat volutpat. Nunc erat est, molestie at nibh eu, ultrices facilisis ex. Nam a vestibulum risus. Duis sit amet lectus nisi. Nunc consectetur, augue vel suscipit placerat, ante est ultricies turpis, vulputate faucibus nisi dui faucibus lectus. Praesent aliquam metus justo, eu sollicitudin est imperdiet pretium. Curabitur ac dui posuere, pulvinar est sit amet, malesuada lacus. Quisque id sem in dolor efficitur elementum at ac enim. Donec at efficitur tellus, at congue nibh. Ut efficitur massa sit amet dolor porta feugiat. Integer ullamcorper, libero id dictum imperdiet, justo dui elementum eros, id dictum orci nisl in arcu. Duis egestas hendrerit pharetra. Aenean in nulla ac augue iaculis vestibulum tempor non ligula. Aenean fermentum in enim ut tincidunt. Vivamus id semper sapien.";

        for ($i = 1; $i <= 24; $i++) {
	        Post::create([
	        	'title' => 'Post ' . $i,
	        	'content' => $content,
	        	'user_id' => 1
	    	]);
	    }
    }

}