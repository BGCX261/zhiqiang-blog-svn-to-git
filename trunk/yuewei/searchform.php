  <form id="searchform" action="<?php echo get_settings("home");?>/search.php" method="get">
			<input type="hidden" name="domains" value="zhiqiang.org"></input>
			<input type="text" name="q" size="18" maxlength="255" value="<?php echo isset($_REQUEST['q'])?$_REQUEST['q']:'search this site';?>" id="s" onclick="this.select();" tabindex="1"></input>
			<input type="submit" name="sa" value="" id="searchsubmit" style="font-size:0.9em;" tabindex="2"></input>
			<input type="hidden" name="sitesearch" value="zhiqiang.org" checked id="ss1"></input>
			<input type="hidden" name="client" value="pub-8597238596105099"></input>
			<input type="hidden" name="forid" value="1"></input>
			<input type="hidden" name="ie" value="UTF-8"></input>
			<input type="hidden" name="oe" value="UTF-8"></input>
			<input type="hidden" name="cof" value="GALT:#008000;GL:1;DIV:#336699;VLC:663399;AH:center;BGC:FFFFFF;LBGC:336699;ALC:0000FF;LC:0000FF;T:000000;GFNT:0000FF;GIMP:0000FF;FORID:11"></input>
			<input type="hidden" name="hl" value="zh-CN"></input>
  </form>