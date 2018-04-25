var vivoPlayer;
jQuery(document).ready(function ($) {
    $('.slick-slider').each(function () {
        $(this).slick({
            autoplay: true,
            dots: true,
            infinite: true,
            speed: 1500,
            slidesToShow: $(this).data('slides'),
            slidesToScroll: $(this).data('scroll'),
            adaptiveHeight: true,
            pauseOnHover: true,
            responsive: [
                {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: true
                    }
                }
                // You can unslick at a given breakpoint now by adding:
                // settings: "unslick"
                // instead of a settings object
            ]
        });
    });
    $('.fancybox').fancybox();
    if ($('#main').hasClass('programacion')) {
        $('ul.programas').hide();
        ordenarProgramas($);
        activarProgramacion($);
    }
    playVivo($);
});
function playVivo($) {    
    var vivoPlayer = $("#jquery_jplayer_1");

	var playerStatus = {
		status: 'stopped'
	};

	var playHandler = function(event) {
		playerStatus.status = 'playing';
		console.log('playing....');
		$('.vivo_controls').addClass('playing');
	};

	var stopHandler = function(event) {
		playerStatus.status = 'stopped';
		console.log('paused/stopped....');
		$('.vivo_controls').removeClass('playing');
	};

	var errorHandler = function(event) {
		if (playerStatus.status == 'playing') {
			vivoPlayer.jPlayer('play');
		} else {
			vivoPlayer.jPlayer('stop');
		}
	};

    vivoPlayer.jPlayer({
        ready: function (event) {
        },

	playing: function(event) {
		playHandler(event);
	},
	pause: function(event) {
		stopHandler(event);
	},

	ended: function(event) {
		console.log('ended....');
		errorHandler(event);
	},
	error: function(event) {
		console.log('error....');
		errorHandler(event);
	},
	stalled: function(event) {
		console.log('stalled....');
	},

        swfPath: $("#jquery_jplayer_1").data('swf'),
	preload: 'none',
        supplied: "mp3",
        wmode: "window",
        solution: "html,flash",
        loop: false,
    });
    $('#escuchanosVivo .play').click(function(e){
        e.preventDefault();
        // $(this).parent('.vivo_controls').addClass('playing');
        vivoPlayer.jPlayer("setMedia", {
	    mp3: "http://streamer.fmfutura.com.ar:8000/vivo.mp3",
        });
        vivoPlayer.jPlayer('play');
    });
    $('#escuchanosVivo .pause').click(function(e){
        e.preventDefault();
        // $(this).parent('.vivo_controls').removeClass('playing');
	playerStatus.status = 'stopped';
        vivoPlayer.jPlayer('stop');
    });
}

function ordenarProgramas($) {
    $('#listado_programas > li').each(function () {
        var programa = $(this);
        var dias = $(this).data('dia').split(',');
        $.each(dias, function (index, value) {
	    if (!value) {
	        return;
	    }
            $('.programas[data-dia=' + value + ']').append(programa.clone());
        });
    });
}
function activarProgramacion($) {
    $('#main.programacion .programas > li[data-content=1] header').click(function (e) {
        e.preventDefault();
        if ($(this).closest('li').hasClass('active')) {
            $('#main.programacion .programas > li').removeClass('active');
        } else {
            $('#main.programacion .programas > li').removeClass('active');
            $(this).parent('li').addClass('active');
        }
    });
    $('#main.programacion .semana li').click(function () {
        var dia = $(this).data('dia');
        $('ul.programas').hide();
        $('ul.programas[data-dia=' + dia + ']').show();
    });
    $('ul.programas[data-dia=1]').show();
}
