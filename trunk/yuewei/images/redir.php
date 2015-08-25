<?php 
# this is the file style.css.php, who contains style.css
# set the request file name
$file = $_REQUEST['u'];


# Set Expires, cache the file on the browse
# Delete it if you don't want it
header("Expires:".gmdate("D, d M Y H:i:s", time()+15360000)."GMT");
header("Cache-Control: max-age=315360000");

# set the last modified time
$mtime = filemtime($file);
$gmt_mtime = gmdate('D, d M Y H:i:s', $mtime) . ' GMT';
header("Last-Modified:" . $gmt_mtime);

# output a mediatype header
$ext = array_pop(explode('.', $file));
switch ($ext){
case 'css':
 header("Content-type: text/css");
 break;
case 'js' :
 header("Content-type: text/javascript");
 break;
case 'gif':
 header("Content-type: image/gif");
 break;
case 'jpg':
 header("Content-type: image/jpeg");
 break;
case 'png':
 header("Content-type: image/png");
 break;
default:
 header("Content-type: text/plain");
	echo "xx";
}

echo implode('', file($file));
?>