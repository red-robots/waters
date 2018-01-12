<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-sitemap"); ?>>
    <header class="row-1">
        <div class="wrapper cap">
            <div class="wrapper">
                <h1><?php the_title();?></h1>
            </div><!--.wrapper-->
        </div><!--.wrapper.cap-->
    </header>
    <section class="row-2">
        <div class="wrapper cap">
            <div class="wrapper clear-bottom">
                <div class="col-1 copy">
                    <?php the_content();?>
                    <?php wp_nav_menu( array( 'theme_location' => 'sitemap' ) ); ?>
                </div><!--.col-1-->
                <?php get_sidebar("page");?>
            </div><!--.wrapper-->
        </div><!--.wrapper.cap-->
    </section><!--.row-2-->
</article><!-- #post-## -->
