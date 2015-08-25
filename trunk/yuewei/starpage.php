<?php
/*
Template Name: star
*/
?>

<?php //get_header(); ?>
	<?php 
	require_once('jscript/feed.php');
	
	$posts = get_rss_content("http://www.google.com/reader/public/javascript/user/10834475335678415314/state/com.google/starred");
	
	var_dump($posts);
	
	?>


<?php //get_sidebar(); ?>

<?php //get_footer(); ?>