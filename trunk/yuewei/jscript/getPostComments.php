<?php
	require_once('../../../../wp-config.php');
	
header("Content-type: text/xml; charset=UTF-8");
$num = 6;
$start = isset($_REQUEST['start'])?(int)($_REQUEST['start']):0;
$prev = $start - $num;
$next = $start + $num;
$total = 6;
$ID=isset($_REQUEST['id'])?(int)($_REQUEST['id']):1;
get_recent_post_comments_div($start,$ID, $num);
?>
<table width = "100%"><tr><td align="left" width = "30%">
<?php if ($prev >= 0) { ?>
<a href="javascript:ajaxShowPost('<?php echo get_settings('home');?>/wp-content/themes/yuewei/jscript/getPostComments.php?id=<?php echo $ID;?>&start=<?php echo $prev;?>&name=<?php echo $comment_author;?>&refresh='+parseInt(Math.random()*99999999), 'reco');">Newer</a>
<?php }?>
</td>
<td align="center">
<?php $start1 = $start+1;$end1=$start+$total;echo $start1." - ".$end1; ?>
</td>
<td align="right" width="30%">
<?php if($total == $num) {?>
<a href="javascript:ajaxShowPost('<?php echo get_settings('home');?>/wp-content/themes/yuewei/jscript/getPostComments.php?id=<?php echo $ID;?>&start=<?php echo $next;?>&name=<?php echo $comment_author;?>&refresh='+parseInt(Math.random()*99999999), 'reco');">Older</a>
<?php }?>
</td></tr></table>