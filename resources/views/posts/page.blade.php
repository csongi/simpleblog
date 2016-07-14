@extends('layout.master')

@section('content')

    <div class="row">

        <div class="col-xs-12 col-sm-12">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Toggle nav</button>
          </p>
          <div class="jumbotron">
            <h1>{{ $post->title }}</h1>
            <p>{{ date("F j. Y, H:i", strtotime($post->created_at)) }} by <strong>{{ $post->user->name }}</strong></p>
            <p>{{ $post->content }}</p>
            <p><a class="btn btn-default" href="{{ url('/') }}" role="button">« Back</a></p>
          </div>
          <div class="row">
      			
          </div><!--/row-->
        </div><!--/.col-xs-12.col-sm-12-->

    </div><!--/row-->

@stop