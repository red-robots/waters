<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php get_sidebar('top-bar-staff');?>

			<article id="post-<?php the_ID(); ?>" <?php post_class("template-news"); ?>>
				<header class="row-1">
					<div class="wrapper cap">
						<div class="wrapper">
							<h1><?php the_title();?></h1>
						</div><!--.wrapper-->
					</div><!--.wrapper.cap-->
				</header>
				<?php $read_more_text = get_field("read_more_text",52);?>
				<?php if ( have_posts() ) : ?>
					<section class="row-3">
						<div class="wrapper cap">
							<div class="wrapper clear-bottom">
								<div class="col-1">
									<div class="news">
										<?php while ( have_posts() ) : the_post();?>
											<div class="post">
												<header>
													<h2><?php the_title();?></h2>
												</header>
												<div class="copy">
													<?php the_excerpt();?>
												</div><!--.copy-->
												<div class="wrapper">
													<?php if($read_more_text):?>
														<a class="button" href="<?php the_permalink();?>"><?php echo $read_more_text;?></a>
													<?php endif;?>
												</div><!--.wrapper-->
											</div><!--.member-->
										<?php endwhile;?>
									</div><!--.news-->
									<?php pagi_posts_nav($wp_query);?>
								</div><!--.col-1-->
								<?php get_sidebar("news");?>
							</div><!--.wrapper-->
						</div><!--.wrapper.cap-->
					</section><!--.row-3-->
				<?php endif; ?>
			</article><!-- #post-## -->

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
