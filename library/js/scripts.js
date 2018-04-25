// as the page loads, call these scripts
jQuery(document).ready(function ($) {

    var imgSizer = {Config: {imgCache: [], spacer: "/path/to/your/spacer.gif"}, collate: function (aScope) {
            var isOldIE = (document.all && !window.opera && !window.XDomainRequest) ? 1 : 0;
            if (isOldIE && document.getElementsByTagName) {
                var c = imgSizer;
                var imgCache = c.Config.imgCache;
                var images = (aScope && aScope.length) ? aScope : document.getElementsByTagName("img");
                for (var i = 0; i < images.length; i++) {
                    images[i].origWidth = images[i].offsetWidth;
                    images[i].origHeight = images[i].offsetHeight;
                    imgCache.push(images[i]);
                    c.ieAlpha(images[i]);
                    images[i].style.width = "100%";
                }
                if (imgCache.length) {
                    c.resize(function () {
                        for (var i = 0; i < imgCache.length; i++) {
                            var ratio = (imgCache[i].offsetWidth / imgCache[i].origWidth);
                            imgCache[i].style.height = (imgCache[i].origHeight * ratio) + "px";
                        }
                    });
                }
            }
        }, ieAlpha: function (img) {
            var c = imgSizer;
            if (img.oldSrc) {
                img.src = img.oldSrc;
            }
            var src = img.src;
            img.style.width = img.offsetWidth + "px";
            img.style.height = img.offsetHeight + "px";
            img.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" + src + "', sizingMethod='scale')"
            img.oldSrc = src;
            img.src = c.Config.spacer;
        }, resize: function (func) {
            var oldonresize = window.onresize;
            if (typeof window.onresize != 'function') {
                window.onresize = func;
            } else {
                window.onresize = function () {
                    if (oldonresize) {
                        oldonresize();
                    }
                    func();
                }
            }
        }}
    jQuery('.audioPlayer').each(function () {
        audioPlayer(jQuery(this));
    });
// add twitter bootstrap classes and color based on how many times tag is used
    function addTwitterBSClass(thisObj) {
        var title = $(thisObj).attr('title');
        if (title) {
            var titles = title.split(' ');
            if (titles[0]) {
                var num = parseInt(titles[0]);
                if (num > 0)
                    $(thisObj).addClass('label');
                if (num == 2)
                    $(thisObj).addClass('label label-info');
                if (num > 2 && num < 4)
                    $(thisObj).addClass('label label-success');
                if (num >= 5 && num < 10)
                    $(thisObj).addClass('label label-warning');
                if (num >= 10)
                    $(thisObj).addClass('label label-important');
            }
        }
        else
            $(thisObj).addClass('label');
        return true;
    }



    // modify tag cloud links to match up with twitter bootstrap
    $("#tag-cloud a").each(function () {
        addTwitterBSClass(this);
        return true;
    });

    $("p.tags a").each(function () {
        addTwitterBSClass(this);
        return true;
    });

    $("ol.commentlist a.comment-reply-link").each(function () {
        $(this).addClass('btn btn-success btn-mini');
        return true;
    });

    $('#cancel-comment-reply-link').each(function () {
        $(this).addClass('btn btn-danger btn-mini');
        return true;
    });

    $('article.post').hover(function () {
        $('a.edit-post').show();
    }, function () {
        $('a.edit-post').hide();
    });

    // Input placeholder text fix for IE
    $('[placeholder]').focus(function () {
        var input = $(this);
        if (input.val() == input.attr('placeholder')) {
            input.val('');
            input.removeClass('placeholder');
        }
    }).blur(function () {
        var input = $(this);
        if (input.val() == '' || input.val() == input.attr('placeholder')) {
            input.addClass('placeholder');
            input.val(input.attr('placeholder'));
        }
    }).blur();

    // Prevent submission of empty form
    $('[placeholder]').parents('form').submit(function () {
        $(this).find('[placeholder]').each(function () {
            var input = $(this);
            if (input.val() == input.attr('placeholder')) {
                input.val('');
            }
        })
    });

    $('#s').focus(function () {
        if ($(window).width() < 940) {
            $(this).animate({width: '200px'});
        }
    });

    $('#s').blur(function () {
        if ($(window).width() < 940) {
            $(this).animate({width: '100px'});
        }
    });

    $('.alert-message').alert();

    $('.dropdown-toggle').dropdown();

}); /* end of as page load scripts */

function audioPlayer($player) {

    var container = $player;
    var play = container.find('.mdi-play-circle-outline');
    var pause = container.find('.mdi-pause-circle-outline');
    var mute = container.find('.mdi-volume-high');
    var muted = container.find('.mdi-volume-off');
    var volume = container.find('.volumen .input_container input');
    var seek = container.find('.controls_container.track input');
    var song = new Audio();
    var duration = song.duration;

    song.preload = 'none';
    if (song.canPlayType('audio/mpeg;')) {
        song.type = 'audio/mpeg';
        song.src = container.data('audio-mp3');
    } else {
        song.type = 'audio/ogg';
        song.src = container.data('audio-ogg');
    }


    jQuery(song).on('loadeddata', function () {
        duration = song.duration;

        song.addEventListener('timeupdate', function () {
            var curtime = parseInt(song.currentTime, 10);
            seek.val(curtime);
        });
        /******************** SEEK ********************/
        seek.bind('mousedown', function () {
            song.removeEventListener('timeupdate');
            console.log('mousedown');
        });
        seek.bind('mouseup', function () {
            song.addEventListener('timeupdate', function () {
                var curtime = parseInt(song.currentTime, 10);
                seek.val(curtime);
            });
            console.log('mouseup');
        });
        seek.bind("change", function () {
            if (jQuery(this).val() >= song.buffered.end(0)) {
                song.currentTime = song.buffered.end(0);
                jQuery(this).val(song.buffered.end(0));
            } else {
                song.currentTime = parseInt(jQuery(this).val(), 10);
            }
            seek.attr("max", duration);
        });
        /******************** SEEK ********************/
    });

    /******************** PLAY ********************/
    play.on('click', function (e) {
        e.preventDefault();
        audioTest = song;
        song.play();
        seek.attr('max', duration);
        volume.attr('max', 100);
        jQuery(this).parent('.mdi-container').addClass('active');
    });
    /******************** PAUSE ********************/
    pause.on('click', function (e) {
        e.preventDefault();
        song.pause();
        jQuery(this).parent('.mdi-container').removeClass('active');
    });
    /******************** PAUSE ********************/
    /******************** MUTE ********************/
    mute.on('click', function (e) {
        e.preventDefault();
        song.volume = 0;
        jQuery(this).parent('.mdi-container').addClass('muted');
    });
    muted.on('click', function (e) {
        e.preventDefault();
        song.volume = 1;
        jQuery(this).parent('.mdi-container').removeClass('muted');
    });
    /******************** MUTE ********************/

    volume.bind("change", function () {
        song.volume = jQuery(this).val() / 100;
        volume.attr("max", 100);
    })
}
