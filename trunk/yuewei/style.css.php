<?php
# the request file name
$file="style.css";

# Set Expires, cache the file on the browse 
header("Expires: ".gmdate("D, d M Y H:i:s", time()+31536000)." GMT");
header("Cache-Control: max-age=315360000");

# set the last modified time
$mtime = filemtime($file);
$gmt_mtime = gmdate('D, d M Y H:i:s', $mtime) . ' GMT';
header("Last-Modified: " . $gmt_mtime);

# does the file exist?
if (!file_exists($file)){ go_404(); }

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
}

# GZIP
if(extension_loaded('zlib')){ob_start();ob_start('ob_gzhandler');}

# echo the file's contents
echo implode('', file($file));

if(extension_loaded('zlib')){
ob_end_flush();
# set header the content's length;
# header("Content-Length: ".ob_get_length()); # (It doesn't work? )
ob_end_flush();
}
?>