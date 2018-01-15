<?php
/**
 * Template Name: Listings
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : the_post();
				get_sidebar('top-bar');
				get_template_part( 'template-parts/content', 'listings' );

			endif; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
