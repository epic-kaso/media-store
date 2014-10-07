var App = angular.module('MediaStoreUser',[], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

App.run(function($rootScope) {

});

App.factory('StripeService',function($http,$rootScope){
    var media_id = null;
    var handler = StripeCheckout.configure({
        key: 'pk_test_SZ0RjsZqGqvF3qKBOiWPF7Re',
        token: function(token) {
            $rootScope.$apply(function(){
                processPayment(token);
            });
        }
    });

    var processPayment = function(token){
        var url = '/buy/item/'+ media_id;
        var data = {
            stripeToken: token.id,
            stripeTokenType: 'card',
            stripeEmail: token.email
        };
        return createForm(url,data);
    };

    var createForm = function(url,data){
        var inputs = ' ';
        for (var key in data) {
            if (data.hasOwnProperty(key)) {
                inputs += "<input type='hidden' name='"+key+"' value='"+data[key]+"' />";
            }
        }
        var form =
            "<form action='"+url+"' id='stripeForm' method='POST'>" +
            inputs +
            "<input id='submit' value='submit' type='submit' />"+
            "</form>";
        $(form).appendTo('body');
        $('form#stripeForm input[type=submit]').click();
        $('form#stripeForm').remove();
    };

   return {
       buy: function(media){
           media_id = media.id;
           handler.open({
               name: 'MediaItem',
               description: 'buy '+media.title,
               amount: media.price,
               currency: 'ngn',
               image: media.poster //'/img/mediastore_logos/icon_128.png'
           });
       }
   }
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