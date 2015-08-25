<?php
	require_once('../../../../wp-config.php');
	$file = isset($_REQUEST["file"]) ?  $_REQUEST['file'] : "";
	if ($file != "") {
		
		$file  	= iconv("GB2312", "UTF-8", $file);
		$t 		= explode("/", $file);
		$file 	= $t[count($t)-1];	
		$text   = explode(".", $file);
		$text	= $text[0];
	} else {
		die("no input");
	}
?>


		<h2>"<?php echo $file;?>"的相关文章</h2>
		<ul>
			<?php search_result($text);?>
		</ul>