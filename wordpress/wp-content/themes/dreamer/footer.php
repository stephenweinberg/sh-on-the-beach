<?php
/**
 * The template for displaying the footer.
 *
 * @package dreamer
 * @since dreamer 1.0
 */
?>

		</div><!-- #content -->

	</div><!-- .container -->

	<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="container">

			<div class="site-info">

				<?php if ( get_theme_mod( 'dreamer_footer' ) ) : ?>
					
					<?php echo get_theme_mod( 'dreamer_footer' ); ?>
				
				<?php else : ?>
					
					<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'dreamer' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'dreamer' ), 'WordPress' ); ?></a>
					<span class="sep"> | </span>
					<a href="<?php echo esc_url( __( 'http://hipsterthe.me', 'dreamer' ) ); ?>" rel="designer"><?php printf( __( 'Theme: %1$s by %2$s.', 'dreamer' ), 'dreamer', 'Hipster Theme' ); ?></a>
				
				<?php endif; ?>

			</div><!-- .site-info -->

		</div><!-- .container -->
		
	</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
