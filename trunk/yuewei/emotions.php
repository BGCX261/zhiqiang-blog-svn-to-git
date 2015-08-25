<?php
	require_once('../../../wp-config.php');
?>
<style>
*{margin:0;padding:0; list-style-type:none;}
#emotions{padding:5px;}
.emotion {width:24px;height:24px;float:left;}
.emotion img{ border:none; width:20px; height:20px;}
.alignright{text-align:right;}
.floatright{float:right;}
.floatleft{float:left;}
.clear:after{clear:both;}
.tab{
background-color:#334F8D;
cursor:move;
color:#fff;
height:25px;
overflow:hidden;
width:100%;
margin-bottom:10px;
}
</style>
	<table width="100%" class='tab'><tr><td>Insert Emotions</td><td align="right"><a href='#' onClick="top.document.editComment.callback(false);return false;"> <img border="0" src="http://localhost/blog/wp-includes/js/tinymce/plugins/inlinepopups/images/window_close.gif"/></a></td></tr></table>
<div id="emotions">
<?php 
	global $wpsmiliestrans;
	
	$siteurl = get_option('siteurl');
	foreach ( (array) $wpsmiliestrans as $smiley => $img ) {
		$smiley_masked = htmlspecialchars(trim($smiley), ENT_QUOTES);
		$wp_smiliesreplace = " <img src='$siteurl/wp-includes/images/smilies/$img' alt='$smiley_masked' class='wp-smiley'/> ";
		echo "<a class='emotion' href='#' onclick='top.document.editComment.callback(true, \" $smiley \");return false;' title='$smiley_masked'>$wp_smiliesreplace</a>";
	}
?>
</div>