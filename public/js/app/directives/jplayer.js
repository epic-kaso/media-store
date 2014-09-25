App.directive('jplayer', function() {
    return {
        restrict: 'EA',
        template: '<div><span class="fa fa-play play"></span>' +
        '<span class="fa fa-pause pause"></span><div class="me-j-player"></div></div>',
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
                                mp3: scope.$eval(attrs.audio)
                            })
                            .jPlayer(attrs.autoplay === 'true' ? 'play' : 'stop');
                    },
                    play: function() {
                        $control.find(play).hide();
                        $control.find(cls).show();
                        $control.addClass(cls);
                        if (attrs.pauseothers === 'true') {
                            $player.jPlayer('pauseOthers');
                        }
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

            scope.$watch(attrs.audio, updatePlayer);
            updatePlayer();
        }
    };
});