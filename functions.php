<?php
/**
 * @package WordPress
 * @subpackage ChandlerPain
**/

require_once('inc/menus.php');
require_once('inc/nav-walker.php');
require_once('inc/widgets.php');

//just a little dev trick that I use to make things simpler when using Foundation CSS
function my_filter_head() {
	remove_action('wp_head', '_admin_bar_bump_cb');
}

add_action('get_header', 'my_filter_head');

//so we can have some featured images
add_theme_support( 'post-thumbnails', array( 'page','post', 'twelveonefive_about', 'twelveonefive_home' ) );

//keeping the generator tag hidden like a silly man
remove_action('wp_head', 'wp_generator');

function new_excerpt_more( $more ) {
    global $post;
  return  '... <div class="read-more"><a class="moretag" href="'. get_permalink($post->ID) . '" title="Read More of '. get_the_title($post->ID) . '">keep reading</a></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');