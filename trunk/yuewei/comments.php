<?php // Do not delete these lines
	global $ajaxpost, $comments_b;
	$comments_b = $comments;
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
        if (!empty($post->post_password)) {
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {
				?>
				<p class="nocomments">This post is password protected. Enter the password to view comments.<p>
				<?php
				return;
            }
        }
	if(!$tablecomments && $wpdb->comments)
		$tablecomments = $wpdb->comments;
	// = $wpdb->get_results("SELECT * FROM $tablecomments WHERE comment_post_ID = '$id' AND comment_approved = '1' ORDER BY comment_date");
// You can start editing here
	$GLOBALS['comments_reply'] = array();

	function write_comment(&$c, $deep_id = -1, $color = true) {
		global $max_level;
		$comments_reply = $GLOBALS['comments_reply'];
		if ($c->comment_author_email=='mathzqy@gmail.com' || $c->comment_author_email=='math.zqy@gmail.com' || $c->comment_author_email=='zhang@zhiqiang.org')
			$style = ' class="mine"';
		else if ($color==true){$style=' class="borderc1"';$color=!$color;}
		else{$style=' class="borderc2"';$color=!$color;}
?>
		<li id="comment-<?php echo $c->comment_ID ?>" <?php echo $style?>><div class="commenthead">At <?php echo mysql2date('Y.m.d H:i', $c->comment_date);?>, <a name='comment-<?php echo $c->comment_ID ?>'></a><span><?php echo get_comment_author_link();?></span> said: </div>
	<div class="body">
			<?php comment_text();?>
		</div>
		<div class="meta">
			<?php
			global $user_ID, $post;
			get_currentuserinfo();
			if (user_can_edit_post_comments($user_ID, $post->ID) || ($GLOBALS['cmtDepth'] < $max_level))
				echo '[';
			//	comment_favicon();
				edit_comment_link('Edit', '',(($GLOBALS['cmtDepth'] < $max_level)?'|': ''));
					if ($GLOBALS['cmtDepth'] < $max_level) {
						if ( get_option("comment_registration") && !$user_ID )
							echo '<a href="'. get_option('siteurl') . '/wp-login.php?redirect_to=' . get_permalink() .'">Log in to Reply</a> ]';
						else
							echo '<a href="javascript:moveForm('.$c->comment_ID.')" title="reply">Reply</a>';
					}
			if (user_can_edit_post_comments($user_ID, $post->ID) || ($GLOBALS['cmtDepth'] < $max_level))
				echo ']</div>';
					if ($comments_reply[$c->comment_ID]) {
						$id = $c->comment_ID;
						if($GLOBALS['cmtDepth'] < $max_level )
							echo '<ul>';
		foreach($comments_reply[$id] as $c) {
							$GLOBALS['cmtDepth']++;
							if($GLOBALS['cmtDepth'] == $max_level)
								write_comment($c, $c->comment_ID, $color);
							else
								write_comment($c, $deep_id, $color);
							$GLOBALS['cmtDepth']--;
		}
						if($GLOBALS['cmtDepth'] < $max_level )
							echo '</ul>';
					}
					echo '</li>';
	}
?>
<div>
<a href="<?php echo get_permalink();?>" onclick="window.open('http://www.addthis.com/bookmark.php?wt=nw&pub=mathzqy&url='+encodeURIComponent(location.href)+'&title='+encodeURIComponent(document.title), 'addthis', 'scrollbars=yes,menubar=no,width=620,height=520,resizable=yes,toolbar=no,location=no,status=no,screenX=200,screenY=100,left=200,top=100'); return false;" title="Bookmark using any bookmark manager!" target="_blank">添加此文到在线收藏夹</a>, 
<a href="http://feeds.feedburner.com/zhiqiang" onclick="window.open('http://www.addthis.com/feed.php?pub=mathzqy&h1=http%3A%2F%2Ffeeds.feedburner.com%2Fzhiqiang&t1=', 'addthis', 'scrollbars=yes,menubar=no,width=620,height=520,resizable=yes,toolbar=no,location=no,status=no,screenX=200,screenY=100,left=200,top=100');return false;">订阅阅微堂到RSS在线阅读器</a>
</div>
<h2 class="postmeta"> <?php the_tags("keywords: ");?></h2>
<div class="clear"></div>
<table><tr>
	<td class="relate" valign="top">
		<div class="h2">Related</div>
		<ul class="relate posts">
			<?php TC_ShowRelatedPostsForCurrentPost(1000,"",""); ?>
		</ul>
	</td>
	<td valign="top">
		<div class="h2">Same Category</div>
		<ul class="posts nowrap relate">
		<?php get_same_category_post($post->ID, 10); ?>
		</ul>
	</td>
</tr></table>
<div class="clear"></div>

<script type="text/javascript"> 
var blogurl="<?php echo get_settings('home');?>"; 
var needemail="<?php echo get_option('comment_registration');?>";
var nowurl="<?php echo get_settings("home");?>/wp-content/themes/yuewei/jscript/getpost.php?id=<?php echo $post->ID;?>";
var md5 = "<?php echo md5(get_settings("home"));?>";
</script>
<div class="h2"><?php comments_number('沙发', '板凳', '%条留言' );?></div>
<ul class="commentlist" id="comments">
	<?php
		if ($comments) :
			foreach ($comments as $c) {
				$GLOBALS['comments_reply'][$c->comment_reply_ID][] = $c;
			}
			$GLOBALS['cmtDepth'] = 0;$color=true;
			foreach($GLOBALS['comments_reply'][0] as $cmt) {
				$GLOBALS['comment'] = &$cmt;
				write_comment($GLOBALS['comment'], '-1', $color);
				$color=!$color;
			}
		else:
		endif;
	?>
</ul>
<?php if ('open' == $post->comment_status) : ?>
<div id="cmtForm">
<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
<p>You must be <a href="../../themes/default/<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logged in</a> to post a comment.</p>
<?php else : ?>
<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" onsubmit="AjaxSendComment();return false;">
<?php if ( $user_ID ) : ?>
<p>Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">Logout &raquo;</a></p>
<?php else : ?>
<div id="cai" style="display:none;">
<a id='ca' href="#"><b>zhiqiang</b></a>(<a href="#" onclick="ecai();return false;"><i>change</i></a>) will say:
</div>
<div id="caie">
<label for="author">昵称</label>
<input type="text" name="author" id="author" value="<?php if(isset($ajaxpost)&&$ajaxpost)echo $comment_author?>" tabindex="11" onclick="this.select();"/><span id="authorrequire">(Required)</span><br/>
<label for="email">邮件</label>
<input type="text" name="email" id="email" value="<?php if(isset($ajaxpost)&&$ajaxpost)echo $comment_author_email?>" tabindex="12"  onclick="this.select();"/><span id="emailrequire">(Required, not published)</span><br/>
<label for="url">网址</label>
<input type="text" name="url" id="url" value="<?php if(isset($ajaxpost)&&$ajaxpost)echo $comment_author_url; ?>" tabindex="13"  onclick="this.select();"/> <br/><?php do_action('comment_form', $post->ID); ?>
</div>
<?php endif; ?>
<table width="100%"><tr><td><textarea name="comment" id="comment" tabindex="14" rows="6" cols="70"></textarea></td></tr></table>
<input value="Say it!" name="submit" type="submit" tabindex="15"/>
<input id="reRoot" type="button" onclick="javascript:moveForm(0)" style="display:none" value="Cancel" tabindex="16"/>
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
<input type="hidden" name="comment_reply_ID" id="comment_reply_ID" value="0" />
<?php do_action('comment_form', $post->ID); ?>
</form>
</div>
<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>