<?php
/**
 * The sidebar containing the sibling pages list.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

<?php $args = array (
	'posts_per_page' =>-1,
	'post_type'=>'page',
	'order'=>'ASC',
	'orderby'=>'menu_order',
	'post_parent'=>102
);
$query = new WP_Query($args);
if($query->have_posts()):?>
	<aside class="top-bar" role="complementary">
		<div class="wrapper cap">
			<div class="wrapper">
				<ul>
					<?php while($query->have_posts()):$query->the_post();?>
						<li>
							<a href="<?php the_permalink();?>"><?php the_title();?></a>
						</li>
					<?php endwhile;?>
				</ul>
			</div><!--.wrapper-->
		</div><!--.wrapper.cap-->
	</aside><!-- #secondary -->
	<?php wp_reset_postdata();
endif;?>
