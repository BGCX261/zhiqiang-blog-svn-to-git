<?php
	require_once('../../../../wp-config.php');
$num = 6;
$start = isset($_REQUEST['start'])?(int)($_REQUEST['start']):0;
$prev = $start - $num;
$next = $start + $num;
?>
<?php get_recent_comments_div($start, "SP", $num);?>
<table width = "100%"><tr><td align="left" width = "30%">
<?php if ($prev >= 0) { ?>
<a href="javascript:ajaxShowPost('<?php echo get_settings('home');?>/wp-content/themes/yuewei/jscript/getComments.php?start=<?php echo $prev;?>&refresh='+parseInt(Math.random()*99999999), 'reco');">Newer</a>
<?php }?>
</td>
<td align="center">
<?php $start1 = $start+1;echo $start1." - ".$next; ?>
</td>
<td align="right" width="30%">
<a href="javascript:ajaxShowPost('<?php echo get_settings('home');?>/wp-content/themes/yuewei/jscript/getComments.php?start=<?php echo $next;?>&refresh='+parseInt(Math.random()*99999999), 'reco');">Older</a>
</td></tr></table>