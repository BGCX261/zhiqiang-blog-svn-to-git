<?php get_header(); ?>
<style>
a{
text-decoration:none;
}
</style>

	<div class="sc post"><?php corner_start();?>
	<h1>Reading</h1>
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
	<?php get_posts_with_tag("推荐图书");?>
	<?php get_posts_with_tag("阅读杂记");?>
	<?php get_posts_with_tag("心理学");?>
	<?php get_posts_with_tag("经济金融");?>
	<?php get_posts_with_tag("哲学");?>
	<?php get_posts_with_tag("历史");?>
	<?php get_posts_with_tag("小说");?>
	<?php get_posts_with_tag("科幻小说");?>
	<div style="clear:both"></div>
<?php corner_end();?></div>



</div></div>

<div id="sidebar"><div id="innersidebar">
<dl>
	<dd class="sc"><?php corner_start();?>
		<div class="h2">我在读(<a href="http://www.douban.com/book/list/mathzqy/do">more</a>)</div>
		<div><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="268" height="208" id="passing" > <param name="movie" value="http://www.douban.com/doushow/mathzqy/dolist_random_book_6_3_small_nologo_noself/doushow.swf" /> <param name="quality" value="high" /> <param name="scale" value="noscale"/> <param name="align" value="tl"/> <param name="wmode" value="transparent"/> <embed src="http://www.douban.com/doushow/mathzqy/dolist_latest_book_6_3_small_nologo_noself/doushow.swf" wmode="transparent" quality="high" width="268" height="208" name="passing" scale="noscale" align="tl" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /> </object></div>
	<?php corner_end();?></dd>
	<dd class="sc"><?php corner_start();?>
		<div class="h2">我想读(<a href="http://www.douban.com/book/list/mathzqy/wish">more</a>)</div>
		<div><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="268" height="208" id="passing" > <param name="movie" value="http://www.douban.com/doushow/mathzqy/wishlist_random_book_6_3_small_nologo_noself/doushow.swf" /> <param name="quality" value="high" /> <param name="scale" value="noscale"/> <param name="align" value="tl"/> <param name="wmode" value="transparent"/> <embed src="http://www.douban.com/doushow/mathzqy/wishlist_latest_book_6_3_small_nologo_noself/doushow.swf" wmode="transparent" quality="high" width="268" height="208" name="passing" scale="noscale" align="tl" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /> </object></div>
	<?php corner_end();?></dd>
	<dd class="sc"><?php corner_start();?>
		<div class="h2">我读过(<a href="http://www.douban.com/book/list/mathzqy/collect">more</a>)</div>
		<div><object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,0,0" width="268" height="208" id="passing" > <param name="movie" value="http://www.douban.com/doushow/mathzqy/collection_random_book_6_3_small_nologo_noself/doushow.swf" /> <param name="quality" value="high" /> <param name="scale" value="noscale"/> <param name="align" value="tl"/> <param name="wmode" value="transparent"/> <embed src="http://www.douban.com/doushow/mathzqy/collection_random_book_6_3_small_nologo_noself/doushow.swf" wmode="transparent" quality="high" width="268" height="208" name="passing" scale="noscale" align="tl" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /> </object></div>
	<?php corner_end();?></dd>
	<dd class="sc"><?php corner_start();?>
		<?php include (TEMPLATEPATH . '/subscribe.php'); ?>
	<?php corner_end();?></dd><?php //include (TEMPLATEPATH . '/indexsidebar.php'); 
?>
</div></div>
<?php get_footer(); ?>