var App = angular.module('MediaStoreUser',[], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

App.run(function($rootScope) {
    $rootScope.audio1 = '/audio/demo.mp3';
    $rootScope.audio1_title = "Nas Accident Murderer";
    $rootScope.audio1_poster = "/img/cover.jpg";
});