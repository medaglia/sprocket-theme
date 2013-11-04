<?php 
	$isFilmCategory = false;
	if(method_exists('filmPosts', 'isFilmCategory') && filmPosts::isFilmCategory()){
		$isFilmCategory = true;
	}	
?>

<?php get_header(); ?>
	<?php roots_content_before(); ?>
		<div id="content" class="<?php echo $roots_options['container_class']; ?>">
		<?php
		 	// Is a film category --------------------------------------------------------------
			if($isFilmCategory){ ?>
			
				<?php roots_main_before(); ?>
					<div id="main" class="<?php echo $roots_options['container_class']; ?> film_posts" role="main">
						<div class="container">
							<h1>
								<?php single_cat_title(); ?>
							</h1>
							<?php roots_loop_before(); ?>					

							<?php 
								if(method_exists('filmPosts', 'isFilmCategory') && filmPosts::isFilmCategory()){
									get_template_part('loop-film-posts', 'category'); 
								} else {
									get_template_part('loop', 'category'); 
								}
							?>

							<?php roots_loop_after(); ?>
						</div>
					</div><!-- /#main -->
				<?php roots_main_after(); ?>			
		
		<?php 
			// Is not a film cateogory ---------------------------------------------------------
			} else { 
		?>
					
			<?php roots_main_before(); ?>
				<div id="main" class="<?php echo $roots_options['main_class']; ?>" role="main">
					<div class="container">
						<h1>
							<?php single_cat_title(); ?>
						</h1>
						<?php roots_loop_before(); ?>					

						<?php 
							if(method_exists('filmPosts', 'isFilmCategory') && filmPosts::isFilmCategory()){
								get_template_part('loop-film-posts', 'category'); 
							} else {
								get_template_part('loop', 'category'); 
							}
						?>

						<?php roots_loop_after(); ?>
					</div>
				</div><!-- /#main -->
			<?php roots_main_after(); ?>
			<?php roots_sidebar_before(); ?>
				<aside id="sidebar" class="<?php echo $roots_options['sidebar_class']; ?>" role="complementary">
				<?php roots_sidebar_inside_before(); ?>
					<div class="container">
						<?php get_sidebar(); ?>
					</div>
				<?php roots_sidebar_inside_after(); ?>
				</aside><!-- /#sidebar -->
			<?php roots_sidebar_after(); ?>
			
			
		<?php // --------------------------------------------------------------------------------- 
			} 
		?>		
		
		</div><!-- /#content -->
	<?php roots_content_after(); ?>
<?php get_footer(); ?>
