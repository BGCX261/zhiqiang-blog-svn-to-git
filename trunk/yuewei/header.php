<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php 
function corner_start($c=""){if ($c)$c=" $c"; echo "<div class='corner'><i class='c5'></i><i class='c3'></i><i class='c2'></i><i class='c1'></i></div><div class='scc$c'>";}
function corner_end(){echo "</div><div><b class='c1'></b><b class='c2'></b><b class='c3'></b><b class='c5d'></b></div>";}
?>
<head>
 <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

 <title><?php
  if(is_single())
  {
   the_title();
   echo " @ ";
   bloginfo("name");
  }
  else
  {
   bloginfo("name");
   wp_title();
  }?></title>
 
 <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
 <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
 <link rel="stylesheet" href="/blog/wp-content/themes/yuewei/style.css" type="text/css" media="screen" />
 <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="http://feeds.feedburner.com/zhiqiang" />
<?php wp_head(); ?>
</head>

<body>

<div id="wrapper">
 <div id="header">
 </div>
 <div id="content">
  <div id="left"><div id="innerleft">