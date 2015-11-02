(
    function() {
        "use strict";
        var directives = angular.module("app.directives",
            [
            ]
        );

        //Utils
        directives.directive('pagination',function(){
            return{
                restrict: 'AE',
                replace: false,
                templateUrl: 'app/views/common/pagination.html'
            }
        });

        directives.directive('textfilterfull',function(){
            return{
                restrict: 'AE',
                replace: false,
                templateUrl: 'app/views/common/textfilterfull.html'
            }
        });

        directives.directive('roundimagesample',function(){
            return{
                rescrict: 'AE',
                replace:false,
                templateUrl: 'app/views/common/roundimagesample.html'
            }
        });


        //test one
        directives.directive('jumbosample',function(){
            return{
                restrict: 'AE',
                replace: true,
                templateUrl: 'app/test/test.html'
            }
        })
    }
)();