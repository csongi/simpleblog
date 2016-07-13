var app = angular.module('Posts', ['ngResource']).config(function($httpProvider){
	// error handling
    $httpProvider.interceptors.push(function($q) {
		return {
			'request': function(config) {
				return config;
			},
			'response': function(response) {
				return response || $q.when(response);
			},
			'responseError': function(rejection) {
				bootstrap_alert.warning(rejection.data.message ? rejection.data.message : 'Server error!');

				return $q.reject(rejection);
			}
		};
	});
});

app.factory('PostFactory', function ($resource) {
    return $resource('admin/post/:id', {}, {
        query: {method: 'GET'},
        create: {url: '/admin/post/create', method: 'GET'},
        store: {method: 'POST'},
        show: {method: 'GET', params: {id: '@id'}},
        update: {method: 'PUT', params: {id: '@id'}},
        trash: {method: 'DELETE', params: {id: '@id'}},
        restore: {url: '/admin/post/restore/:id', method: 'POST', params: {id: '@id'}},
        delete: {url: '/admin/post/delete/:id', method: 'DELETE', params: {id: '@id'}},
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

// Post list controller
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

    $scope.show = function (id) {
        $rootScope.$emit("PostLoaded", PostFactory.show({id: id}));
        PostModal.open();
    };

    $scope.edit = function (id) {
        $rootScope.$emit("PostLoaded", PostFactory.show({id: id}));
        PostModal.open();
    };
     
    $scope.new = function () {
        $rootScope.$emit("PostLoaded", PostFactory.create());
        NewPostModal.open();
    };

    $scope.trash = function (id) {	
    	PostFactory.trash({id: id});
    	$scope.refresh();
    };

    $scope.restore = function (id) {
    	PostFactory.restore({id: id});
    	$scope.refresh();
    };

    $scope.delete = function (id) {
    	if (confirm('Are you sure?') === true) {
        	PostFactory.delete({id: id});
        	$scope.refresh();
        }
    };

 	$scope.refresh();
});

// Post form controller
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

// alert error message
var bootstrap_alert = function() {};
bootstrap_alert.warning = function(message) {
    $('#alert_placeholder').html('<div class="alert alert-danger" role="alert"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>');
}