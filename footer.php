<?php
/**
 * @package WordPress
 * @subpackage ChandlerPain
**/
?>
</div>

	<div class="small-12 columns footer-content">
		<footer class="page-footer" role="contentinfo">
		<div class="medium-4 small-12 columns">
			<?php
				if ( dynamic_sidebar('footer-left') ) :
				else :
				?>
			<?php endif; ?>
		</div>
		<div class="medium-4 small-12 columns">
			<?php
				if ( dynamic_sidebar('footer-center') ) :
				else :
				?>
			<?php endif; ?>
		</div>
		<div class="medium-4 small-12 columns">
			<?php
				if ( dynamic_sidebar('footer-right') ) :
				else :
				?>
			<?php endif; ?>
		</div>
		</footer>

	</div>
	<div class="footer-fold small-12 columns">
	</div>
</section>
</div>

<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/foundation/foundation.topbar.js"></script>
<!-- Other JS plugins can be included here -->
<?php
$commentFormScript = '';
if ( is_user_logged_in() ) {
    $commentFormScript = get_template_directory_uri().'/js/usercommentform.js';
} else {
	$commentFormScript = get_template_directory_uri().'/js/commentform.js';
}
//gonna need this guy in a second here...

if(is_single()){
?>
<script src="<?php echo $commentFormScript; ?>"></script>

<?php
}
?>




<script>
$(document).foundation();
</script>

</body>
</html>