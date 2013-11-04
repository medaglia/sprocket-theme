<?php /* Start loop */

	global $roots_options;
	$custom = get_post_custom();
	$ext_url = $custom['filmpost_external_url'][0];
	$tag_slug = $custom['filmpost_tag'][0];
	$runtime = $custom['filmpost_runtime'][0];
	$date_completed = $custom['filmpost_date_completed'][0];
	$videoEmbed = $custom['filmpost_videoEmbed'][0];
	$synopsis = $custom['filmpost_synopsis'][0];
	
	$doEmbed = false;
	$figureClass = 'triggerWatch';
	
	if(isset($videoEmbed)){
		$figureClass = 'triggerWatch';
		$embedCode = wp_oembed_get($videoEmbed, array('width'=>590));
		if($embedCode){
			// Oembed worked.
			$doEmbed = true;
			$videoEmbed = $embedCode;
		
		} elseif(filter_var($videoEmbed, FILTER_VALIDATE_URL)) {
			// Is a valid Url
		} else {
			// Not a url - assume it's embed
			$doEmbed = true;
		}
	}

	function buildMetas($vars, $sep){
		$metas = array();
		foreach($vars as $v){
			if($v){
				$metas[] = $v;
			} 
		}
		$result = implode($sep, $metas);
		return $result;
	}

	get_header(); 
	
	roots_content_before(); ?>
		<div id="content" class="<?php echo $roots_options['container_class']; ?>">	
			<?php roots_main_before(); ?>
			<?php roots_loop_before(); ?>
								
				<?php while (have_posts()) : the_post(); ?>
					<?php roots_post_before(); ?>

						<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
						<?php roots_post_inside_before(); ?>
							<header class="entry-header span-15 append-0_5">
								<h1 class="entry-title"><?php the_title(); ?></h1>
								<span class="film-meta">
									<?php echo buildMetas(array($runtime, $date_completed),', '); ?>
								</span>
								<div class="vspace20"></div>
								<figure class="post-featured-image <?php echo $figureClass; ?>"><?php the_post_thumbnail('featured-image'); ?></figure>
								<?php if($doEmbed) : ?>
									<div id="videoEmbed" style="display:none;">
										<?php echo $videoEmbed; ?>
									</div>								
								<?php endif; ?>

							</header>
							<div class="entry-content span-8 last">
								<div class="container">
									
									<?php if($synopsis) : ?>
										<p class=""><?php echo $synopsis; ?></p>
									<?php endif; ?>


									
									<?php if($ext_url) : ?>
										<p class=""><a href="<?php echo $ext_url; ?>" target="">Website</a></p>
									<?php endif; ?>
									
									<div class="the_content"><?php the_content(); ?></div>
                                
									<?php if($videoEmbed) : ?>
										<p>
										<?php if($doEmbed) : ?>
											<a class="button embedded watchLnk" href="javascript:void(0)">&#9654; Watch <?php the_title(); ?> </a>
										<?php else : ?>
											<a class="button watchLnk" href="<?php echo($videoEmbed); ?>">&#9654; Watch <?php the_title(); ?></a>
										<?php endif; ?>
										</p>
									<?php endif; ?>
								</div>
							</div>
							<footer class="clear">
								<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>' )); ?>
								<p><?php the_tags(); ?></p>
							</footer>
							<?php comments_template(); ?>
							<?php roots_post_inside_after(); ?>
						</article>

					<?php roots_post_after(); ?>
				<?php endwhile; // End the loop ?>

                    <?php if($tag_slug) : ?>
                        <h3>Related Posts</h3>
                        <?php query_posts( 'posts_per_page=6&tag=' . $tag_slug ); ?>
                        <?php while (have_posts()) : the_post(); ?>
                            <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <?php endwhile; // End the loop ?>
                    <?php endif; ?>
									
				
				
			<?php roots_loop_after(); ?>
			<?php roots_main_after(); ?>
					
		</div><!-- /#content -->
	<?php roots_content_after(); ?>
		
	<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.embedded, .triggerWatch').click(function(){
			$('.post-featured-image, #videoEmbed').toggle();
		});
	});
	</script>
	
<?php get_footer(); ?>
