<?php
function shortcode_audio ($atts) {
    $a = shortcode_atts(array(
        'mp3' => '',
        'ogg' => '',
        'type' => 'small',
        'color' => 'violet'
    ), $atts);
    if($a['mp3']!=''){
        include('widgets/audioPlayer/audioPlayer.php');
        return ob_get_clean();
    }
}

add_shortcode( 'reproductoraudio', 'shortcode_audio' );

