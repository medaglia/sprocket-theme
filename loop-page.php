<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
	<?php roots_post_before(); ?>
		<?php roots_post_inside_before(); ?>
			<div class="entry-header">
				<h1><?php the_title(); ?></h1>
				<figure class="post-featured-image"><?php the_post_thumbnail('featured-image'); ?></figure>
			</div>
			<?php the_content(); ?>
			<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>' )); ?>
		<?php roots_post_inside_after(); ?>
	<?php roots_post_after(); ?>
<?php endwhile; // End the loop ?>