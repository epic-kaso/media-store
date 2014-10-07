var App = angular.module('MediaStoreUser',[], function($interpolateProvider) {
    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');
});

App.constant('StripKey',window.mediastore.stripe_key);
App.constant('StripeBaseURL',window.mediastore.stripe_base_url);

App.run(function($rootScope) {

});

App.factory('StripeService',function($http,$rootScope,StripKey,StripeBaseURL){
    var media_id = null;
    var handler = StripeCheckout.configure({
        key: StripKey,
        token: function(token) {
            $rootScope.$apply(function(){
                processPayment(token);
            });
        }
    });

    var processPayment = function(token){
        var url = StripeBaseURL + media_id;
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
               name: media.title,
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
    $scope.audio.title = "No item selected";
    $scope.audio.poster = "/img/media_missing.png";

    $scope.play = function(media_url,title,poster){
        $scope.audio.url = media_url;
        $scope.audio.title = title;
        $scope.audio.poster = poster;
        console.log('Play called with '+media_url);
    }
});