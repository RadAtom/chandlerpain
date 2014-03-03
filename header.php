<?php
/**
 * @package WordPress
 * @subpackage ChandlerPain
**/

//Version for Cache Busting
$theme_ver = "?ver=0.0.1";

?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8" />
 	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><?php
	/*
	* Print the <title> tag based on what is being viewed.
	*/
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
	echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
	echo ' | ' . sprintf( __( 'Page %s', 'chandlerpainclinic' ), max( $paged, $page ) );

	?></title>
	<?php //STYLES ?>
	<link rel="stylesheet" media="all" href="<?php echo get_template_directory_uri(); ?>/css/foundation.css" />

	<link rel="stylesheet" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?><?php echo $theme_ver; ?>" />

	<script src="<?php echo get_template_directory_uri(); ?>/js/modernizr.custom.93701.js<?php echo $theme_ver; ?>"></script>

	<?php wp_head(); //WP HEAD ?>

	<?php //Rel Canonical
	echo '<link rel="canonical" href="' . get_permalink() . '" />';//Canonical Links ?>

	<?php //RSS ?>
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />

	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />


</head>
<body <?php body_class(); ?>>

<?php
	// Add Microdata for Blog Post Pages
	if (is_single()) {
		$mircroData = ' itemscope itemtype="http://schema.org/Blog"';
	}
	else {
		$mircroData = '';
	}
?>
<div class="row page-wrap">
<section class="" <?php echo $mircroData; ?>>

<div class="small-12 columns" id="header">
	<header class="page-header" role="banner" itemscope itemtype="http://schema.org/Organization">

		<?php
		//get the post/page featured image ready for display....
		//start with the post id
		$pageID = get_queried_object_id();
		//set featured image to something defatul...
		$featuredImage = get_stylesheet_directory_uri().'/img/default_header.jpg';
		//$featuredImage = get_the_post_thumbnail( get_queried_object_id(), 'full' );
		//echo $featuredImage;
		?>
		<img src="<?php echo $featuredImage; ?>" alt="" class="header-image">
		<?php
		if(is_front_page()){
			echo '<h1 class="hide"><span itemprop="name">'.get_bloginfo( 'name' ).'</span></h1>';
		}else{
			echo '<h2 class="hide"><span itemprop="name">'.get_bloginfo( 'name' ).'</span></h2>';
		}
		?>
		
		<h2  class="hide"><?php echo get_bloginfo( 'description'); ?></h2>
		<div class="hide" itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
			<span itemprop="streetAddress">4050 West Ray Road Suite #18</span>
			<span itemprop="addressLocality">Chandler</span>
			<span itemprop="addressRegion">AZ</span>
			<span itemprop="postalCode">85226</span>
		</div>
		<span itemprop="telephone" class="hide">480-897-0330</span>
		<span itemprop="url" class="hide"><?php echo get_bloginfo( 'wpurl'); ?></span>
	</header>
</div>

<?php get_template_part( 'parts/nav' ); ?>

<div class="small-12 columns">