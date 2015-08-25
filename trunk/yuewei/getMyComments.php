<?php
	require_once('../../../../wp-config.php');
	
header("Content-type: text/xml; charset=UTF-8");
$num = 6;
$start = isset($_REQUEST['start'])?(int)($_REQUEST['start']):0;
$prev = $start - $num;
$next = $start + $num;
$total = 0;
		$comment_author = isset($_REQUEST['name']) ? $_REQUEST['name']: "anonymous";
		
function get_recent_comments_name($start = 0, $author = "", $div = "SP", $no_comments = 5, $before = '<li>', $after = '</li>', $show_pass_post = false) {

	global $wpdb, $tablecomments, $tableposts, $total;
	$request = "select T1.comment_post_ID, T1.comment_date, T1.comment_ID, T1.comment_content, T1.comment_author, T1.comment_date, T1.comment_reply_ID from $tablecomments as T1 left join $tablecomments as T2 ON (T2.comment_author = '$author' OR T2.comment_ID = 1) WHERE ((T2.comment_author = '$author' AND T2.comment_ID = T1.comment_reply_ID) OR (T1.comment_author = '$author' AND T2.comment_ID = 1)) ";
    $request .= " ORDER BY T1.comment_date DESC LIMIT $start, $no_comments";
    $comments = $wpdb->get_results($request);
    $output = '';

if(!empty($comments)){
    foreach ($comments as $comment) {
$total = $total +1;
       $comment_author = stripslashes($comment->comment_author);
       $comment_content = strip_tags($comment->comment_content);
       $comment_content = stripslashes($comment_content);
       $comment_excerpt =substr($comment_content,0,100);
	   $comment_excerpt = utf8_trim_1($comment_excerpt);
	   $posturl=get_permalink($comment->comment_post_ID);
       $permalink = $posturl."#comment-".$comment->comment_ID;
	   $posttitle=get_the_title($comment->comment_post_ID);
$commentdate=mysql2date('Y.m.d H:i', $comment->comment_date);
	   $output .= $before.'<a href="'.$comment->comment_author_url.'" title="作者网站" target="_blank">'.$comment_author.'</a>&#22312;&#25991;&#31456;<a href="'.$permalink.'" onclick="ajaxShowPost(\''.get_settings('home').'/wp-content/themes/yuewei/jscript/getpost.php?id='.$comment->comment_post_ID.'\', \''.$div.'\', \'comment-'.$comment->comment_ID.'\'); window.location.href=\'#'.'comment-'.$comment->comment_ID.'\';return false;" title="发表于'.$commentdate.'">'.$posttitle.'</a>&#35828;&#65306; <span class="grey">'.$comment_excerpt.'...</span>'.$after;
       }
      }
	   if($output == '')
	   {
	   		echo '<li>'.$author.', 您好！</li><li>你目前还没有发表任何留言，当你发表留言后，在这里可以直接察看最近你所发表过的留言以及他人对你的留言的回复</li>';
	   }
	   else{
	   	echo $author.'最近的留言以及获得的回复:';
		echo $output;
		}
}
	get_recent_comments_name($start, $comment_author, "SP", 6);
?>
<table width = "100%"><tr><td align="left" width = "30%">
<?php if ($prev >= 0) { ?>
<a href="javascript:ajaxShowPost('<?php echo get_settings('home');?>/wp-content/themes/yuewei/jscript/getMyComments.php?start=<?php echo $prev;?>&name=<?php echo $comment_author;?>&refresh='+parseInt(Math.random()*99999999), 'reco');">Newer</a>
<?php }?>
</td>
<td align="center">
<?php $start1 = $start+1;$end1=$start+$total;echo $start1." - ".$end1; ?>
</td>
<td align="right" width="30%">
<?php if($total == $num) {?>
<a href="javascript:ajaxShowPost('<?php echo get_settings('home');?>/wp-content/themes/yuewei/jscript/getMyComments.php?start=<?php echo $next;?>&name=<?php echo $comment_author;?>&refresh='+parseInt(Math.random()*99999999), 'reco');">Older</a>
<?php }?>
</td></tr></table>