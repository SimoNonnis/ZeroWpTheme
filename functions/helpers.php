<?php
/**
 * Helpers functions
 */

if ( !function_exists('zero_helpers') ) : 

  function zero_helpers() {

    function is_subpage() {
      global $post;                               // load details about this page

      if ( is_page() && $post->post_parent ) {    // test to see if the page has a parent
          return $post->post_parent;              // return the ID of the parent post

      } else {                                    // there is no parent so ...
          return false;                           // ... the answer to the question is false
      }
    }

    
    function get_excerpt($count){ // Excerpt Lenght - amount of characters not words like the default from WP 
      global $post;
      $permalink = get_permalink($post->ID);
      $excerpt = get_the_content();
      $excerpt = strip_tags($excerpt);
      $excerpt = substr($excerpt, 0, $count);
      $excerpt = substr($excerpt, 0, strripos($excerpt, " ")); //Strips out words that will be truncated, comment if y don't care!
      $excerpt = $excerpt.'... <a class="excerpt-read-more" href="'.$permalink.'">Read more &raquo;</a>';
      return $excerpt;
    }
    
    add_filter( 'excerpt_length', 'get_excerpt', 999 );

  }//zero_helpers

endif;

add_action('after_setup_theme','zero_helpers');