@extends('admin.layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div id="alert_placeholder"></div>
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <div ng-app="Posts">
                        @include('admin.posts._index')
                        @include('admin.posts._edit_post')
                        @include('admin.posts._new_post')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.7/angular-resource.js"></script>
<script src="{{ asset('js/admin/posts.js') }}"></script>
@endsection