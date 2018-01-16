<?php
/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */ ?>

<aside class="col-2 sidebar">
	<?php $terms = get_terms(array('taxonomy'=>'category','hide_empty'=>true));
	if(!is_wp_error($terms)&&is_array($terms)&&!empty($terms)):
		$categories_title = get_field("categories_title","option");
		if($categories_title):?>
			<header>
				<h2><?php echo $categories_title;?></h2>
			</header>
		<?php endif;?>
		<ul>
			<?php foreach($terms as $term):?>
				<li>
					<a href="<?php echo get_term_link($term);?>"><?php echo $term->name;?></a>
				</li>
			<?php endforeach;?>
		</ul>
	<?php endif;
	$archives_title = get_field("archives_title","option");
	if($archives_title):?>
		<header>
			<h2><?php echo $archives_title;?></h2>
		</header>
	<?php endif;?>
	<ul>
		<?php echo wp_get_archives(array('type'=>'monthly','show_post_count' => true,));?>
	</ul>
</aside><!--.col-2-->
