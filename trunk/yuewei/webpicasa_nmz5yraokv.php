<?php 
### Require WordPress Header

global $albumid, $albumsfeed, $photosfeed, $max_height, $np, $smallsize, $bigsize, $username, $my_numpics, $pwa_directory, $snoopy_file, $picasa_uri;


// user defined
$username 	= "mathzqy";		// your user name
$bigsize	= "?imgmax=800";	// large image size
$smallsize	= "?imgmax=160";	// small image size
$max_height = 600;				// max image height
$pwa_directory	= ABSPATH."/wp-content/themes/yuewei/cache/";			// cache directory
$snoopy_file	= ABSPATH."/wp-includes/class-snoopy.php";
$picasa_uri		= "http://zhiqiang.org/blog/wp-content/themes/yuewei/webpicasa.php";

// input 
$albumid	= isset($_REQUEST['albumid'])?$_REQUEST['albumid']:'';
$np			= isset($_REQUEST['np'])?(int)$_REQUEST['np']:-1;


if (isset($_REQUEST['json'])) {
	header("Cache-Control: public");
	header("Pragma: cache");
	$offset = 60*60*24;
	$ExpStr = "Expires: ".gmdate("D, d M Y H:i:s",time() + $offset)." GMT";
	header($ExpStr);
	header($LmStr);
	header('Content-Type: text/javascript; charset: UTF-8');
	get_json_content(true);
	
	exit();
}

function get_rss_uri() {
	global $albumid, $username;
	if ($albumid) return "http://picasaweb.google.com/data/feed/base/user/$username/albumid/$albumid?category=photo&alt=json&access=public";
	else return "http://picasaweb.google.com/data/feed/base/user/$username?category=album&alt=json&access=public";
}

function get_rss_content() {
	global $snoopy_file, $pwa_directory;
	$rss_uri = get_rss_uri();
	$rss_hash = md5($rss_uri);
	$cache_rss_path = $pwa_directory.$rss_hash;
	
	if ( !is_file($cache_rss_path)) {
		require_once($snoopy_file);
     	$snoopy = new Snoopy;
		$snoopy->fetch($rss_uri);
        // this will copy the created tex-image to your cache-folder
        
		$rss_result = str_replace("$", "_", $snoopy->results);
		
		$cache_file = fopen($cache_rss_path, 'w');
		fputs($cache_file, $rss_result);
		fclose($cache_file);	
	} else {
		$rss_result = file_get_contents ($cache_rss_path);
	}
	
	$rss_result = json_decode($rss_result);
	return $rss_result;   
	
}

function album_list() {
	global $albumsfeed;
	$albumsfeed = get_rss_content();
	
    
    echo "
		<h3 style='margin-left:3px'>相册首页</h3>
			<div id='albumlist'>";
    
    for ($i = 0; $i < count($albumsfeed->feed->entry); $i++ ) {
		$album 		= $albumsfeed->feed->entry[$i];
		$img_base 	= $album->media_group->media_content[0]->url;
		
        $id_begin 	= strpos($album->id->_t, 'albumid/') + 8;
        $id_end 	= strpos($album->id->_t, '?');
        $id_base 	= substr($album->id->_t, $id_begin, $id_end - $id_begin);
        $img_update = substr($album->published->_t, 0, 10);
        echo "
				<div class='album'>
					<div class='photobigbox'>
						<div class='photosmallbox'>
							<a class='standard' href='?albumid=$id_base'>
								<img src='$img_base?imgmax=160&crop=1' class='pwimages' />
							</a>
						</div>
					</div>
					<div class='albumtitle'>
						<a class='title' class='standard' href='?albumid=$id_base'>{$albumsfeed->feed->entry[i]->title->_t}</a>
						<div class='grey'>$img_update</div>
					</div>
				</div>
		";
    }
    
	echo "
			</div>";
}

