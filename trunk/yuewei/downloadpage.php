<?php
/*
Template Name: download
*/
?>

<?php get_header(); ?>
<style>
#filelist ul{
margin:0 0 0 20px;
}
#filelist li{
list-style-type:none;
}
#filelist span{
color:grey;
font-size:0.8em;
}
.folder{
background:#FFF url(/blog/wp-content/themes/yuewei/images/folder.png) no-repeat scroll 0 5px;
padding-left:18px;

}
.file{
background:#FFF url(/blog/wp-content/themes/yuewei/images/file.png) no-repeat scroll 0 2px;
padding-left:18px;

}
.img{
background:#FFF url(/blog/wp-content/themes/yuewei/images/img.png) no-repeat scroll 0 2px;
padding-left:18px;

}
.pdf{
background:#FFF url(/blog/wp-content/themes/yuewei/images/pdf.png) no-repeat scroll 0 2px;
padding-left:18px;

}
.doc{
background:#FFF url(/blog/wp-content/themes/yuewei/images/doc.png) no-repeat scroll 0 2px;
padding-left:18px;

}
.zip{
background:#FFF url(/blog/wp-content/themes/yuewei/images/zip.png) no-repeat scroll 0 2px; 
padding-left:18px;

}
.chm{
background:#FFF url(/blog/wp-content/themes/yuewei/images/chm.png) no-repeat scroll 0 2px;
padding-left:18px;

}
#searchfile {
position:fixed;
}
</style>
<div class="sc">
<p><small>注：此页面为自动生成页面，为阅微堂拥有或者修改之文档，亦有互联网收集之文档和电子书，如果这里的文件侵犯了你的权益，请Email至mathzqy at gmail dot com.</small></p>
<ul id="filelist" style="">
<?php
	include_once(TEMPLATEPATH . '/jscript/filelist.php');
	filelist("", "file");
	filelist("", "fold");
	
	$file = isset($_REQUEST["file"]) ?  $_REQUEST['file'] : "";
	if ($file != "") {
		
		$file  	= iconv("GB2312", "UTF-8", $file);
		$t 		= explode("/", $file);
		$file 	= $t[count($t)-1];	
		$text   = explode(".", $file);
		$text	= $text[0];
	} 
?>
</ul>
</div>
</div>
<div id="sidebar">
<ul>
	<li class="sc posts" id="searchfile">
	<?php if ($file == ""):?>
		<h2><a href="http://zhiqiang.org/blog/category/resource">类最新文章</a></h2>
		<ul>
			<?php get_same_category_post("681");?>		
		</ul>
	<?php else:?>
		<h2>"<?php echo $file;?>"的相关文章</h2>
		<ul>
			<?php search_result($text);?>
		</ul>
	<?php endif;?>
	</li>
</ul>
</div>
<?php get_footer(); ?>