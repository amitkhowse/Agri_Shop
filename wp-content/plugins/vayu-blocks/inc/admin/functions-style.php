<?php

function vayu_enqueue_google_fonts($font_family_string)
{
    $font_families = explode(',', $font_family_string);
    $font_family_string = str_replace(' ', '+', implode('|', $font_families));
    wp_enqueue_style('th-blocks-google-fonts-' . $font_family_string, "https://fonts.googleapis.com/css?family=$font_family_string&display=swap", array(), null);
}


function vayu_hex2rgba( $color, $opacity = false ) {

$default = 'rgb(0,0,0)';

if ( empty( $color ) ) {
    return $default;
}

if ( '#' == $color[0] ) {
    $color = substr( $color, 1 );
}

if ( strlen( $color ) == 6 ) {
    $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
} elseif ( strlen( $color ) == 3 ) {
    $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
} else {
    return $default;
}

$rgb = array_map( 'hexdec', $hex );


if ( $opacity >= 0 ) {

    $opacity = $opacity / 100;
    
    $output = 'rgba( ' . implode( ',', $rgb ) . ',' . $opacity . ' )';

} else {

    $output = 'rgb( ' . implode( ',', $rgb ) . ' )';

}

return $output;
}