<?php get_header(); ?>
<style>
a{
text-decoration:none;
}
</style>

	<div class="sc post"><?php corner_start();?>
	<h1>Activity</h1>
	<div class="postentry">
	</div>
<?php //$posts = get_posts("category=4&numberposts=1&orderby=ID");?>
	<div>
	<?php if (have_posts()) : while (have_posts()) : the_post();?>
		<div class="index-latest-post" style="background:#F5FAFC url(/blog/wp-content/themes/yuewei/images/mini-new.gif) no-repeat scroll left top;border:1px solid #7FD4F4;margin:4px 0px 10px; padding:10px;">
			<div style="border-bottom: 1px dotted rgb(12, 114, 162); margin: 0px 0px 4px 30px; font-size: 14px; font-weight: bold;"><a href="<?php echo get_permalink_by_postname($post->post_name); ?>" rel="bookmark" title=""><?php the_title(); ?></a></div>
			<div style="margin-left: 15px; height: 20px;">
				<div class="index_cat_views grey" style="width:200px;float:left;"><span class="index_post_comments"><a href="<?php echo get_permalink_by_postname(); ?>#comments" title="发表您的评论..."> <?php echo $post->comment_count;?> 条评论»</a></span></div>
				<div class="index_cat_date grey" style="width:150px;float:right; text-align:right;"><?php echo $post->post_date;?></div>
			</div>
			<div class="postentry">
				<?php the_excerpt();?>
			</div>
			<a style="font-size: 14px;" href="<?php echo get_permalink_by_postname() ?>" target="_blank" title="查看全文...">查看全文...</a>
		</div>
		  
		<?php break;?>

	<?php endwhile; endif; ?>
	</div>
	<?php get_posts_with_tag("山水");?>
	<?php get_posts_with_tag("人文景观");?>
	<?php get_posts_with_tag("游玩");?>
	<?php get_posts_with_tag("实验室活动");?>
	<?php get_posts_with_tag("美洲");?>
	<div style="clear:both"></div>
<?php corner_end();?></div>



</div></div>

<div id="sidebar"><div id="innersidebar">
<dl>
	<dd class="sc"><?php corner_start();?>
		<img src="http://www.markwang.com/chinamap/image.php?&BJ=1&GD=1&HeN=1&HK=1&HuN=1&LN=1&SH=1&SC=1
" alt="The provinces in China I have been" width="270" />
	<?php corner_end();?></dd>
	<dd class="sc"><?php corner_start();?>
		  <img src="http://www.world66.com/community/mymaps/worldmap?visited=USCNHKCA" alt="the countries I have been"  width="270"/>
	<?php corner_end();?></dd>
	<dd class="sc"><?php corner_start();?>
		<?php include (TEMPLATEPATH . '/subscribe.php'); ?>
	<?php corner_end();?></dd></div></div>
<?php //include (TEMPLATEPATH . '/indexsidebar.php'); 
?>
<?php get_footer(); ?>