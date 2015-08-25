<?php 
global $cache_directory, $snoopy_file;
$cache_directory	= "/home/mathzqy/domains/zhiqiang.org/public_html/blog/wp-content/themes/yuewei/cache/";			// cache directory
$snoopy_file	= "/home/mathzqy/public_html/blog/wp-includes/class-snoopy.php";

function cache_rss($rss_uri, $cache_rss_path) {
	global $snoopy_file;
	require_once($snoopy_file);
    $snoopy = new Snoopy;
	$snoopy->fetch($rss_uri);
    // this will copy the created tex-image to your cache-folder
        
	$rss_result = str_replace("$", "_", $snoopy->results);
		
	$cache_file = fopen($cache_rss_path, 'w');
	fputs($cache_file, $rss_result);
	fclose($cache_file);
	
	return $rss_result;
}

function get_rss_content($rss_uri, $time = 3600000) {
	global $cache_directory;
	
	$rss_hash = md5($rss_uri).".xml";
	$cache_rss_path = $cache_directory.$rss_hash;
	
	if (!is_file($cache_rss_path) || time()-filemtime($cache_rss_path) > $time) {
		$rss_content = $cache_rss($rss_uri, $cache_rss_path);
	} else
		$rss_content = file_get_contents($cache_rss_path);
	}
	
	return json_decode($rss_content);
}

?>