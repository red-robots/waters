<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */ ?>

<aside class="col-2 sidebar">
	<?php $testimonials_title = get_field("testimonials_title","option");
	$testimonial = get_field("testimonial_picker");
	if($testimonial):
		$args = array(
			'post_type'=>'testimonial',
			'post_per_page'=>1,
			'order'=>'ASC',
			'post__in'=>array($testimonial),
			'orderby'=>'rand'
		);
		$query = new WP_Query($args);
		if($query->have_posts()): $query->the_post();
			if($testimonials_title):?>
				<header>
					<h2><?php echo $testimonials_title;?></h2>
				</header>
			<?php endif;?>
			<div class="testimonial copy">
				<?php the_content();?>
			</div><!--.testimonial.copy-->
		<?php wp_reset_postdata();
		endif;
	endif;?>
</aside><!--.col-2-->