function photo_list() {
	global $my_numpics, $photosfeed, $albumid;	    
    $photosfeed = get_rss_content();
    
    $my_numpics = $photosfeed->feed->openSearch_totalResults->_t;
    
    echo "
	<h3 style='margin-left:3px'>
		<a class='standard' href='?'>相册首页</a> &gt; {$photosfeed->feed->title->_t}&nbsp;[共{$my_numpics}张照片]
	</h3>
	<div id='photolist'>";
    
    for ($i = 0; $i < count($photosfeed->feed->entry); $i ++ ) {
        $img_base = $photosfeed->feed->entry[$i]->media_group->media_content[0]->url;
        $link_url = "?albumid=".$albumid;
        $width = (int)($photosfeed->feed->entry[$i]->media_group->media_content[0]->width);
        $height = (int)($photosfeed->feed->entry[$i]->media_group->media_content[0]->height);
        $margin = 0;
		$img_width = 160;
		$img_height = 160;
        if ($width > $height)  
			$img_height = floor(160*$height/$width);
		else
			$img_width 	= floor(160*$width/$height);	
        $margin = floor(80 - $img_height/2);
        
        echo "
		<div class='smallpicture'>
			<div class='picturebox'>
				<a href='$link_url&np=$i'>
					<img  style='margin:{$margin}px 0;width:{$img_width}px;height:{$img_height}px;' src='$img_base?imgmax=160' class='pwimages'/>
				</a>
			</div>
		</div>";    
    }
    
	echo "
	</div>";
}

function show_photo() {
	global $my_numpics, $photosfeed, $np, $bigsize, $smallsize, $albumid, $max_height;
	
	$photosfeed = get_rss_content();
	$photofeed	= $photosfeed->feed->entry[$np];
	$albumname	= $photosfeed->feed->title->_t;
	$my_numpics = $photosfeed->feed->openSearch_totalResults->_t;

    $img_title 	= $photofeed->title->_t;
    $img_width 	= (int)$photofeed->media_group->media_content[0]->width;
    $img_height = (int)$photofeed->media_group->media_content[0]->height;
    $img_base 	= $photofeed->media_group->media_content[0]->url;
    
	$np1 = $np + 1;
    $current_index_text = "<span id='picindex'>$np1</span> of $my_numpics";
    
    echo "
	<h3 style='margin-left:3px'>
		<a class='standard' href='?'>相册首页</a> &gt; <a class='standard' href='?albumid=$albumid'>$albumname</a> &gt; $current_index_text
	</h3>
    
    <table  style='margin:0 auto;border:1px solid #ccc;width:99%'>
		<tr valign=top>
			<td width='20%' align='left'>
				<a href='?albumid=$albumid'>«View Album</a>
			</td>
			<td width='30%' align='right'>
				<a onclick='navi(-1);return false;' href='javascript:;'  >			
					<img border=0 alt='Previous item' src='/images/left.gif'>
				</a>
			</td>
    		<td> 
			</td>
			<td width='30%' align='left'> 
				<a onclick='navi(1);return false;' href='javascript:;'>
					<img border=0 alt='Next item' src='/images/right.gif'>
				</a>
			</td>
			<td width='20%' align='right'>
				<a id='zoom' href='$img_base' target='_blank' title='察看原图'>
					<img src='/images/zoom_normal.gif' alt='view original'/>
				</a>
			</td>
		</tr>
	</table>";
    
    $display_height = $max_height;
    if ($img_height < $display_height) {
    	$display_height = $img_height;
    }

    echo "
	<div id='picbox' style='text-align:center'>
		<span id='imgdes' style='margin-left:2px'>
			{$photofeed->media_group->media_description->_t}
		</span>
		<p>
			<a border=0 href='javascript:;' onclick='navi(1);return false;' title='点击显示下一张'>
				<img id='picture' height='{$display_height}px'   src='$img_base$smallsize' class='pwimages' />
			</a>
		</p>
	</div>";
}


if ($np >= 0)
	show_photo();
else if ($albumid)
	photo_list();
else
	album_list();
	
	
function get_json_content($echo = true) {
	global $photosfeed, $pwa_directory;
	
	$album_md5	= md5($albumid).".js";
	if (true || !is_file($pwa_directory.$album_md5)) {
		//if ($photosfeed) 
		$photosfeed = get_rss_content();
		
		$src = Array();
		$des = Array();
		$total = count($photosfeed->feed->entry);
		for ($i = 0; $i < $total; $i ++ ) {
			$src[$i] = $photosfeed->feed->entry[$i]->content->src;
			$des[$i] = $photosfeed->feed->entry[$i]->media_group->media_description->_t;
		}
		
		$json->total = $total;
		$json->src	 = $src;
		$json->des 	 = $des;

		$json_text	 = "var photolist=".json_encode($json);
		$cache_file = fopen($pwa_directory.$album_md5, 'w');
		fputs($cache_file, $json_text);
		fclose($cache_file);
	} elseif ($echo) {
		$json_text = file_get_contents($pwa_directory.$album_md5);
	}
	
	if ($echo)	echo $json_text;
}

