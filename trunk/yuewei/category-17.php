<?php get_header(); ?>
<style>
a{
text-decoration:none;
}
</style>

	<div class="sc post"><?php corner_start();?>
	<h1>计算机科学</h1>
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
	<?php get_posts_with_tag("算法");?>
	<?php get_posts_with_tag("数据结构");?>
	<?php get_posts_with_tag("复杂性理论");?>
	<?php get_posts_with_tag("理论计算机初步", "理论计算机");?>
	<?php get_posts_with_tag("理论计算机笔记");?>
	<?php get_posts_with_tag("计算机讲座");?>
	<?php get_posts_with_tag("理论计算机其它");?>
	<?php get_posts_with_tag("计算机大事记");?>
	<div style="clear:both"></div>
<?php corner_end();?></div>



</div></div>

<div id="sidebar"><div id="innersidebar">
<dl>
	<dd class="sc"><?php corner_start();?>
		<?php include (TEMPLATEPATH . '/subscribe.php'); ?>
	<?php corner_end();?></dd>

</div></div>
<?php //include (TEMPLATEPATH . '/indexsidebar.php'); 
?>
<?php get_footer(); ?>