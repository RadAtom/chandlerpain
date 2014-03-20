<?php
/**
 * @package WordPress
 * @subpackage ChandlerPain
**/

require_once('inc/menus.php');
require_once('inc/widgets.php');
require_once('inc/nav-walker.php');
require_once('inc/comments-walker.php');
require_once('inc/headercta.php');


//so we can have some featured images
add_theme_support( 'post-thumbnails', array( 'page','post') );

//keeping the generator tag hidden like a silly man
remove_action('wp_head', 'wp_generator');


// Remove Width and Height Attributes
function remove_width_attribute( $html ) {
   $html = preg_replace( '/(width|height)="\d*"\s/', "", $html );
   return $html;
}
add_filter( 'post_thumbnail_html', 'remove_width_attribute', 10 );
add_filter( 'image_send_to_editor', 'remove_width_attribute', 10 );


function custom_excerpt_length( $length ) {
    return 100; //Change this number to any integer you like.
}
add_filter( 'excerpt_length', 'custom_excerpt_length' );

function new_excerpt_more( $more ) {
    global $post;
  return  '... <div class="read-more"><a class="moretag" href="'. get_permalink($post->ID) . '" title="Read More of '. get_the_title($post->ID) . '">keep reading</a></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');
