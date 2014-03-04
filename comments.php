<?php

/*
 * If the current post is protected by a password and the visitor has not yet
 * entered the password we will return early without loading the comments.
 */
if ( post_password_required() )
	return;
?>

<section id="comments" class="comments-area">

	<?php
	//this huge nasty thing is the actual comment form. Enjoy life brother.
	$commenter = wp_get_current_commenter();
	$req = get_option( 'require_name_email' );
	//what this is im not sure yet, http://codex.wordpress.org/Function_Reference/comment_form#.24args
	$aria_req = ( $req ? " aria-required='true'" : '' );
	$args = array( 
		'logged_in_as'=>'',
		'id_form' => 'commentform',
		'title_reply'=>'Post A Comment',
		'label_submit' =>  'SUBMIT',
		'comment_notes_before' => '',
    	'comment_notes_after'  => '',
		'comment_field' =>  '<div class="small-12 columns"><label for="comment">Comment<textarea name="comment" placeholder="What did you think about this post?"></textarea></label><div id="comment-error" class="error" role="alert"></div></div>',
	  	'fields' => apply_filters( 'comment_form_default_fields', array(
			    	'author' =>'<div class="small-6 columns"><label for="author">Name<input name="author" id="author" type="text" placeholder="Your name" /></label><div id="author-error" class="error" role="alert"></div></div>',
				    'email' =>'<div class="small-6 columns"><label for="email">Email<input name="email" id="email" type="text" placeholder="Your email" /></label><div id="email-error" class="error" role="alert"></div></div>',
				    'url' =>''
	  		)),
		);
	comment_form($args); 
	?>

	<?php if ( have_comments() ) : ?>

		<ul class="comment-list side-nav">
			<?php wp_list_comments( array(
		        'walker' => new ChandlerPainCommentWalker,
		        'style' => 'ul',
		        'callback' => null,
		        'end-callback' => null,
		        'type' => 'all',
		        'page' => null,
		    ) ); ?>
		</ul><!-- .comment-list -->

		<?php
			// Are there comments to navigate through?
			if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
		?>
		<nav class="navigation comment-navigation" role="navigation">
			<?php paginate_comments_links( ) ?>


			<?php /*if(get_previous_posts_link()){ ?>
				<div class="nav-previous"><?php previous_comments_link( '&rarr; Older Comments &rarr;' ); ?></div>
			<?php } ?>
			<?php if(get_next_posts_link()){ ?>
				<div class="nav-next"><?php next_comments_link( 'Newer Comments &rarr;' ); ?></div>
			<?php } */?>
		</nav><!-- .comment-navigation -->
		<?php endif; // Check for comment navigation ?>

		<?php if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="no-comments"><?php _e( 'Comments are closed.' , 'twentythirteen' ); ?></p>
		<?php endif; ?>

	<?php endif; // have_comments() ?>
</section><!-- #comments -->