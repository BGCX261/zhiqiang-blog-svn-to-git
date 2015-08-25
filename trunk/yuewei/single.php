<?php get_header(); ?>
	<div class="sc"><?php corner_start("");?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post">
			<h1 class="posttitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title=""><?php the_title(); ?></a></h1>
			
			<div class="postmeta">
			<span class="red author"><?php the_author() ?></span><span class="time"><?php the_time('F j, Y') ?></span><span class="category"> <?php the_category(' ') ?></span>
			<?php edit_post_link(__('Edit'), ' &#183; ', ''); ?>
			</div>
			
			<div class="postentry">
				<?php the_content("<p>Read the rest of this entry &raquo;</p>"); ?>
			<?php wp_link_pages(); ?>
			</div>
			<?php do_action("cache_post", $post->ID); ?>
</div>	
<script charset="utf8" type="text/javascript">cT="0";nc="#444444";nBgc="";nBorder="#F5E5A9";tc="#649B00";tBgc="#FFF4D0";tBorder="#F5E5A9";tDigg="%E6%8E%A8%E8%8D%90";tDugg="%E5%B7%B2%E8%8D%90";defaultItemUrl="WEB_URL";defaultFeedUrl ="http://feeds.feedburner.com/zhiqiang";</script><script type="text/javascript" charset="utf8" src="http://re.xianguo.com/api/diggthis.js"></script>
		<?php comments_template(); ?>
		<div class="bottomnavigation">
			<div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
			<div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
		</div>
				
	<?php endwhile; else : ?>

		<h2><?php _e('Not Found'); ?></h2>

		<p><?php _e('Sorry, but the page you requested cannot be found.'); ?></p>
		
		<h3><?php _e('Search'); ?></h3>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
	<?php corner_end();?></div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
