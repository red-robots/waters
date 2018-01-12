<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="error-404 not-found">
				<header class="row-1">
					<div class="wrapper cap">
						<div class="wrapper">
							<h1><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'acstarter' ); ?></h1>
						</div><!--.wrapper-->
					</div><!--.wrapper.cap-->
				</header>
				<section class="row-2">
					<div class="wrapper cap">
						<div class="wrapper clear-bottom">
							<div class="col-1 copy">
								<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below?', 'acstarter' ); ?></p>
                    			<?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
							</div><!--.col-1-->
							<?php get_sidebar("page");?>
						</div><!--.wrapper-->
					</div><!--.wrapper.cap-->
				</section><!--.row-2-->
			</div><!-- .error-404 -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
