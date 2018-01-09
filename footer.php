<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ACStarter
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="row-1">
			<div class="wrapper cap">
				<div class="social">
					<?php $facebook_link = get_field("facebook_link", "option");
					$linkedin_link = get_field("linkedin_link","option");
					if($facebook_link):?>
						<a href="<?php echo $facebook_link;?>"><i class="fa fa-facebook"></i></a>
					<?php endif;
					if($linkedin_link):?>
						<a href="<?php echo $linkedin_link;?>"><i class="fa fa-linkedin"></i></a>
					<?php endif;?>
				</div><!--.social-->
			</div><!--.wrapper.cap-->
		</div><!--.row-1-->
		<div class="row-2">
			<div class="wrapper cap">
				<div class="col-1">
					<?php $telephone_number = get_field("telephone_number","option");
					$company_name = get_field("company_name","option");
					$address_line_1 = get_field("address_line_1","option");
					$address_line_2 = get_field("address_line_2","option");
					if($telephone_number):?>
						<div class="telephone">
							<?php echo $telephone_number;?>
						</div><!--.telephone-->
					<?php endif;
					if($company_name):?>
						<div class="company-name">
							<?php echo $company_name;?>
						</div><!--.company-name-->
					<?php endif;
					if($address_line_1):?>
						<div class="address-line-1">
							<?php echo $address_line_1;?>
						</div><!--.address-line-1-->
					<?php endif;
					if($address_line_2):?>
						<div class="address-line-1">
							<?php echo $address_line_2;?>
						</div><!--.address-line-1-->
					<?php endif;?>
				</div><!--.col-1-->
				<div class="col-2">
					<?php $about_column_title = get_field("about_column_title","option");
					if($about_column_title):?>
						<header>
							<h2><?php echo $about_column_title;?></h2>
						</header>
					<?php endif;?>
					<?php wp_nav_menu( array( 'theme_location' => 'about' ) ); ?>
				</div><!--.col-2-->
				<div class="col-3">
					<?php $what_column_title = get_field("what_column_title","option");
					if($what_column_title):?>
						<header>
							<h2><?php echo $what_column_title;?></h2>
						</header>
					<?php endif;?>
					<?php wp_nav_menu( array( 'theme_location' => 'what' ) ); ?>
				</div><!--.col-3-->
				<div class="col-4">
					<?php $listings_column_title = get_field("listings_column_title","option");
					if($listings_column_title):?>
						<header>
							<h2><?php echo $listings_column_title;?></h2>
						</header>
					<?php endif;?>
					<?php wp_nav_menu( array( 'theme_location' => 'listings' ) ); ?>
				</div><!--.col-4-->
				<div class="col-5">
					<?php $news_column_title = get_field("news_column_title","option");
					if($news_column_title):?>
						<header>
							<h2><?php echo $news_column_title;?></h2>
						</header>
					<?php endif;?>
					<?php wp_nav_menu( array( 'theme_location' => 'news' ) ); ?>
				</div><!--.col-5-->
			</div><!--.wrapper.cap-->
		</div><!--.row-2-->
		<div class="row-3">
			<div class="wrapper cap">
				<?php $copyright = get_field("copyright","option");
				if($copyright):
					echo $copyright;
				endif;?>
			</div><!--.wrapper.cap-->
		</div><!--.row-3-->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
