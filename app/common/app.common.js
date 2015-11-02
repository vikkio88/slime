/**
 * Created by vincenzo.ciaccio on 07/10/2015.
 */
(
    function() {
        "use strict";
        var common = angular.module("app.common",
            [
            ]
        );

        common.factory("Common",function(config,$http){
            return {
                isDebug: function(){
                    return config.env == "DEBUG";
                },
                Get : function(uri){
                    return  $http.get(config.apiUrl+uri);
                }
            }
        });

    }
)();