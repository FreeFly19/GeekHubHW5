var app = angular.module('app', ['ctrls', 'ngRoute']);

app.config(function ($routeProvider, $locationProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'templates/main.html'
        })
        .when('/books', {
            templateUrl: 'templates/books/Index.html',
            controller: 'booksCtrl'
        })
        .when('/authors', {
            templateUrl: 'templates/authors/Index.html'
        })
        .when('/genres', {
            templateUrl: 'templates/genres/Index.html'
        })
        .otherwise({
            redirectTo: '/404'
        });
    $locationProvider.html5Mode(true);
});