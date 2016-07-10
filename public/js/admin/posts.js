var app = angular.module('Posts', ['ngResource']);

 app.factory('PostFactory', function ($resource) {
     return $resource('admin/post/:id', {}, {
         query: {method: 'GET'},
         create: {url: '/admin/post/create', method: 'GET'},
         store: {method: 'POST'},
         show: {method: 'GET', params: {id: '@id'}},
         update: {method: 'PUT', params: {id: '@id'}},
         delete: {method: 'DELETE', params: {id: '@id'}}
     });
 });

app.controller('PostListCtrl', function ($scope, PostFactory) {
	$scope.refresh = function () {
         PostFactory.query(
                 angular.copy($scope.filter)
                 , function (response) {
                     console.log(response);
                     $scope.posts = response.posts;
                 });
     };

 	$scope.refresh();
});