<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */ ?>

<aside class="col-2 sidebar">
	<?php $callout_title = get_field("callout_title","option");
	$callout_copy = get_field("callout_copy","option");
	$callout_link = get_field("callout_link","option");
	$callout_link_text = get_field("callout_link_text","option");
	$testimonials_title = get_field("testimonials_title","option");
	if($callout_title):?>
		<header>
			<h2><?php echo $callout_title;?></h2>
		</header>
	<?php endif;
	if($callout_copy):?>
		<div class="copy">
			<?php echo $callout_copy;?>
		</div><!--.copy-->
	<?php endif;?>
	<?php if($callout_link&&$callout_link_text):?>
		<div class="wrapper">
			<a class="button" href="<?php echo $callout_link;?>"><?php echo $callout_link_text;?></a>
		</div><!--.wrapper-->
	<?php endif;
	$args = array(
		'post_type'=>'testimonial',
		'post_per_page'=>1,
		'order'=>'ASC',
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
	$affiliations_title = get_field("affiliations_title","option");
	if($affiliations_title):?>
		<header>
			<h2><?php echo $affiliations_title;?></h2>
		</header>
	<?php endif;
	$affiliations = get_field("affiliations","option");
	if($affiliations):?>
		<div class="affiliations">
			<?php foreach($affiliations as $af):?>
				<?php if($af['image']):?>
					<div class="affiliation">
						<?php if($af['link']):?>
							<a href="<?php echo $af['link'];?>">
						<?php endif;?>
							<img src="<?php echo $af['image']['sizes']['medium'];?>" alt="<?php echo $af['image']['alt'];?>">
						<?php if($af['link']):?>
							</a>
						<?php endif;?>
					</div><!--.affiliation-->
				<?php endif;?>
			<?php endforeach;?>
		</div><!--.affiliations-->
	<?php endif;?>
</aside><!--.col-2-->
