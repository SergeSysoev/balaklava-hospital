angular
    .module('authApp')
    .service('RegisterService', function($http, $sessionStorage, $window, $q) {

        function registration(info) {
            var defer=$q.defer();

            $http.post("api/register", info)
                .success(function (answ) {
                    defer.resolve(answ);
                }).error(function(err) {
                defer.reject(err);
            });
            return defer.promise;
        }

        return {
            registration: registration
        };

    });