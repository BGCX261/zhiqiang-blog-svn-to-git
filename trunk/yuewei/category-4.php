<?php get_header(); ?>
<style>
a{
text-decoration:none;
}
</style>

	<div class="sc post"><?php corner_start();?>
	<img style="float:right;" src="http://www.douban.com/lpic/s2688485.jpg" alt="中国崛起策封面"/>
	<h1>中国崛起策</h1>
	<div class="postentry">
	  <p>以历史的眼光和全球的视野，解读通向大国之路的中国策</p>
	  <p>历史的大转折和大变革，需要大智慧，需要杰出的政治家、战略家和思想家。</p>
	  <p>作者<strong>刘涛</strong>作为留德博士，经过多年的思考，结合国外社会学前沿理论和中国国情，以历史的眼光和全球的视野，在人类历史文明的大背景下，对中国崛起进程中的国际关系、地缘困境、社会政治改革、文化软实力、市场化困境等宏观和微观问题进行了全面系统的分析，以富有激情而中正理智的思维，提出了全新的观点，提供了全新的视角。崛起策告诉我们：通向大国之路不仅需要激情、信心、决心，更需要富有理性的战略思考、实现困境突围的经国谋略、大国国民的精神和风貌…… </p>
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
	
	<?php get_posts_with_tag("中国崛起策II正文", "II ");?>
	<?php get_posts_with_tag("中国崛起策I正文", "中国崛起策");?>
	<?php get_posts_with_tag("中国崛起策读者评论");?>
	<?php get_posts_with_tag("中国崛起策副篇", "中国崛起策");?>
	<?php get_posts_with_tag("中国崛起策作者评论");?>
	<?php get_posts_with_tag("中国崛起策大事记");?>
	<div style="clear:both"></div>
<?php corner_end();?></div>



</div></div>

<div id="sidebar"><div id="innersidebar">
<dl>
	<dd class="sc"><?php corner_start();?>
		<form onsubmit="window.open('http://www.feedburner.com', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true" target="popupwindow" method="post" action="http://www.feedburner.com/fb/a/emailverify" style="padding: 3px; text-align: center;">输入邮件地址：<br/>
<input type="text" name="email" style="width: 140px; background-color: rgb(255, 255, 160); margin:10px;"/>
<input type="hidden" name="url" value="http://feeds.feedburner.com/~e?ffid=831725"/>
<input type="hidden" name="title" value="中国崛起策"/>
<input type="hidden" value="en_US" name="loc"/><br/>
<input type="submit" value="订阅中国崛起策"/>
</form>
<p class="grey">自动发送最新文章到你的Email，可随时取消。</p>
	<?php corner_end();?></dd></dl>	
	<dd class="sc"><?php corner_start();?>
		<div class="h2">购买崛起策实体书</div>
		
	    <ul class="posts noa">
	      <li><a target="_blank" href="http://www.douban.com/link2?type=buy&amp;subject=2245914&amp;vendor=joyo&amp;url=http%3A//click.linktech.cn/%3Fm%3Djoyo%26a%3DA100020760%26l%3D99999%26u_id%3D%26l_type2%3D0%26tu%3Dhttp%253A%252F%252Fwww.amazon.cn%252Fdetail%252Fproduct.asp%253Fprodid%253Dbkbk727315">卓越亚马逊</a> (<a target="_blank" href="http://www.douban.com/link2?type=buy&amp;subject=2245914&amp;vendor=joyo&amp;url=http%3A//click.linktech.cn/%3Fm%3Djoyo%26a%3DA100020760%26l%3D99999%26u_id%3D%26l_type2%3D0%26tu%3Dhttp%253A%252F%252Fwww.amazon.cn%252Fdetail%252Fproduct.asp%253Fprodid%253Dbkbk727315">RMB 15.2</a>) </li>
	      <li><a target="_blank" href="http://www.douban.com/link2?type=buy&amp;subject=2245914&amp;vendor=dangdang&amp;url=http%3A//click.linktech.cn/%3Fm%3Ddangdang%26a%3DA100020760%26l%3D99999%26u_id%3D%26l_type2%3D0%26tu%3Dhttp%253A%252F%252Fwww.dangdang.com%252Fproduct_detail%252Fproduct_detail.asp%253Fproduct_id%253D20027269">当当网</a> (<a target="_blank" href="http://www.douban.com/link2?type=buy&amp;subject=2245914&amp;vendor=dangdang&amp;url=http%3A//click.linktech.cn/%3Fm%3Ddangdang%26a%3DA100020760%26l%3D99999%26u_id%3D%26l_type2%3D0%26tu%3Dhttp%253A%252F%252Fwww.dangdang.com%252Fproduct_detail%252Fproduct_detail.asp%253Fproduct_id%253D20027269">RMB 15.3</a>) </li>
	      <li><a target="_blank" href="http://www.douban.com/link2?type=buy&amp;subject=2245914&amp;vendor=welan&amp;url=http%3A//www.wl.cn/2859834/">蔚蓝网</a> (<a target="_blank" href="http://www.douban.com/link2?type=buy&amp;subject=2245914&amp;vendor=welan&amp;url=http%3A//www.wl.cn/2859834/">RMB 25.2</a>) </li>
	      <li><a target="_blank" href="http://www.douban.com/link2?type=buy&amp;subject=2245914&amp;vendor=bookschina&amp;url=http%3A//www.chanet.com.cn/click.cgi%3Fa%3D35059%26d%3D9742%26u%3D%26e%3D%26url%3Dhttp%3A//www.bookschina.com/2476528.htm">中国图书网</a> (<a target="_blank" href="http://www.douban.com/link2?type=buy&amp;subject=2245914&amp;vendor=bookschina&amp;url=http%3A//www.chanet.com.cn/click.cgi%3Fa%3D35059%26d%3D9742%26u%3D%26e%3D%26url%3Dhttp%3A//www.bookschina.com/2476528.htm">RMB 25.2</a>) </li>
      </ul>
    <?php corner_end();?></dd>
	<dd class="sc"><?php corner_start();?>
	<div class="h2">中国崛起策PDF版本</div>
		<iframe scrolling="no" marginheight="0" marginwidth="0" frameborder="0" style="width:240px;height:66px;margin:3px;padding:0;background-color:#ffffff;" src="http://cid-0b88dcc4eabdd13c.skydrive.live.com/embedrowdetail.aspx/Public/%e9%98%85%e5%be%ae%e5%a0%82PDF%e7%89%88/%e4%b8%ad%e5%9b%bd%e5%b4%9b%e8%b5%b7%e7%ad%96.pdf"></iframe>
		<iframe scrolling="no" marginheight="0" marginwidth="0" frameborder="0" style="width:240px;height:66px;margin:3px;padding:0;background-color:#ffffff;" src="http://cid-0b88dcc4eabdd13c.skydrive.live.com/embedrowdetail.aspx/Public/%e4%b8%ad%e5%9b%bd%e5%b4%9b%e8%b5%b7%e7%ad%96/%e4%b8%ad%e5%9b%bd%e5%b4%9b%e8%b5%b7%e7%ad%96IIdawei%e8%af%84%e8%ae%ba.pdf"></iframe>
	<?php corner_end();?></dd>
	<dd class="sc"><?php corner_start();?>
		<?php include (TEMPLATEPATH . '/subscribe.php'); ?>
	<?php corner_end();?></dd>

</div></div>
<?php //include (TEMPLATEPATH . '/indexsidebar.php'); 
?>
<?php get_footer(); ?>