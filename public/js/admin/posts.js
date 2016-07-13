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

function getModalFactory(modalSelector) {
	return {
        open: function () {
            $(modalSelector).modal('show');
        },
        close: function () {
            $(modalSelector).modal('hide');
        }
    };
}

app.factory('PostModal', function () {
    return getModalFactory('#edit-post-modal');
});
 
app.factory('NewPostModal', function () {
    return getModalFactory('#new-post-modal');
});

app.controller('PostListCtrl', function ($scope, $rootScope, PostFactory, PostModal, NewPostModal) {
 	$rootScope.$on('refreshPostList', function (event) {
        $scope.refresh();
    });

	$scope.refresh = function () {
        PostFactory.query(
                angular.copy($scope.filter)
                , function (response) {
                    $scope.posts = response.posts;
                });
    };

    $scope.edit = function (id) {
        $rootScope.$emit("PostLoaded", PostFactory.show({id: id}));
        PostModal.open();
    };
     
    $scope.new = function () {
    	console.log(1);
        $rootScope.$emit("PostLoaded", PostFactory.create());
        NewPostModal.open();
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

app.controller('PostFormCtrl', function ($scope, $rootScope, PostFactory, PostModal, NewPostModal) {
 
    $rootScope.$on('PostLoaded', function (event, post) {
       $scope.post = post;
    });
 
    $scope.update = function (id) {
        PostFactory.update({id: id}, $scope.post);
 
        $scope.refreshListAndCloseModal();
    };
     
    $scope.store = function () {
        PostFactory.store($scope.post);
 
        $scope.refreshListAndCloseModal();
    };
 
    $scope.refreshListAndCloseModal = function () {
        $rootScope.$emit("refreshPostList");
 
        PostModal.close();
        NewPostModal.close();
    };
 
    $scope.post = {};
 
});