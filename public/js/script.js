(function () {

    var adminApp = angular.module('AdminApp', []);

    adminApp.config(['$interpolateProvider', function ($interpolateProvider) {
        $interpolateProvider.startSymbol('{[');
        $interpolateProvider.endSymbol(']}');
    }]);

    var AdminTransactionController = function($scope, $http) {

        $scope.transactions = [];

        var onComplete = function(response) {
            $scope.transactions = response.data;
        };

        $http.get('/admin/dashboard/get-all-transactions')
            .then(onComplete);
    };

    adminApp.controller('AdminTransactionController', ['$scope', '$http', AdminTransactionController]);

}());
