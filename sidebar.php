<?php
/**
 * @package WordPress
 * @subpackage ChandlerPain
**/
?>

<div class="large-3 small-4columns">
	<aside class="blog-sidebar" role="complimentary">
		<?php
		if(is_page()){
			dynamic_sidebar('sidebar');
		}else{
			dynamic_sidebar('blog-sidebar');
		}
		?>
	</aside>
</div>
