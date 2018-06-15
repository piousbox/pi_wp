<?php
/**
 * Plugin Name: Piousbox Wordpress Plugin
 */
//[foobar]
function foobar_func( $atts ){
	return "foo and bar";
}
add_shortcode( 'foobar', 'foobar_func' );

