<?php
/**
 * Template part for displaying page content in page-news.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-news"); ?>>
    <header class="row-1">
        <div class="wrapper cap">
            <div class="wrapper">
                <h1><?php the_title();?></h1>
            </div><!--.wrapper-->
        </div><!--.wrapper.cap-->
    </header>
    <?php if(get_the_content()):?>
        <div class="row-2">
            <div class="wrapper cap">
                <div class="wrapper">
                    <section class="copy">
                        <?php the_content();?>
                    </section><!--.copy-->
                </div><!--.wrapper-->
            </div><!--.wrapper.cap-->
        </div><!--.row-2-->
    <?php endif;?>
    <?php $read_more_text = get_field("read_more_text");?>
    <section class="row-3">
        <div class="wrapper cap">
            <div class="wrapper clear-bottom">
                <div class="col-1">
                    <?php $args = array(
                        'post_type'=>'post',
                        'posts_per_page'=>3,
                        'order'=>'ASC',
                        'orderby'=>'menu_order'
                    );
                    $query = new WP_Query($args);
                    if($query->have_posts()):?>
                        <div class="news">
                            <?php while($query->have_posts()): $query->the_post();?>
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
                        <?php pagi_posts_nav($query);?>
                        <?php wp_reset_postdata();
                    endif;?>
                </div><!--.col-1-->
                <?php get_sidebar("news");?>
            </div><!--.wrapper-->
        </div><!--.wrapper.cap-->
    </section><!--.row-3-->
</article><!-- #post-## -->
