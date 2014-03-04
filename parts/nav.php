<?php
/**
 * @package WordPress
 * @subpackage ChandlerPain
**/
?>
<div class="small-12 columns sticky nopad" id="nav">
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
		'theme_location'  => 'menu-header',
		'menu'            => '',
		'container'       => '',
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'left',
		'echo'            => true,
		'depth'           => 0,
		'walker'          => new Foundation_Nav_Walker()
    );
    ?>


<nav class="top-bar" data-topbar>
	<ul class="title-area">
		<li class="name"></li>
		<li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
	</ul>

	<section class="top-bar-section">
		<?php wp_nav_menu( $defaults );?>
	</section>
</nav>



</div>