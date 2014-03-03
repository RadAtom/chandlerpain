<?php
/**
 * @package WordPress
 * @subpackage ChandlerPain
**/
get_header(); 
?>

<div class="large-9 small-8 columns">
<section class="content page-blog landing" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article class="">

		<?php 
		the_content(); 

		?>
	</article>
<?php
endwhile;
endif;
?>
</section>
</div>

<?php 
get_sidebar();
get_footer(); 
?>
