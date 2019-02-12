<?php
/*
Plugin Name: BYMF Image Copyright Shortcode
Plugin URI: http://www.bytemanufaktur.at
Description: Adds a shortcode to get the copyright information of a featured image of a page/post
Version: 1.0
Author: Paul Csokay - bytemanufaktur
Author URI: http://www.bytemanufaktur.at
License: GPL2
*/

function bymf_imgcopyright_init() {
	// siehe https://developer.wordpress.org/plugins/shortcodes/basic-shortcodes/

	// Add Shortcode
	function bymf_getimgcopyright( $atts = [], $content = null ) {


		if ( has_post_thumbnail() ) {
			$imageID = get_post_thumbnail_id( get_the_ID() );

			$meta = get_metadata( 'post', $imageID, '_avia_attachment_copyright', true );

			if ( $meta ) {
				$content .= esc_html($meta);
			}
		}


		return $content;

	}

	add_shortcode( 'bymf_imgcopyright', 'bymf_getimgcopyright' );
}

add_action( 'init', 'bymf_imgcopyright_init' );
