<?php
/**
 * @package WordPress
 * @subpackage ChandlerPain
**/
get_header(); 
get_sidebar();
?>


<div class="large-9 medium-8 small-12 columns">
<section class="content page-blog landing" role="main">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article class="">
		<header class="post-header">
			<h1><?php the_title(); ?></h1>
			<span class="date-time">
				<time pubdate>
					Posted On <?php the_date(); ?>
				</time>
			</span>
		</header>
		<?php the_content(); ?>

		<footer class="post-footer">
				<?php comments_popup_link( '<span class="leave-reply">' .'comment' . '</span>','<span class="leave-reply">' .'comment' . '</span>','<span class="leave-reply">' .'comment' . '</span>'); ?>
		</footer>
		<?php comments_template(); ?>
	</article>
<?php
endwhile;
endif;
?>
</section>
</div>

<?php 

get_footer(); 
?>