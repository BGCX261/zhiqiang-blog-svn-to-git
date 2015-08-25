<?php 
$download_fold = "/home/mathzqy/domains/zhiqiang.org/public_html/download/";
function file_type($file,$type){
return eregi("\.($type)$",$file);
}

function typeoffile($file) {
	if (file_type($file, "jpg|jpeg|png|gif"))
		return "img";
	else if(file_type($file, "html|htm"))
		return "html";
	else if(file_type($file, "doc"))
		return "doc";
	else if(file_type($file, "pdf"))
		return "pdf";
	else if(file_type($file, "chm"))
		return "chm";
	else if(file_type($file, "zip|gz|rar"))
		return "zip";
	else
		return "file";
}

function filelist($fold, $type = "fold", $cen = 1) {
	global $download_fold;
	$cen1 = 3;
	$handle = opendir($download_fold . $fold);
	if ($handle) {
		$fold1	  = iconv("GB2312", "UTF-8", $fold);
		while ($filedir1 = readdir($handle)) {
			if ($filedir1[0] == '.' || $filedir1 == '..')	continue;
			$filename = $download_fold . $fold . "/". $filedir1;
			
			$filedir11 = iconv("GB2312", "UTF-8", $filedir1);
			
			if (is_dir($filename) == false && $type == "file") {
				$filetype = typeoffile($filedir1);
				$filesize = filesize($filename);
				$filetime = date ("Y年m月d日H:i:s.", filectime($filename));
				$filedir1 = urlencode($filedir1);
				
				echo "<li class=\"$filetype\"><a href='http://zhiqiang.org/download$fold1/$filedir1'>$filedir11</a><br/><span>大小：$filesize Bytes</span><span><a href=\"javascript:\"   onclick=\"ajaxShowPost('http://zhiqiang.org/blog/wp-content/themes/yuewei/jscript/searchfile.php?file=$fold/$filedir1&cen=$cen1&r='+parseInt(Math.random()*99999999), 'searchfile');return false;\">阅微堂上相关文章</a><span></li>";
			} else if (is_dir($filename) == true && $type == "fold"){
				$r = rand(1, 10000);
				$filedir1 = urlencode($filedir1);
				echo "<li class=\"folder\"><h$cen1><a href=\"javascript:\" onclick=\"if($('r$r').innerHTML==''){ajaxShowPost('http://zhiqiang.org/blog/wp-content/themes/yuewei/jscript/filelist.php?fold=$fold/$filedir1&cen=$cen1&r='+parseInt(Math.random()*99999999), 'r$r');}else{ $('r$r').style.display!='none'?$('r$r').style.display='none':$('r$r').style.display='block';}return false;\">$filedir11</a></h$cen1><ul id=\"r$r\" style=\"list-style-type:none;\"></ul></li>";
			}
		}
		closedir($handle);
	}
}

if (isset($_REQUEST["fold"])) {
	$fold 	= $_REQUEST["fold"];
	filelist ($fold, "fold");
	filelist ($fold, "file");
	
}

?>