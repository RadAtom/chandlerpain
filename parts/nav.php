<?php
/**
 * @package WordPress
 * @subpackage ChandlerPain
**/
?>
<div class="contain-to-grid fixed" id="nav">
	<?php 
	/*
<nav class="top-bar" data-topbar>
	<ul class="title-area">
		<li class="name">
		</li>
		<li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
	</ul>

	<section class="top-bar-section">
		<!-- Right Nav Section -->
		<ul class="right">
			<li class="active"><a href="#">Right Button Active</a></li>
			<li class="has-dropdown">
				<a href="#">Right Button with Dropdown</a>
				<ul class="dropdown">
					<li><a href="#">First link in dropdown</a></li>
				</ul>
			</li>
		</ul>
	</section>

</nav>
	*/

    $defaults = array(
      'theme_location'  => 'main-menu',
      'menu'            => '',
      'container'       => 'nav',
      'container_class' => '',
      'container_id'    => '',
      'menu_class'      => 'button-group',
      'menu_id'         => '',
      'echo'            => true,
      'fallback_cb'     => 'wp_nav_menu',
      'before'          => '',
      'after'           => '',
      'link_before'     => '',
      'link_after'      => '',
      'items_wrap'      => '<ul class="%2$s" role="navigation">%3$s</ul>',
      'depth'           => 0,
      'walker'          => new foundation_walker()
    );

    wp_nav_menu( $defaults );

      ?>
</div>