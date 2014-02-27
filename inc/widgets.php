<?php

function my_widgets_init() {
	register_sidebar(array(
	'name' => __( 'Main Sidebar' ),
	'id' => 'sidebar',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5>',
	'after_title' => '</h5>',
	));

	register_sidebar(array(
	'name' => __( 'Footer Left' ),
	'id' => 'footer-left',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5>',
	'after_title' => '</h5>',
	));

	register_sidebar(array(
	'name' => __( 'Footer Center' ),
	'id' => 'footer-center',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5>',
	'after_title' => '</h5>',
	));

	register_sidebar(array(
	'name' => __( 'Footer Right' ),
	'id' => 'footer-right',
	'before_widget' => '',
	'after_widget' => '',
	'before_title' => '<h5>',
	'after_title' => '</h5>',
	));
}
add_action( 'init', 'my_widgets_init' );