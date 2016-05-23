<?php
/**
 * Clean-up
 */

if ( !function_exists('cleanup') ) :

	function cleanup() {


		function zero_filter_ptags_on_images($content){
    	return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
		}

		function remove_image_attributes( $html ) {
			$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
			return $html;
    }


		// Removes <p> wrapper from images
		add_filter( 'the_content', 'zero_filter_ptags_on_images', 10 );
		// This removes inline width/height from images
		add_filter( 'post_thumbnail_html', 'remove_image_attributes', 10 );
		add_filter( 'image_send_to_editor', 'remove_image_attributes', 10 );
		// Removes attached image sizes as well
		add_filter( 'the_content', 'remove_image_attributes', 10 );


	}//cleanup

endif;

add_action('after_setup_theme','cleanup');
