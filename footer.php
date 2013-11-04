	<?php roots_footer_before(); ?>
		<footer id="content-info" class="<?php global $roots_options; echo $roots_options['container_class']; ?>" role="contentinfo">
			<?php roots_footer_inside(); ?>
			<div class="container">
				<?php dynamic_sidebar("Footer"); ?>
				<p class="copy"><small>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></small></p>
			</div>	
		</footer>
		<?php roots_footer_after(); ?>
		
		
		<div id="social-icons">
			<?php if (isset($roots_options['twitter_user']) || isset($roots_options['facebook_user'])) : ?>
		    	<?php if (isset($roots_options['twitter_user'])) : ?>
		        <a href="http://twitter.com/<?php echo $roots_options['twitter_user']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/social/icon-twitter.png" alt="Twitter" width="26" height="26"/></a>
				<?php endif; ?>
		    	<?php if (isset($roots_options['facebook_user'])) : ?>
		        <a href="http://facebook.com/<?php echo $roots_options['facebook_user']; ?>" target="_blank"><img src="<?php bloginfo('template_directory'); ?>/img/social/icon-facebook.png" alt="Facebook" width="26" height="26"/></a>
				<?php endif; ?>
			<?php endif; ?>
		</div>
				
	</div><!-- /#wrap -->

<?php wp_footer(); ?>
<?php roots_footer(); ?>

	<!--[if lt IE 7]>
		<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
		<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
	<![endif]-->


</body>
</html>