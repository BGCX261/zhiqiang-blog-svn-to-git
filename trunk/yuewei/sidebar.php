</div></div>

<div id="sidebar"><div id="innersidebar">
<dl>
<?php 
if(function_exists("gltr_build_flags_bar")) { 
gltr_build_flags_bar(); 
} 
?>
<?php if(is_single()){
?>
<dd id="listcomment" class="sc"><?php corner_start("comments");?><div class="h2">此文章最新留言(共<?php comments_number('0', '1', '%' );?>条)</div><ul id="reco">
<?php 
$num = 6;global $post;$ID=$post->ID;
$start = isset($_REQUEST['start'])?(int)($_REQUEST['start']):0;
$prev = $start - $num;
$next = $start + $num;
get_recent_post_comments_div($start, $post->ID, $num);?>
<table width = "100%"><tr><td align="left" width = "30%">
<?php if ($prev >= 0) { ?>
<a href="javascript:ajaxShowPost('<?php echo get_settings('home');?>/wp-content/themes/yuewei/jscript/getPostComments.php?id=<?php echo $ID;?>&start=<?php echo $prev;?>&refresh='+parseInt(Math.random()*99999999), 'reco');">Newer</a>
<?php }?>
</td>
<td align="center">
<?php $start1 = $start+1;echo $start1." - ".$next; ?>
</td>
<td align="right" width="30%">
<a href="javascript:ajaxShowPost('<?php echo get_settings('home');?>/wp-content/themes/yuewei/jscript/getPostComments.php?id=<?php echo $ID;?>&start=<?php echo $next;?>&refresh='+parseInt(Math.random()*99999999), 'reco');">Older</a>
</td></tr></table>

</ul>
<?php corner_end();?></dd>
<?php
}
?>
	<dd class="sc"><?php corner_start("posts");?>
		<div class="h2">最新</div>
		<ul>
			<?php get_recent_posts_1(10);?>
		</ul>
	<?php corner_end();?></dd>	
	<dd class="sc"><?php corner_start("posts");?>
		<div class="h2"><a href="http://zhiqiang.org/blog/recommend">精华区</a></div>
		<ul>
			<?php get_same_category_post("677", 10, "", "RAND()", 780);?>
		</ul>
	<?php corner_end();?></dd>
	<dd class="sc"><?php corner_start("noa cat");?>
		<div class="h2">分类</div>
		<ul><?php wp_list_cats("sort_column=name&optioncount=1&feed=RSS"); ?></ul>
	<?php corner_end();?></dd>
	<dd class="sc"><?php corner_start("");?>
		<?php include (TEMPLATEPATH . '/subscribe.php'); ?>
	<?php corner_end();?></dd>
</ul>
</div></div> 
