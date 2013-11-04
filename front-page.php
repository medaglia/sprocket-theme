<?php get_header(); ?>
	<?php roots_content_before(); ?>
		<div id="content" class="<?php echo $roots_options['container_class']; ?>">	
		<?php roots_main_before(); ?>
			<div id="main" class="<?php echo $roots_options['container_class']; ?> film_posts" role="main">
				<div class="container">
					<?php roots_loop_before(); ?>
					
					<?php /* Start loop */
						$args = array( 'post_type' => 'film_post', 'posts_per_page' => 3);
						$wp_query = new WP_QUERY($args);
					?>
					
					<?php /* If there are no posts to display, such as an empty archive page */ ?>
					<?php if (!have_posts()) : ?>
						<div class="notice">
							<p class="bottom"><?php _e('Sorry, no results were found.', 'roots'); ?></p>
						</div>
						<?php get_search_form(); ?>	
					<?php endif; ?>


					<?php while (have_posts()) : the_post(); ?>
						
						<?php 
							$lastInRow = '';
							if((($wp_query->current_post + 1) % 3) == 0)
								$lastInRow = ' last'; 
						?>

						<?php roots_post_before(); ?>
							<article id="post-<?php the_ID(); ?>" <?php post_class("$lastInRow"); ?>>
							<?php roots_post_inside_before(); ?>

								<header>
									<figure class="post-featured-thumbnail"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(array(300,300)); ?></a></figure>
									<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
								</header>
								<footer>
									<time pubdate datetime="<?php the_time('c'); ?>"><?php printf( __('Posted on %s at %s.','roots'), get_the_time('l, F jS, Y'), get_the_time()) ?></time>
									<p class="byline author vcard"><?php _e('Written by', 'roots'); ?> <?php the_author_posts_link(); ?></p>
									<?php $tag = get_the_tags(); if (!$tag) { } else { ?><p><?php the_tags(); ?></p><?php } ?>
								</footer>

							<?php roots_post_inside_after(); ?>
							</article>
						<?php roots_post_after(); ?>		
					<?php endwhile; // End the loop ?>
					
					<?php roots_loop_after(); ?>
				</div>
				
			</div><!-- /#main -->
		<?php roots_main_after(); ?>
		
		<?php if ($wp_query->max_num_pages > 1) : ?>
			<nav id="post-nav">
				<div class="post-next"><a href="films/">More Films &#9654;</a></div>
			</nav>
		<?php endif; ?>
		
		</div><!-- /#content -->
	<?php roots_content_after(); ?>
	
	

	
	
				
				
	<?php /* Start loop */
		$args = array( 'cat' => 'news', 'posts_per_page' => 5);
		$wp_query = new WP_QUERY($args);
	?>
	<div id="newsStream" class="clearfix">
		<?php while (have_posts()) : the_post(); ?>
		<div id="post-<?php the_ID(); ?>" class="post">
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
		</div>
		<?php endwhile; // End the loop ?>
		<div class="moreLnk"><a href="/category/news/">More News</a></div>
	</div>
	<div id="lifestreamBox" class="clearfix">
	</div>
	
	
	
<?php get_footer(); ?>
