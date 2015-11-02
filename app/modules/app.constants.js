(
    function() {
        "use strict";
        var app_constants = angular.module("app.constant",
            [
            ]
        );

        app_constants.constant('config', {
            apiUrl: "http://127.0.0.1:8000/api/",
            env: "DEBUG"
        });

    }
)();