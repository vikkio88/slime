(
    function() {
        "use strict";

        angular.module("paltamark")
            .controller(
                "SampleController",
                [
                    "Common",
                    "$scope",
                    "$stateParams",
                    SampleController
                ]);

        function SampleController(
            Common,
            $scope,
            $stateParams
        )
        {
            vm.stuff = null;

            Common.Get
            (
                "ping"
            ).then(
               function(data){
                    if(Common.isDebug()) console.log(data.data);
                    vm.stuff = data.data;
                },
                function(data){
                    console.log(data);
                }
            );
        }

    }
)();