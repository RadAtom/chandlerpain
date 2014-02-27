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

	<?php //MIRCO AND SOCIAL METADATA AND ICON LINKS ?>
	<!--Google Publisher and Canonical-->
	<!-- <link href="" rel="author" /> -->

	<?php get_template_part( 'temp-parts/head', 'microdata-meta' ); //microdata for better snippets ?>

	<?php //get_template_part( 'temp-parts/head', 'social-meta' ); //social metadata for better representation when sharing ?>

	<?php get_template_part( 'temp-parts/head', 'icon-links' ); //Icon link tags for favicons and touch icons ?>

	<?php //STYLES ?>
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

<header class="page-header" role="banner">
	<div class="small-12 columns" id="header">
	</div>
</header>

<?php get_template_part( 'parts/nav' ); ?>
