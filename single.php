<?php get_header(); ?>
	<?php roots_content_before(); ?>
		<div id="content" class="<?php echo $roots_options['container_class']; ?>">	
			
			<?php roots_main_before(); ?>
			<?php roots_loop_before(); ?>
			<div class="span-15 append-0_5">	
				<?php get_template_part('loop', 'single'); ?>
			</div>
			<?php roots_loop_after(); ?>
			<?php roots_main_after(); ?>
			
			<?php // Sidebar ?>
			<?php roots_sidebar_before(); ?>			
			<aside id="sidebar" class="<?php echo $roots_options['sidebar_class']; ?>" role="complementary">
			<?php roots_sidebar_inside_before(); ?>
				<div class="container">
					<?php get_sidebar(); ?>
				</div>
			<?php roots_sidebar_inside_after(); ?>
			</aside><!-- /#sidebar -->		
			<?php roots_sidebar_after(); ?>
		
		</div><!-- /#content -->
	<?php roots_content_after(); ?>
<?php get_footer(); ?>
