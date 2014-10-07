App.directive('jplayer', function() {
    return {
        restrict: 'EA',
        template: '<div style="display: inline-block" ng-transclude></div><div class="me-j-player"></div>',
        transclude: true,
        scope: {
            audioObject: '='
        },
        link: function(scope, element, attrs) {
            var $control = element,
                $player = $control.find('div.me-j-player'),
                cls = 'span.pause',
                play = 'span.play';

            var updatePlayer = function() {
                $player.jPlayer({
                    // Flash fallback for outdated browser not supporting HTML5 audio/video tags
                    // http://jplayer.org/download/
                    swfPath: 'js/jplayer/',
                    supplied: 'mp3',
                    solution: 'html, flash',
                    preload: 'auto',
                    wmode: 'window',
                    ready: function () {
                        $player
                            .jPlayer("setMedia", {
                                mp3: scope.audioObject.url
                            })
                            .jPlayer(attrs.autoplay === 'true' ? 'play' : 'stop');
                    },
                    play: function() {
                        $control.find(play).hide();
                        $control.find(cls).show();
                        $control.addClass(cls);
                        $player.jPlayer('pauseOthers');
                    },
                    pause: function() {
                        $control.find(cls).hide();
                        $control.find(play).show();
                        $control.removeClass(cls);
                    },
                    stop: function() {
                        $control.find(cls).hide();
                        $control.find(play).show();
                        $control.removeClass(cls);
                    },
                    ended: function() {
                        $control.find(cls).hide();
                        $control.find(play).show();
                        $control.removeClass(cls);
                    }
                })
                    .end()
                    .unbind('click').click(function(e) {
                        $player.jPlayer($control.hasClass(cls) ? 'stop' : 'play');
                    });
            };

            scope.$watch('audioObject.url',function(n,o){
                console.log('Watch trigger');
                $player.jPlayer("destroy");
                updatePlayer();
            });
            updatePlayer();
        }
    };
});




/**
 * Created by kaso on 10/7/2014.
 */
App.directive('stripe', function(StripeService) {
        return {
            restrict: 'EA',
            scope: {
                'media': '='
            },
            link: function (scope, element, attrs) {
                element.bind('click', function(e) {
                    StripeService.buy({id: attrs.id,title: attrs.title,price: attrs.price,poster: attrs.poster});
                    e.preventDefault();
                });
            }
        };
    }
);