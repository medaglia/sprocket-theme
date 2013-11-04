<?php /* If there are no posts to display, such as an empty archive page */ ?>
<?php if (!have_posts()) : ?>
	<div class="notice">
		<p class="bottom"><?php _e('Sorry, no results were found.', 'roots'); ?></p>
	</div>
	<?php get_search_form(); ?>	
<?php endif; ?>



<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
	<?php roots_post_before(); ?>
	<?php 
		$lastInRow = '';
		if((($wp_query->current_post + 1) % 3) == 0)
			$lastInRow = ' last'; 
	?>
	
		<article id="post-<?php the_ID(); ?>" <?php post_class("$lastInRow"); ?>>
		<?php roots_post_inside_before(); ?>
			<header>
				<figure class="post-featured-thumbnail film_post"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(300,300)); ?></a></figure>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<time pubdate datetime="<?php the_time('c'); ?>"><?php printf( __('Posted on %s at %s.','roots'), get_the_time('l, F jS, Y'), get_the_time()) ?></time>
				<p class="byline author vcard"><?php _e('Written by', 'roots'); ?> <?php the_author_posts_link(); ?></p>
			</header>
			<div class="entry-content">
		<?php if (is_archive() || is_search()) : // Only display excerpts for archives and search ?>
			<?php the_excerpt(); ?>
		<?php else : ?>
			<?php the_content(); ?>
		<?php endif; ?>
			</div>
			<footer>
				<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
			</footer>
		<?php roots_post_inside_after(); ?>
		</article>
	<?php roots_post_after(); ?>		
<?php endwhile; // End the loop ?>

<?php /* Display navigation to next/previous pages when applicable */ 
	$theTitle = single_cat_title('', false);
?>
<?php if ($wp_query->max_num_pages > 1) : ?>
	<nav id="post-nav">
		<div class="post-previous"><?php previous_posts_link( __( '&larr; Back', 'roots' ) ); ?></div>
		<div class="post-next"><?php next_posts_link( __( " More $theTitle &rarr;", 'roots' ) ); ?></div>
	</nav>
<?php endif; ?>