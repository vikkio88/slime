(
    function() {
        "use strict";
        var app_routes = angular.module("app.routes",
            [
                "ui.router",
                "ncy-angular-breadcrumb"
            ]
        );

        app_routes.config(
            [
                "$stateProvider",
                "$urlRouterProvider",
                "$locationProvider",
                function(
                    $stateProvider,
                    $urlRouterProvider,
                    $locationProvider
                )
                {
                    /*
                    Unfortunately laravel router makes this unable to work
                    $locationProvider.html5Mode({
                        enabled: true,
                        requireBase: false
                    });
                    */

                    //Hashbang
                    $locationProvider.hashPrefix("!");

                    $urlRouterProvider.otherwise("/ping");

                    $stateProvider
                    //Sections
                        .state("ping",
                            {
                                url:"/ping",
                                templateUrl: "app/views/sampleView.html",
                                controller: "SampleController as vm",
                                ncyBreadcrumb: {
                                    label: 'Ping'
                                }
                            }
                        );
                }]
        );

    }
)();