function albumhead() {
	global $albumid, $albumsfeed, $photosfeed, $my_numpics, $np, $smallsize, $bigsize, $picasa_uri;
    if ($albumid != "") {
		$date = substr($photosfeed->feed->updated->_t, 0, 10);
        echo "
		<div class='photobigbox'>
			<div class='photosmallbox'>
				<img src='{$photosfeed->feed->icon->_t} class='pwimages' />
			</div>
		</div>
		<h4>
			{$photosfeed->feed->title->_t}({$photosfeed->feed->openSearch_totalResults->_t})
		</h4>
		<span>
			{$photosfeed->feed->subtitle->_t}
		</span>
		<p class='grey'>
			Last update at {$date}
		</p>";
		
        if ($np > -1) {
            $np1 = $np + 1;
            if ($np1 > $my_numpics - 1) $np1 = 0;
            $t1 = $photosfeed->feed->entry[$np1];
            $img_link1 = $t1->content->src;
            echo "
			<h4>
				预览下(上)一张
			</h4>
			<center>
				<a href='javascript:nextImg();' title='下(上)一张'>
					<img id='next' src='$img_link1$smallsize' style='width:160px;'/>
				</a>
			</center>
			<script type='text/javascript'>
				var nextImgLink = '$img_link1';
			</script>";
        }
    } else {
		$date = substr($albumsfeed->feed->updated->_t, 0, 10);
        echo "
		<div>
			<img src='{$albumsfeed->feed->icon->_t} class='pwimages' />
		</div>
		<h4>
			{$albumsfeed->feed->title->_t}({$albumsfeed->feed->openSearch_totalResults->_t})
		</h4>
		<span>
			{$albumsfeed->feed->subtitle->_t}
		</span>
		<p class='grey'>
			Last update at {$date}
		</p>";
    }
	
	if ($np >= 0):?>
		<script type="text/javascript"> 
			var np			= <?php echo $np;?>;
			var smallsize	= "<?php echo $smallsize;?>";
			var bigsize		= "<?php echo $bigsize;?>";
			
			function $(a) { return document.getElementById(a);}
			$("picture").src = $("picture").src.slice(0, -11) + bigsize;
			if (document.body.clientWidth < 1100) $("picture").height="535px";
			
			
			function getImgLink(n) {
				if (n < 0)	n = photolist.total - 1;
				if (n > photolist.total - 1) n = 0;
				return photolist.src[n];
			}
			function navi(num) {
				np = np + num;
				if (np < 0)	np = photolist.total - 1;
				if (np > photolist.total - 1) np = 0;
				var img_link = photolist.src[np];
				
				var img_link1 = getImgLink(np+1);
				$("picture").src = img_link + smallsize;
				$("zoom").href = img_link;
				$("picture").src = img_link + bigsize;
				$("imgdes").innerHTML = photolist.des[np];
				$("picindex").innerHTML = np + 1;
				if($("next"))$("next").src = img_link1 + smallsize;
				preloadImg(img_link1 + bigsize);
			}
			var img = new Image();
			function preloadImg(img1) {
				img.src = img1;
			}
			preloadImg(nextImgLink + bigsize);
			
			function testKeyCode( evt, intKeyCode ) { 
				if ( window.createPopup ) 
					return evt.keyCode == intKeyCode; 
				else 
				return evt.which == intKeyCode; 
			} 
			document.onkeydown = function ( evt ) { 
				if ( evt == null ) evt = event; 
				if ( testKeyCode( evt, 37 ) ) { navi(-1); } 
				if ( testKeyCode( evt, 39 ) ) { navi(1);return false; } 
			} 	
		</script>
		<script type="text/javascript" src="<?php echo $picasa_uri;?>?albumid=<?php echo $albumid;?>&json=">
		</script>
<?php 
	endif;
}

?>
<!-- MMDW:success -->