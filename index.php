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
			<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
			<span class="date-time">
				<time pubdate>
					Posted On<?php the_date(); ?>
				</time>
			</span>
		</header>

		<?php 
		the_excerpt(); 

		?> 
		<footer class="post-footer small-12 columns ">
			<?php comments_popup_link( '<span class="leave-reply right">' .'comment' . '</span>','<span class="leave-reply right">' .'comment' . '</span>','<span class="leave-reply right">' .'comment' . '</span>'); ?>
		</footer>
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