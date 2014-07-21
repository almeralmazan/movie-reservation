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
}());
