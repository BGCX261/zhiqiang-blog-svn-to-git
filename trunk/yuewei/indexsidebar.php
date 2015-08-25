</div></div>

<div id="sidebar"><div id="innersidebar">
<dl>
<dd class="sc"><?php corner_start("");?>
<div class="h2">���˼�����԰������λ�</div>
<img src="/blog/wp-content/themes/yuewei/images/olympic-2008.jpg" width="272" height="157
 alt="I support Olympics 2008"/>
<?php echo corner_end();?></dd>
<dd class="sc"><?php corner_start("");?>
<div id="twitter"><div><?php last_fanfou(0, 180);?><span class="more"><a id="nexttwitter" href="#"  onclick="$('#twitter div').html('loading next...').load(jscript+'/twitter.php?id=1'); return false;"></a><a id="pretwitter" class='disable' href="#" onclick="$('#twitter div').html('loading previous...').load(jscript+'/twitter.php?id=-1'); return false;"></a></span></div></div>
<?php echo corner_end();?></dd>
<dd class="sc"><?php corner_start("");?>
	<?php include (TEMPLATEPATH . '/subscribe.php'); ?>
<?php echo corner_end();?></dd>

<?php if(false) :?>
<dd class="sc">
<div class="h2">搜索</div>
<p><form method="get" id="searchform" action="" onsubmit="vv = document.getElementById('searchbox').value; ajaxShowPost(encodeURI(jscript+'/ajaxsearch.php?s='
+vv), 'searchresult'); return false;"><input id="searchbox" name="s" size = "17" type="text" value="Ajax..." onclick="this.select();">
<input type="submit" value="Search" ></form>
</p>
<div id="searchresult"></div>
<p>
<form method="get" action="http://zhiqiang.org/blog/search.php">
<input type="text" value="站内显示结果..." onclick="this.select();" name="q" id="q" size="17">
<input type="submit" value="Google" >
</form> 
</p>
<div style="height:10px;"></div>
</dd>
<dd class="sc"><?php corner_start("");?><div class="h2">授权转载</div><ul><li>
希望在阅微堂转发原创作品（关于政治改革和崛起策评论）之网友，请将文章发送到管理员邮箱<br /><a class="email" href="#">mathzqy at gmail dot com</a>
</li></ul><?php echo corner_end();?></dd>
<?php endif; ?>

<dd id="listcomment" class="sc"><?php corner_start("");?>
	<div class="h2">最新评论&nbsp;<a class="refresh" href="javascript:ajaxShowPost(jscript+'/getComments.php?'+parseInt(Math.random()*99999999),  'reco');"></a></div>
  <ul id="reco" class="comments">
<?php $num = 6;
$start = isset($_REQUEST['start'])?(int)($_REQUEST['start']):0;
$prev = $start - $num;
$next = $start + $num;
?>
<?php get_recent_comments_div($start, "SP", $num);
?>
<table width = "100%"><tr><td align="left" width = "30%">
<?php if ($prev >= 0) { ?>
<a href="javascript:ajaxShowPost(jscript+'/getComments.php?start=<?php echo $prev;?>&refresh='+parseInt(Math.random()*99999999), 'reco');">Newer</a>
<?php }?>
</td>
<td align="center">
<?php $start1 = $start+1;echo $start1." - ".$next; ?>
</td>
<td align="right" width="30%">
<a href="javascript:ajaxShowPost(jscript+'/getComments.php?start=<?php echo $next;?>&refresh='+parseInt(Math.random()*99999999), 'reco');">Older</a>
</td></tr></table>

        </ul>
		<?php 	$comment_author = 'anonymous';
		if ( isset($_COOKIE['comment_author_'.COOKIEHASH]) ) {
			$comment_author = apply_filters('pre_comment_author_name', $_COOKIE['comment_author_'.COOKIEHASH]);
			$comment_author = stripslashes($comment_author);
			$comment_author = wp_specialchars($comment_author, true);
		}
		?>
<form method="post" action="" onsubmit="sss=document.getElementById('authorname').value; ajaxShowPost(encodeURI(jscript+'/getMyComments.php?refresh='+parseInt(Math.random()*99999999)+'&name='+sss), 'reco'); return false;"><input type=text id="authorname" name='authorname' size="12" maxlength="255" value="<?php echo $comment_author?>"  onclick="this.select();"><input value="'s comments" name="submit" type="submit" tabindex="5"></form>
<?php echo corner_end();?></dd>
<?php if (function_exists("fanfou_list_posts")):?>	
	<dd class="sc"><?php corner_start("noa comments");?>
		<div class="h2">Recently</div>
		<ul>
			<?php  fanfou_list_posts("title_li=");?>
		</ul>
	<?php echo corner_end();?></dd>
<?php endif; ?>
	<dd class="sc"><?php corner_start("posts");?>
		<div class="h2"><a href="http://zhiqiang.org/blog/recommend"  onclick="ajaxShowPost(jscript+'/randomgood.php?r='+parseInt(Math.random()*99999999), 'jinghuaqu');return false;">随便看看</a>&nbsp;<a class="refresh" href='#' onclick="ajaxShowPost(jscript+'/randomgood.php?r='+parseInt(Math.random()*99999999), 'jinghuaqu');return false;"></a></div>
		<ul id='jinghuaqu'>
			<?php get_same_category_post("677", 10, "", "RAND()", 780);?>
		</ul>
	<?php corner_end();?></dd>
	<dd class="sc"><?php corner_start("");?>
		<div class="h2">统计</div>
		<ul>
			<li class="author"><b><?php get_totalauthors(); ?></b>个注册用户</li>
			<li class="post"><b><?php get_totalposts(); ?></b>篇文章</li>
			<li class="comment"><b><?php get_totalcomments(); ?></b>条留言</li>
			<li class="link"><b><?php get_totallinks(); ?></b>个链接</li>
		</ul>
	<?php echo corner_end();?></dd>
</dl>
</div></div>
