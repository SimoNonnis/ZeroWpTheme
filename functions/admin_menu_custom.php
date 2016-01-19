<?php
/**
 * Clean Up Dashboard
 */



// if( function_exists('acf_add_options_page') ) {
  
//  acf_add_options_page(); //Adding Option Page ACF5PRO
  
// }


if (!function_exists('remove_menus')) :
  function remove_menus() {
    remove_menu_page( 'edit-comments.php' );          //Removing Comments
  }

endif;

add_action( 'admin_menu', 'remove_menus' );





if (!function_exists('remove_sub_menu_pages')) :
  function remove_sub_menu_pages() {
    remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' ); //Removing Tags

    remove_submenu_page( 'themes.php', 'customize.php' );                 //Removing Theme Customize
    remove_submenu_page( 'themes.php', 'theme-editor.php' );              //Removing Theme Editor

    remove_submenu_page('plugins.php', 'plugin-editor.php' );             //Removing Plugin Editor
  }

endif;

add_action('admin_init', 'remove_sub_menu_pages', 102);





//change the footer text on Dashboard
if (!function_exists('zero_admin_footer_text')) :
  function zero_admin_footer_text () {
    echo 'Thank you for creating with <a href="http://ignitehospitality.com/" target="_blank">Ignitehospitality</a>.';
  }

endif;

add_filter( 'admin_footer_text', 'zero_admin_footer_text' );





//change the footer text on Dashboard
if (!function_exists('zero_admin_bar')) :
  function zero_admin_bar() {
    global $wp_admin_bar;
 
    // To remove WordPress logo and related submenu items
    $wp_admin_bar->remove_menu('wp-logo');
    $wp_admin_bar->remove_menu('about');
    $wp_admin_bar->remove_menu('wporg');
    $wp_admin_bar->remove_menu('documentation');
    $wp_admin_bar->remove_menu('support-forums');
    $wp_admin_bar->remove_menu('feedback');
 
    // To remove Comments Icon/Menu
    $wp_admin_bar->remove_menu('comments');
  }

endif;

add_action( 'wp_before_admin_bar_render', 'zero_admin_bar' );





//hide content editor for specific pages
if (!function_exists('hide_editor')) :
  function hide_editor() {

    // Get the Post ID.
    if ( isset ( $_GET['post'] ) )
    $post_id = $_GET['post'];
    else if ( isset ( $_POST['post_ID'] ) )
    $post_id = $_POST['post_ID'];

    if( !isset ( $post_id ) || empty ( $post_id ) )
       return;

    // Get the name of the Page Template file.
    $template_file = get_post_meta($post_id, '_wp_page_template', true);

    if(
      
      $template_file == 'front-page.php'
      //Hide text editor depends on template file           

    ) { 
        remove_post_type_support('page', 'editor');
    }

  }

endif;

add_filter( 'admin_head', 'hide_editor' );
