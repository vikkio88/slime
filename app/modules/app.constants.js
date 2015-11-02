(
    function() {
        "use strict";
        var app_constants = angular.module("app.constant",
            [
            ]
        );

        app_constants.constant('config', {
            apiUrl: "http://127.0.0.1:8080/api/", //dont forget to set this up
            env: "DEBUG"
        });

    }
)();