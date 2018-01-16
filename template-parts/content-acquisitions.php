<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-acquisitions"); ?>>
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
                </div><!--.col-1-->
                <?php get_sidebar("page");?>
            </div><!--.wrapper-->
        </div><!--.wrapper.cap-->
    </section><!--.row-2-->
    <section class="row-3">
        <div class="wrapper cap">
            <div class="wrapper">
                <?php $args = array(
                    'post_type'=>'project',
                    'posts_per_page'=>-1,
                    'orderby'=>'menu_order',
                    'order'=>'ASC',
                    'tax_query'=>array(array(
                        'taxonomy'=>'project_type',
                        'field'=>'term_id',
                        'terms'=>11
                    ))
                );
                $query = new WP_Query($args);
                if($query->have_posts()):?>
                    <?php $term = get_term_by('term_taxonomy_id',10);
                    if($term):?>
                        <header>
                            <h2><?php echo $term->name;?></h2>
                        </header> 
                    <?php endif;
                    $i=0;?>
                    <div class="projects clear-bottom">               
                        <?php while($query->have_posts()): $query->the_post();?>
                            <?php $image = get_field("image");
                            $project_value = get_field("project_value");
                            $date = get_field("date");
                            $location = get_field("location");
                            if($image):?>
                                <div class="project js-blocks <?php if($i%4===0) echo "first";?> <?php if(($i-3)%4===0) echo "last";?>">
                                    <a class="popup" href="#<?php echo get_the_ID();?>">
                                        <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                                        <header>
                                            <h3><?php the_title();?></h3>
                                            <?php if($location):?>
                                                <div class"location"><?php echo $location;?></div><!--.location-->
                                            <?php endif;?>
                                        </header>
                                    </a>
                                </div><!--.project-->
                                <?php $i++;?>
                                <div id="<?php echo get_the_ID();?>" class="colorbox-popup clear-bottom">
                                    <div class="col-1">
                                        <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                                    </div><!--.col-1-->
                                    <div class="col-2">
                                        <header>
                                            <h2><?php the_title();?></h2>
                                            <?php if($location):?>
                                                <div class="location">
                                                    <?php echo $location;?>
                                                </div><!--.date-->
                                            <?php endif;?>
                                        </header>
                                        <?php if($date):?>
                                            <div class="date">
                                                <?php echo $date;?>
                                            </div><!--.date-->
                                        <?php endif;?>
                                        <?php if($project_value):?>
                                            <div class="value">
                                                <?php echo $project_value;?>
                                            </div><!--.value-->
                                        <?php endif;?>
                                        <div class="copy">
                                            <?php the_content();?>
                                        </div><!--.copy-->
                                    </div><!--.col-2-->
                                </div><!--###-->
                            <?php endif;
                        endwhile;?>
                    </div><!--.projects-->
                    <?php wp_reset_postdata();
                endif;?>
                <?php $args = array(
                    'post_type'=>'project',
                    'posts_per_page'=>-1,
                    'orderby'=>'menu_order',
                    'order'=>'ASC',
                    'tax_query'=>array(array(
                        'taxonomy'=>'project_type',
                        'field'=>'term_id',
                        'terms'=>12
                    ))
                );
                $query = new WP_Query($args);
                if($query->have_posts()):?>
                    <?php $term = get_term_by('term_taxonomy_id',10);
                    if($term):?>
                        <header>
                            <h2><?php echo $term->name;?></h2>
                        </header> 
                    <?php endif;
                    $i=0;?>
                    <div class="projects clear-bottom">               
                        <?php while($query->have_posts()): $query->the_post();?>
                            <?php $image = get_field("image");
                            $project_value = get_field("project_value");
                            $date = get_field("date");
                            $location = get_field("location");
                            if($image):?>
                                <div class="project js-blocks <?php if($i%4===0) echo "first";?> <?php if(($i-3)%4===0) echo "last";?>">
                                    <a class="popup" href="#<?php echo get_the_ID();?>">
                                        <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                                        <header>
                                            <h3><?php the_title();?></h3>
                                            <?php if($location):?>
                                                <div class"location"><?php echo $location;?></div><!--.location-->
                                            <?php endif;?>
                                        </header>
                                    </a>
                                </div><!--.project-->
                                <?php $i++;?>
                                <div id="<?php echo get_the_ID();?>" class="colorbox-popup clear-bottom">
                                    <div class="col-1">
                                        <img src="<?php echo $image['url'];?>" alt="<?php echo $image['alt'];?>">
                                    </div><!--.col-1-->
                                    <div class="col-2">
                                        <header>
                                            <h2><?php the_title();?></h2>
                                            <?php if($location):?>
                                                <div class="location">
                                                    <?php echo $location;?>
                                                </div><!--.date-->
                                            <?php endif;?>
                                        </header>
                                        <?php if($date):?>
                                            <div class="date">
                                                <?php echo $date;?>
                                            </div><!--.date-->
                                        <?php endif;?>
                                        <?php if($project_value):?>
                                            <div class="value">
                                                <?php echo $project_value;?>
                                            </div><!--.value-->
                                        <?php endif;?>
                                        <div class="copy">
                                            <?php the_content();?>
                                        </div><!--.copy-->
                                    </div><!--.col-2-->
                                </div><!--###-->
                            <?php endif;
                        endwhile;?>
                    </div><!--.projects-->
                    <?php wp_reset_postdata();
                endif;?>
            </div><!--.wrapper-->
        </div><!--.wrapper.cap-->
    </section><!--.row-3-->
</article><!-- #post-## -->
