	</div>
	<div class="clear"></div>
	<div id="header1">
  	<div id="usereg">
   	  <div align="right"><span id="login">guest</span> | <a href="http://zhiqiang.org/bbs/register.php">注册</a> | <a href="http://zhiqiang.org/bbs">BBS</a> | <a href="http://zhiqiang.org/blog/wp-admin/">管理</a> | <a href="javascript:window.location='http://www.google.com/translate_p?hl=en&langpair=zh-CN%7Cen&u=http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>';">English</a> | <a href="javascript:window.location='http://www.google.com/translate_p?hl=en&langpair=zh-CN%7Czh-TW&u=http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>';">繁体</a></div>
	  
  	</div>
    <div id="headerimg">
	  <h1><a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a></h1>
	  <div class="description"><?php hello_dolly();// bloginfo('description'); ?></div>
	</div>
	<div id="navi">
		<div id="search">
			<?php include (TEMPLATEPATH . '/searchform.php'); ?>
		</div>
	
		<ul id="nav">
<li class="page_item"><b class="b5"></b><b class="b3"></b><b class="b2"></b><b class="b1"></b> <a href="<?php echo get_settings('home'); ?>/" title="主页">主页</a></li>
<li class="page_item"><b class="b5"></b><b class="b3"></b><b class="b2"></b><b class="b1"></b> <a href="<?php echo get_settings('home'); ?>/link" title="链接">链接</a></li>
<li class="page_item"><b class="b5"></b><b class="b3"></b><b class="b2"></b><b class="b1"></b> <a href="<?php echo get_settings('home'); ?>/photo.html" title="相册">相册</a></li>
<li class="page_item"><b class="b5"></b><b class="b3"></b><b class="b2"></b><b class="b1"></b> <a href="<?php echo get_settings('home'); ?>/bbs" title="留言" rel="nofollow">留言</a></li>
<li class="page_item"><b class="b5"></b><b class="b3"></b><b class="b2"></b><b class="b1"></b> <a href="<?php echo get_settings('home'); ?>/about" title="关于">关于</a></li>
<li class="page_item"><b class="b5"></b><b class="b3"></b><b class="b2"></b><b class="b1"></b> <a href="<?php echo get_settings('home'); ?>/plugin" title="系统">系统</a></li>
		</ul>
	</div>
  </div>
	<div id="footer" class="sc"><?php corner_start("");?>
		<div>
			<a href="http://www.miibeian.gov.cn/" rel="nofollow">京ICP备06029788号</a> | <?php $visit_time = (string)timer_stop(0);
					 $num_query = (string)get_num_queries(); echo $visit_time."s & ".$num_query;?> | <a href="#" onclick="ajaxShowPost('http://zhiqiang.org/blog/cache.php?delete=true&url='+encodeURIComponent(document.location), 'genetime');return false;">Generated</a> at <span id="genetime"><?PHP
			$today=date("Y-m-d G:i:s");
			echo $today;
			?></span>
			 &#65372; <a href="http://creativecommons.org/licenses/by-nc-sa/1.0/deed.zh" 
			title="共同创作协议" rel="nofollow">&copy; Zhang-Zi</a> | <a 
			href="/blog/sitemap.php" title="网站地图">Sitemaps</a> | Power By <a href="http://www.wordpress.org">WordPress <?php bloginfo("version");?></a> | theme by <a href="http://zhiqiang.org/blog/">阅微堂</a>
		</div>
		
	<?php corner_end();?></div>
</div>
	<div id="ajax" class="loading">Loading...</div>
	<div id="module">Loading...</div>
	<div id="abmodule">Loading...</div>
<?php do_action('wp_footer'); ?>
	<?php if(defined("ISHOME") && ISHOME == true):?>
	<script src="http://zhiqiang.org/blog/wp-content/plugins/af-extended-live-archive/includes/af-extended-live-archive.js" type="text/javascript"></script>
	<?php endif;?>
	<?php //var_dump($wpdb->queries); ?>
	<!-- <?php if($visit_time > 1.0 && count($wpdb->queries) < 100)var_dump($wpdb->queries); ?> -->
</body>
</html>
