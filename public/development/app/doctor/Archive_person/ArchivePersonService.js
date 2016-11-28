angular
    .module('doctorApp')
    .service('archivePersonService', function($http, $q) {

        function getPersonInfo(id) {
            var defer=$q.defer();

            $http.get('api/doctor/getInpatientAllInfo/'+id)
                .success(function(patients) {
                    defer.resolve(patients);

                })
                .error(function(err) {
                    defer.reject(err);
                });
            console.log(defer.promise);
            return defer.promise;
        }

        return {
            getPersonInfo: getPersonInfo
        };

    });
