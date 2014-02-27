<?php
/**
 * @package WordPress
 * @subpackage ChandlerPain
**/

class foundation_walker extends Walker_Nav_Menu{

  function start_el(&$output, $item, $depth, $args){

    global $wp_query;
    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    $class_names = $value = '';

    $classes = empty( $item->classes ) ? array() : (array) $item->classes;

    $current_indicators = array('current-menu-item', 'current-menu-parent', 'current_page_item', 'current_page_parent');

    $newClasses = array('button');

    foreach($classes as $el){
      //add button class and check if it's indicating the current page.
      if (in_array($el, $current_indicators)){
        array_push($newClasses, $el);
      }
    }

    $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $newClasses), $item ) );
    if($class_names!='') $class_names = ' class="'. esc_attr( $class_names ) . '"';


    $output .= $indent . '<li>';

    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';


    $item_output = $args->before;
    $item_output .= '<a'. $attributes . $class_names .'>';
    $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}