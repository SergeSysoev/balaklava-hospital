angular
    .module('doctorApp')
    .service('ArchiveService', function($http, $q) {

        function getArchivePeople() {
            var defer=$q.defer();

            $http.get('api/doctor/archive')
                .success(function(patients) {
                    defer.resolve(patients);

                })
                .error(function(err) {
                    defer.reject(err);
                });
            return defer.promise;
        }

        function filtering(filter_info) {
            var defer=$q.defer();

            $http({method:'GET', url:'api/doctor/archive', params: filter_info})
                .success(function(response) {
                    defer.resolve(response);
                })
                .error(function(err) {
                    defer.reject(err);
                });

            return defer.promise;
        }

        return {
            getArchivePeople: getArchivePeople,
            filtering: filtering
        };

    });

