<?php
/**
 * require different files - to increase readabiity
 * Comment the Function the you don't need
 */
require_once locate_template('/functions/zero_setup.php');        //Enable support for Post Thumbnails
require_once locate_template('/functions/head_cleanup.php');      //head cleanup (remove rsd, uri links, junk css, ect)
require_once locate_template('/functions/more_cleanup.php');      //more cleanup (remove rsd, uri links, junk css, ect)
require_once locate_template('/functions/enqueue_css.php');       //CSS
require_once locate_template('/functions/enqueue_scripts.php');   //JS
require_once locate_template('/functions/helpers.php');           //Helpers Functions

require_once locate_template('/functions/admin_menu_custom.php');   //Clean Up Dashboard
