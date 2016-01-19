<?php
/**
 * Enqueue CSS
 */

if ( !function_exists('zero_stylesheets') ) :

  function zero_stylesheets() {

    wp_enqueue_style('main', get_template_directory_uri() . '/main.css', false, '');

  }//zero_stylesheets

endif;

add_action('wp_enqueue_scripts', 'zero_stylesheets');
