<?php
/**
 * @package WordPress
 * @subpackage ChandlerPain
**/

function register_my_menus() {
  register_nav_menus(
    array(
      'menu-header' => __( 'Header Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );