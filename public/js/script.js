(function () {

    var adminApp = angular.module('AdminApp', ['ui.bootstrap']);

    adminApp.config(['$interpolateProvider', function ($interpolateProvider) {
        $interpolateProvider.startSymbol('{[');
        $interpolateProvider.endSymbol(']}');
    }]);


    // AdminTransactionController
    var AdminTransactionController = function($scope, $http) {

        $scope.transactions = [];

        var onComplete = function(response) {
            var length = response.data.length;

            for (var i = 0; i < length; i++) {
                response.data[i].created_at = new Date(response.data[i].created_at.replace(/-/g, "/"));
            }

            $scope.transactions = response.data;
        };

        $http.get('/admin/dashboard/get-all-transactions')
            .then(onComplete);
    };

    adminApp.controller('AdminTransactionController', ['$scope', '$http', AdminTransactionController]);


    // CinemaController
    var CinemaController = function($scope) {

        $scope.select_box = [];

        $scope.addSelect = function() {
            $scope.select_box.push({});
        };

        $scope.closeSelect = function(index) {
            $scope.select_box.splice(index, 1);
        }
    };

    adminApp.controller('CinemaController', ['$scope', CinemaController]);


    // MemberController
    var MemberController = function($scope, $http) {

        $scope.members = [];

        var onComplete = function(response) {
            var length = response.data.length;

            for (var i = 0; i < length; i++) {
                response.data[i].created_at = new Date(response.data[i].created_at.replace(/-/g, "/"));
            }

            $scope.members = response.data;
        };

        $http.get('/admin/dashboard/get-all-members')
            .then(onComplete);

    };

    adminApp.controller('MemberController', ['$scope', '$http', MemberController]);
}());
