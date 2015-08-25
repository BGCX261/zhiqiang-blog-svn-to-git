<?php
/*
Template Name: photo
*/
?>

<?php get_header(); 
$user = "mathzqy";
?>
<style>
	a img{border:none;}
	.grey{font-size:small;
	color:grey;
	}
	
	.photobigbox{
	background:transparent url(/images/album.gif) no-repeat scroll left center;
	height:194px;
	text-align:center;
	width:194px;
	margin:0pt auto;
	}
	.photosmallbox{
	padding-top:16px;
	text-align:center;
	}
	.album,.photo{
	float:left;
	width:194px;
	}
	.album img, .photo img{
	border:2px solid #5C7FB9;
	width:160px;
	height:160px;
	}
	.center{text-align:center;}
	.albumtitle{height:45px;text-align:center;}
	.smallpicture{float:left;}
	.picturebox{width:164px; height:164px; padding:10px;text-align:center;}
	.picturebox img{border:2px solid #5C7FB9;}
	.pmenu{background:transparent url(/images/picasaweb.gif) no-repeat scroll right 0;}
	
	#photo-list-div, #show-photo-div, #next-photo-preview{
		clear:both;
	}
	#show-photo-div, #next-photo-preview {
		display:none;
		padding-bottom:15px;
	}
	#previous, #next {max-width:128px;height:96px;}
</style>
	<div class="sc" style="padding-bottom:10px;"><?php corner_start("");?>
		<div style="width:100%">
			<?php include_once("webpicasa.php");?>
		</div>
		<div style="clear:both"></div>
	<?php corner_end();?></div>
	</div></div>

	<div id="sidebar"><div id="innersidebar">
		<dl>
			<dd class="sc"><?php corner_start("");?><ul>
				<?php albumhead();?>
				</ul>
			<?php corner_end();?></dd>
		</dl>
	</div></div>
<?php get_footer(); ?>