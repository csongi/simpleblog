@extends('layout.master')

@section('content')

    <div class="row">

        <div class="col-xs-12 col-sm-12">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>Hello, world!</h1>
            <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
          </div>
          <div class="row">
			@if ($posts->isEmpty())
			<p>No Posts Yet, Sorry!</p>
			@else
				@foreach ($posts as $post)
		    		@include('blogs.post')
			    @endforeach
			    <div class="col-xs-12">
			    {{ $posts->render() }}
			    </div>
		    @endif
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-12-->

    </div><!--/row-->

@stop