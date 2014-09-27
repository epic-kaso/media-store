var App = angular.module('MediaStoreUser',[], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

App.run(function($rootScope) {

});

App.controller('MediaController',function($scope){
    $scope.audio = {};
    $scope.audio.url = '/audio/';
    $scope.audio.title = "--";
    $scope.audio.poster = "/img/cover.jpg";

    $scope.play = function(media_url,title,poster){
        $scope.audio.url = media_url;
        $scope.audio.title = title;
        $scope.audio.poster = poster;
        console.log('Play called with '+media_url);
    }
});