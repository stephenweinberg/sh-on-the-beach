<?php
/**
 * The Header for dreamer
 *
 * @package dreamer
 * @since dreamer 1.0
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">

	<div class="container">

		<header id="masthead" class="site-header" role="banner">
			
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
			</div>

			<?php if ( get_header_image() ) : ?>
			<div class="header-image">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt=""></a>
			</div>
			<?php endif; // End header image check. ?>

			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-toggle"><?php _e( 'Menu', 'dreamer' ); ?></button>
				<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'dreamer' ); ?></a>

				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #site-navigation -->

		</header><!-- #masthead -->
		
		<?php if ( get_theme_mod( 'dreamer_slider_option' ) == 'yes' ) : ?>
		
		<?php
		if ( is_home() ) {
		    echo do_shortcode( '[slider]' );
		} ?>

		<?php endif; ?>

		<div id="content" class="site-content">
