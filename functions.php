<?php
/**
 * @package WordPress
 * @subpackage ChandlerPain
**/

require_once('inc/menus.php');
require_once('inc/widgets.php');


//so we can have some featured images
add_theme_support( 'post-thumbnails', array( 'page','post') );

//keeping the generator tag hidden like a silly man
remove_action('wp_head', 'wp_generator');
