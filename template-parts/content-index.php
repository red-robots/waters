<?php
/**
 * Template part for displaying page content in index.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-index"); ?>>
    <section class="row-1">
        <div class="wrapper cap">
            <?php $row_1_title = get_field("row_1_title");
            $row_1_copy = get_field("row_1_copy");
            if($row_1_title):?>
                <header>
                    <h2><?php echo $row_1_title;?></h2>
                </header>
            <?php endif;
            if($row_1_copy):?>
                <div class="copy">
                    <?php echo $row_1_copy;?>
                </div><!--.copy-->
            <?php endif;?>
        </div><!--.wrapper.cap-->
        <?php $row_1_button_text = get_field("row_1_button_text");
        $row_1_button_link = get_field("row_1_button_link");
        if($row_1_button_link && $row_1_button_text):?>
            <a class="button" href="<?php echo $row_1_button_link;?>">
                <?php echo $row_1_button_text;?>
            </a>
        <?php endif;?>
    </section><!--.row-1-->
    <section class="row-2">
        <div class="wrapper cap">
            <?php for($i = 1; $i<4; $i++):
                $title = get_field("row_2_col_{$i}_text");
                $copy = get_field("row_2_col_{$i}_copy");
                $text = get_field("row_2_col_{$i}_button_text");
                $link = get_field("row_2_col_{$i}_button_link");
                if($title):?>
                    <div class="col-<?php echo $i;?> col">
                        <header>
                            <h2><?php echo $title;?></h2>
                        </header>
                        <?php if($copy):?>
                            <div class="copy">
                                <?php echo $copy;?>
                            </div><!--.copy-->
                        <?php endif;
                        if($link && $text):?>
                            <a class="button" href="<?php echo $link;?>">
                                <?php echo $text;?>
                            </a>
                        <?php endif;?>
                    </div><!--.col-#.col-->
                <?php endif;
            endfor;?>
        </div><!--.wrapper.cap-->
    </section><!--.row-2-->
    <section class="row-3">
        <div class="wrapper cap">
            <?php $row_3_title = get_field("row_3_title");
            $row_3_read_more_text = get_field("row_3_read_more_text");
            if($row_3_title):?>
                <header>
                    <h2><?php echo $row_3_title;?></h2>
                </header>
            <?php endif;?>
            <?php $args = array(
                'post_type'=>'post',
                'posts_per_page'=>1,
                'order'=>'DESC',
                'orderby'=>'date'
            );
            $query = new WP_Query($args);
            if($query->have_posts()):$query->the_post();?>
                <div class="post">
                    <header><h3><?php the_title();?></h3></header>
                    <div class="copy">
                        <?php the_excerpt();?>
                    </div><!--.copy-->
                    <?php if($row_3_read_more_text):?>
                        <a class="button" href="<?php the_permalink();?>">
                            <?php echo $row_3_read_more_text;?>
                        </a>
                    <?php endif;?>
                </div><!--.post-->
                <?php $post = get_post(6);
                if($post) setup_postdata($post); 
            endif;?>
        </div><!--.wrapper.cap-->
    </section><!--.row-3-->
</article><!-- #post-## -->
