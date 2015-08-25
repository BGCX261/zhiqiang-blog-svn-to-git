<?php
/*

Copyright (c) 2005 by AvP (Punk[D.M])

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation 
files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, 
modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the 
Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE
LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR
IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
*/

// You can edit next:
$leader_character = ""; // The specially character before each search results;
$searchppost = false; // search posts with password or not (true: search; false: never)
$onepage = 10;		//每页显示多少结果，默认10条
$showpage = 5;		//当结果很多的时候，显示多少个页面索
//Don't edit next!
header("Content-type: text/xml; charset=UTF-8");
include_once("../../../../wp-config.php");

$results = false;
$wildcard = "%";
$search_term = "";

$from=0;
$pagenow = 1;
function quote_smart($value)
{
   // Stripslashes
   if (get_magic_quotes_gpc()) {
       $value = stripslashes($value);
   }
   // Quote if not integer
   if (!is_numeric($value)) {
       $value = mysql_real_escape_string($value);
   }
   return $value;
}

if (ISSET($_GET["s"]))
	$search_term = quote_smart($_GET["s"]);
if (ISSET($_GET["from"])){
	$from=(int)$_GET["from"];
	$pagenow = (int)($from/$onepage+1);
	}
if (ISSET($_GET["page"])){
	$pagenow=(int)$_GET["page"];
	$from=$pagenow*$onepage-$onepage;
}
	$search_term = addslashes_gpc($search_term);
	$search_term = preg_replace('/, +/', ' ', $search_term);
	$search_term = str_replace(',', ' ', $search_term);
	$search_term = str_replace('"', ' ', $search_term);
	$search_term = trim($search_term);
	$s_array = explode(' ',$search_term);
	
echo "<ul>";
if ($search_term != "") {
		$search = "SELECT ID, post_title FROM $wpdb->posts WHERE (post_title LIKE '$wildcard".$s_array[0]."$wildcard' OR post_content LIKE '$wildcard".$s_array[0]."$wildcard')";
		for ( $i = 1; $i < count($s_array); $i = $i + 1) {
			$search .= " AND (post_title LIKE '$wildcard".$s_array[$i]."$wildcard' OR post_content LIKE '$wildcard".$s_array[$i]."$wildcard')";
		}
		$search .= " ORDER BY post_date DESC";		
		$posts = $wpdb->get_results($search);
	if ($posts) {
		$results = true;
		$lle = count($posts);
		$start=$from+1;
		$to1=$from+$onepage;
		$to0=$from-$onepage;
		if($to1>$lle)	$to1=$lle;
		echo '正在显示'.$lle.'项中的第'.$start.'-'.$to1.'项:';
		$now =0;
				$totalpage=(int)(($lle+$onepage-1)/$onepage);
		$pagenowstart = $pagenow-(int)($showpage/2);
		if($pagenowstart<1) $pagenowstart=1;
		$pagenowend=$pagenowstart+$showpage-1;
		if($pagenowend>$totalpage) $pagenowend=$totalpage;
		$url="encodeURI('".get_settings("home")."/wp-content/themes/yuewei/jscript/ajaxsearch.php?s=";
?>
		<table width="100%" style="margin:0; padding:0; border-bottom:1px dashed #b0b0b0;"><tr>
		<td align="left" width="40px"><?php if($from>0){ ?><a href="#" onclick="ajaxShowPost(<?php echo $url;?><?php echo $search_term;?>&from=<?php echo $to0;?>'), 'searchresult'); return false;">前一页</a><?php }?></td>
		<td align="center"><?php for($i=$pagenowstart; $i<=$pagenowend; $i++){?> <?php if($i!=$pagenow) {?><a href="#" onclick="ajaxShowPost(<?php echo $url;?><?php echo $search_term;?>&page=<?php echo $i;?>'), 'searchresult'); return false;"> <?php }?><?php echo $i;?> <?php if($i!=$pagenow) {?></a><?php }?><?php }?></td>
		<td align="right" width="40px"><?php if($to1<$lle){ ?><a href="#" onclick="ajaxShowPost(<?php echo $url;?><?php echo $search_term;?>&from=<?php echo $to1;?>'),  'searchresult'); return false;">后一页</a><?php }?></td>
</tr></table>
<ul class="liicon">
<?php
		foreach($posts as $post){
			$now ++;
			if($now>$from && $now <= $from+$onepage)
			echo '<li>'.$leader_character.'<a href="'.get_permalink($post->ID).'" onclick = "ajaxShowPost(\''.get_settings('home').'/wp-content/themes/yuewei/jscript/getpost.php?id='.$post->ID.'\', \'SP\');return false;" title="'.htmlspecialchars($post->post_title).'">'.htmlspecialchars($post->post_title).'</a></li>';
		}
		?>
</ul>
		<table width="100%" style="margin:0; padding:0; border-top:1px dashed #b0b0b0;"><tr>
		<td align="left" width="40px"><?php if($from>0){ ?><a href="#" onclick="ajaxShowPost(<?php echo $url;?><?php echo $search_term;?>&from=<?php echo $to0;?>'), 'searchresult'); return false;">前一页</a><?php }?></td>
		<td align="center"><?php for($i=$pagenowstart; $i<=$pagenowend; $i++){?> <?php if($i!=$pagenow) {?><a href="#" onclick="ajaxShowPost(<?php echo $url;?><?php echo $search_term;?>&page=<?php echo $i;?>'), 'searchresult'); return false;"> <?php }?><?php echo $i;?> <?php if($i!=$pagenow) {?></a><?php }?><?php }?></td>
		<td align="right" width="40px"><?php if($to1<$lle){ ?><a href="#" onclick="ajaxShowPost(<?php echo $url;?><?php echo $search_term;?>&from=<?php echo $to1;?>'),  'searchresult'); return false;">后一页</a><?php }?></td>
</tr></table>
	<?php
	}
}
if (!$results)
	echo '<li>Your search - "'.$search_term.'" - did not match any documents.</li><li>Suggestions:<ol style="list-style:circle;"><li>Make sure all words are spelled correctly.</li><li>Try different keywords.</li><li>Try more general keywords.</li></ol></li>';
echo "</ul>";
?>