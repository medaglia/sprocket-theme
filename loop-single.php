<?php /* Start loop */
	global $roots_options;
?>
<?php while (have_posts()) : the_post(); ?>
	<?php roots_post_before(); ?>
			
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<?php roots_post_inside_before(); ?>
			<header class="entry-header">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<figure class="post-featured-image"><?php the_post_thumbnail('featured-image'); ?></figure>
			</header>
			<div class="entry-content">
				<div class="container">
					<p class="publishData">
					<time class="updated" datetime="<?php the_time('c'); ?>" pubdate><?php printf(__('%s.', 'roots'), get_the_time('l, F jS, Y'),get_the_time())?></time>
					<span class="byline author vcard"><?php _e('Written by', 'roots'); ?> <?php the_author_posts_link(); ?></span>
					</p>
					
					<div class="the_content"><?php the_content(); ?></div>
				</div>
			</div>
			<footer>
				<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>' )); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php comments_template(); ?>
			<?php roots_post_inside_after(); ?>
		</article>
		
	<?php roots_post_after(); ?>
<?php endwhile; // End the loop ?>
