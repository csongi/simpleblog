var app = angular.module('Posts', ['ngResource']);

 app.factory('PostFactory', function ($resource) {
     return $resource('admin/post/:id', {}, {
         query: {method: 'GET'},
         create: {url: '/admin/post/create', method: 'GET'},
         store: {method: 'POST'},
         show: {method: 'GET', params: {id: '@id'}},
         update: {method: 'PUT', params: {id: '@id'}},
         delete: {method: 'DELETE', params: {id: '@id'}},
         restore: {url: '/admin/post/restore/:id', method: 'POST', params: {id: '@id'}}
     });
 });

app.controller('PostListCtrl', function ($scope, PostFactory) {
	$scope.refresh = function () {
        PostFactory.query(
                angular.copy($scope.filter)
                , function (response) {
                    $scope.posts = response.posts;
                });
    };

    $scope.delete = function (id) {
    	if (confirm('Are you sure?') === true) {
        	PostFactory.delete({id: id});
        	$scope.refresh();
        }
    };

    $scope.restore = function (id) {
    	if (confirm('Are you sure?') === true) {
        	PostFactory.restore({id: id});
        	$scope.refresh();
        }
    };

 	$scope.refresh();
});