<div class="col-xs-6 col-lg-4">
	<h2>{{ $post->title }}</h2>
	<p>{{ date("F j. Y, H:i", strtotime($post->created_at)) }} by <strong>{{ $post->user->name }}</strong></p>
	<p>{{ str_limit($post->content) }}</p>
	<p><a class="btn btn-default" href="#" role="button">View details »</a></p>
</div><!--/.col-xs-6.col-lg-4-->