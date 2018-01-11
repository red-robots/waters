<?php
/**
 * Template part for displaying page content in single-staff.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-staff-single"); ?>>
    <div class="wrapper cap">
        <div class="wrapper">
            <section class="row-2 clear-bottom">
                <div class="col-1">
                    <div class="member">
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
                    </div><!--.member-->
                </div><!--.col-1-->
                <div class="col-2">
                    <header>
                        <h1><?php the_title();?></h1>
                    </header>
                    <div class="copy">
                        <?php the_content();?>
                    </div><!--.copy-->
                </div><!--.col-2-->
            </section><!--.row-2-->
        </div><!--.wrapper-->
    </div><!--.wrapper.cap-->
</article><!-- #post-## -->
