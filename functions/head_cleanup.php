<?php
/**
 * Clean up the HEAD
 */

if ( !function_exists('zero_head_cleanup') ) :

  function zero_head_cleanup() {
    // EditURI link
    remove_action( 'wp_head', 'rsd_link' );
    // windows live writer
    remove_action( 'wp_head', 'wlwmanifest_link' );
    // index link
    remove_action( 'wp_head', 'index_rel_link' );
    // previous link
    remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
    // start link
    remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
    // links for adjacent posts
    remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
    // WP version
    remove_action( 'wp_head', 'wp_generator' );
    // remove WP version from css
    add_filter( 'style_loader_src', 'zero_remove_wp_ver_css_js', 9999 );
    // remove Wp version from scripts
    add_filter( 'script_loader_src', 'zero_remove_wp_ver_css_js', 9999 );
    // category feeds
    remove_action( 'wp_head', 'feed_links_extra', 3 );
    // post and comment feeds
    remove_action( 'wp_head', 'feed_links', 2 );


    // remove WP version from css and scripts
    function zero_remove_wp_ver_css_js( $src ) {
      if ( strpos( $src, 'ver=' ) )
        $src = remove_query_arg( 'ver', $src );
      return $src;
    }
    
  }//zero_head_cleanup

endif;

// launching operation cleanup
add_action( 'init', 'zero_head_cleanup' );