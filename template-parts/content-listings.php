<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ACStarter
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("template-listings"); ?>>
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
                <?php $terms = get_terms(array('taxonomy'=>'listing_type','hide_empty'=>false));
                if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):
                    $heirarchy = array();
                    $indexed_terms = array();
                    //index and arrange terms so they are loopable
                    foreach($terms as $term):
                        $indexed_terms[$term->term_id]=$term;
                        if($term->parent===0):
                            if(!isset($heirarchy[$term->term_id])):
                                $heirarchy[$term->term_id]=array();
                            endif;
                        elseif(isset($heirarchy[$term->parent])):
                            $heirarchy[$term->parent][$term->term_id] = array();
                        elseif(!isset($heirarchy[$term->parent])):
                            $heirarchy[$term->parent]=array($term->term_id=>array());
                        endif;
                    endforeach;
                    //recursively loop through terms
                    bella_recursive_loop($heirarchy, $indexed_terms);            
                endif;?>
            </div><!--.wrapper-->
        </div><!--.wrapper.cap-->
    </section><!--.row-2-->
</article><!-- #post-## -->

<?php function bella_recursive_loop($heirarchy, $indexed_terms){
    foreach($heirarchy as $key => $value){
        if(empty($value)){
            $args = array(
                'post_type'=>'listing',
                'posts_per_page'=>-1,
                'orderby'=>'menu_order',
                'order'=>'ASC',
                'tax_query'=>array(array(
                    'taxonomy'=>'listing_type',
                    'field'=>'term_id',
                    'terms'=>$key
                ))
            );
            $query = new WP_Query($args);
            if($query->have_posts()){ ?>
                <div class="header clear-bottom">
                    <div class="col-1">
                        <?php echo $indexed_terms[$key]->name;?>:
                    </div><!--.col-1-->
                    <div class="col-2">
                        Anchor Tenants:
                    </div><!--.col-2-->
                </div><!--.header-->
                <div class="listings">
                    <?php while($query->have_posts()){ $query->the_post();
                        $office = get_field("office");
                        $anchor_tenants = get_field("anchor_tenants");
                        $image = get_field("image");?>
                        <div class="row clear-bottom">
                            <div class="col-1 copy">
                                <?php if($office){
                                    echo $office;
                                }?>
                            </div><!--.col-1-->
                            <div class="col-2 copy">
                                <?php if($image){ ?>
                                    <img src="<?php echo $image['sizes']['large'];?>" alt="<?php echo $image['alt'];?>">
                                <?php } ?>
                                <?php if($anchor_tenants){
                                    echo $anchor_tenants;
                                }?>
                            </div><!--.col-2-->
                        </div><!--.row-->
                    <?php } ?>
                </div><!--.listings-->
            <?php }
        } else { ?>
            <div class="header blue">
                <?php echo $indexed_terms[$key]->name;?>
            </div><!--.header-->
            <?php bella_recursive_loop($value, $indexed_terms);?>
        <?php }
    }
}?>