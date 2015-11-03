var ctrls = angular.module('ctrls', ['ngRoute']);

ctrls.controller('booksCtrl', function ($scope, $http) {

    var update = function () {
        $http.get("/api/Book")
            .then(function (response) {
                $scope.books = response.data;

                $http.get("/api/Genre")
                    .then(function (response) {
                        $scope.genres = response.data;
                        for (i in $scope.books)
                            for (j in $scope.genres)
                                if ($scope.books[i].genre_id == $scope.genres[j].id)
                                    $scope.books[i].genre_name = $scope.genres[j].name;
                    });
            });
    };
    update();


    $scope.loadAuthor = function (id) {
        $http.post("api/Book/GetAuthors", {id: id})
            .then(function (response) {
                var res = "";
                var authors = response.data;
                for (i in authors)
                    res += authors[i].name + " " + authors[i].surname + ", ";
                res = res.substr(0, res.length - 2);
                if (res.length)
                    alert(res);
                else
                    alert("Current book has not authors.");

            });
    };

    $scope.addBook = function (name, genre_id) {
        $http.post("api/Book/Add", {name: name, genre_id: genre_id})
            .then(function () {
                update();
            });
    };

});