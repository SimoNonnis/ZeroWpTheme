<?php
/**
 * Clean-up
 */

if ( !function_exists('cleanup') ) :

	function cleanup() {

		// Removes <p> wrapper from images
		function zero_filter_ptags_on_images($content){
    	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
		}

		// This removes inline width/height from images
		function remove_thumbnail_dimensions( $html ) {
    		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    		return $html;
		}

		add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10 );
		add_filter( 'image_send_to_editor', 'remove_thumbnail_dimensions', 10 );
		// Removes attached image sizes as well
		add_filter( 'the_content', 'zero_filter_ptags_on_images', 10 );


	}//cleanup

endif;

add_action('after_setup_theme','cleanup');
