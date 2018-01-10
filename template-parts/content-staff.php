<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-staff"); ?>>
    <header class="row-1">
        <div class="wrapper cap">
            <h1><?php the_title();?></h1>
        </div><!--.wrapper.cap-->
    </header>
    <?php if(get_the_content()):?>
        <div class="row-2">
            <div class="wrapper cap">
                <div class="copy">
                    <?php the_content();?>
                </div><!--.copy-->
            </div><!--.wrapper.cap-->
        </div><!--.row-2-->
    <?php endif;?>
    <?php $read_more_text = get_field("read_more_text");
    $args = array(
        'post_type'=>'staff',
        'posts_per_page'=>-1,
        'order'=>'ASC',
        'orderby'=>'menu_order'
    );
    $query = new WP_Query($args);
    if($query->have_posts()):?>
        <section class="staff row-3">
            <div class="wrapper cap clear-bottom">
                <?php $i=0;
                while($query->have_posts()): $query->the_post();?>
                    <div class="member js-blocks <?php if($i%3==0) echo "first";?> <?php if(($i-2)%3==0) echo "last";?>">
                        <?php $image = get_field("image");
                        $title = get_field("title");
                        $linkedin = get_field("linkedin");
                        $email = get_field("email");
                        if($image):?>
                            <img src="<?php echo $image['sizes']['medium'];?>" alt="<?php echo $image['alt'];?>">
                        <?php endif;?>
                        <header>
                            <h2><?php the_title();?></h2>
                            <?php if($title):?>
                                <h3><?php echo $title;?></h3>   
                            <?php endif;?>
                        </header>
                        <?php if($linkedin||$email):?>
                            <div class="contact">
                                <?php if($linkedin):?>
                                    <a href="<?php echo $linkedin;?>"><i class="fa fa-linkedin"></i></a>
                                <?php endif;?>
                                <?php if($email):?>
                                    <a href="mailto:<?php echo $email;?>"><i class="fa fa-envelope"></i></a>
                                <?php endif;?>
                            </div><!--.contact-->
                        <?php endif;?>
                        <?php if($read_more_text):?>
                            <a class="button" href="<?php the_permalink();?>"><?php echo $read_more_text;?></a>
                        <?php endif; 
                        $i++;?>
                    </div><!--.member-->
                <?php endwhile;?>
            </div><!--.wrapper.cap-->
        </section><!--.staff.row-3-->
        <?php wp_reset_postdata();
    endif;?>
</article><!-- #post-## -->
