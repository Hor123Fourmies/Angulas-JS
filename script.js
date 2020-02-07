//"ngRoute" = chargement du pluggin
var app = angular.module("monAppli", ["ngRoute"]);

app.config(
    function ($routeProvider) {
        // route d'accueil :
        $routeProvider.when("/",
            {templateUrl: "home.html"}
        )
            // le '.' correspond au chainage en Javascript, on peut enchaîner les instructions
            .when("/films",
                {
                    templateUrl: "films.html",
                    controller: "monControlleur2"
                })
            .when("/livres",
                {
                    templateUrl: "livres.html",
                    controller: "livresControlleur"

                })
            .when("/jeuxvideo",
                {
                    templateUrl: "jeuxvideo.html",
                    controller: "jeuxControlleur"

                })

    }
);

app.controller('monControlleur', function ($scope) {
    $scope.film1 = "The big Lebowsky";
    $scope.film2 = "Fargo";
});

app.controller('monControlleur2', function ($scope, $http) {
    $scope.films = ["Dans ses yeux", "Incendie", "Pretty Woman", "Dirty Dancing", "Tomorrow never die", "Gladiator"];
    $scope.ajouterFilm = function () {
        $scope.films.push($scope.ajoutFilm);

        $http({
            method:"POST",
            url:"test.php",
            data:{nouveauFilm : $scope.ajoutFilm}
        }).then(function Success(response){ alert (response.data);},
            function Error (response) { alert(response.statusText);
            });
    };
});

app.controller('livresControlleur', function ($scope, $http) {
    $scope.livres = ["Harry Potter et l'école des sorciers", "Les Trois Mousquetaires", "Rebecca", "Le Mystère de la chambre jaune",];
    $scope.ajouterLivre = function () {
        $scope.livres.push($scope.ajoutLivre);

        $http({
            method:"POST",
            url:"testLivres.php",
            data:{nouveauLivre : $scope.ajoutLivre}
        }).then(function Success(response){ alert (response.data);},
            function Error (response) { alert(response.statusText);
            });
    };
});


app.controller('jeuxControlleur', function ($scope, $http) {
    $scope.jeux = ["Mario", "Lara Croft"];
    $scope.ajouterJeu = function () {
        $scope.jeux.push($scope.ajoutJeu);

        $http({
            method:"POST",
            url:"testJeuxvideo.php",
            data:{nouveauJeu : $scope.ajoutJeu}
        }).then(function Success(response){ alert (response.data);},
            function Error (response) { alert(response.statusText);
            });
    };
});