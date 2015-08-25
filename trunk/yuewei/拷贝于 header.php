<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

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
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="http://feeds.feedburner.com/zhiqiang" />
<?php wp_head(); ?>
<!--[if lt IE 6]>
<style>
#ajax{position:absolute;top:expression(eval(document.body.scrollTop + 5));}
</style>
<![endif]-->
</head>

<body>

<div id="wrapper">
	<div id="header">
		<div id="ajax">Loading ...</div>
		<a id="home" href="<?php echo get_settings("home");?>"> </a>
		<div id="user">
			<span id="login">欢迎，guest</span>, <a href="http://zhiqiang.org/bbs/">注册</a> | <a href="http://zhiqiang.org/bbs">登陆</a> | <a href="http://zhiqiang.org/blog/wp-admin/">管理</a>
		</div>
		<div id="navigation">
			<ul id="miniflex">
				<?php if (is_home()) : ?>
				<li class="page_item current_page_item"><a href="<?php echo get_settings('home'); ?>">首页</a></li>
				<?php else: ?>
				<li class="page_item"><a href="<?php echo get_settings('home'); ?>">首页</a></li>
				<?php endif; ?>
				<?php wp_list_pages('title_li=&sort_column=menu_order&depth=1&exclude=477,616'); ?> 

			</ul>
			<form id="searchForm" class="alignright nomargin" action="<?php echo get_settings("home");?>/search.php">
					<span style="vertical-align:middle"><input type="text" name="q"/> <input type="submit" value="搜索"
 /></span>		
 			</form>
		</div>
	</div>
	<div class="clear"></div>
	<div id="content">
		<div id="left">
