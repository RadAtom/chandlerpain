<?php
/**
 * @package WordPress
 * @subpackage ChandlerPain
**/
?>
</div>

	<div class="small-12 columns">
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
</section>
</div>

</body>
</html>