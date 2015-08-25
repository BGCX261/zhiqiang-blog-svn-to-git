<?php
	require_once('../../../../wp-config.php');
	$id = (int)$_REQUEST['id'];
	$fanfou = get_last_fanfou($id, 180);
?>
<?php /*?>
<?php echo $fanfou==''?($id>0?'后面没有了，往前翻吧':'前面没有了，往后翻吧'):$fanfou;?><span class="more"><a id="nexttwitter" <?php if($fanfou == '') echo "class='disable'";?> href="#"  onclick="$('#twitter div').html('loading...').load(blogurl+'/wp-content/themes/yuewei/jscript/twitter.php?id=<?php echo  ($fanfou==''&&$id>0)?$id:$id+1;?>'); return false;"></a><a id="pretwitter" <?php if($id-1<0) echo "class='disable'";?> href="#" onclick="$('#twitter div').html('loading...').load(blogurl+'/wp-content/themes/yuewei/jscript/twitter.php?id=<?php echo  $id>=0?$id-1:-1;?>'); return false;"></a></span><?php */?>

<script type="text/javascript">
var fanfou_all = <?php echo get_option("fanfou_last_message");?>;
function show_fanfou(id) {
	if (id<0) id=fanfou_all.length-1;
	if (id>fanfou_all.length-1) id=0;
	$('#twitter div').html(fanfou_all[id].text+"<span class='more'><a id='nexttwitter' href='#'  onclick='show_fanfou("+(id+1)+");return false;'></a><a id='pretwitter' href='#' onclick='show_fanfou("+(id-1)+");return false;'></a></span>");
}
show_fanfou(<?php echo $id;?>);
</script>