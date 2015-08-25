<?php
/*
Template Name: link
*/
?>

<?php get_header(); ?>

<div class="sc"><?php corner_start("");?>
				<div class="postentry">
					<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
				<?php the_content("<p>Read the rest of this entry &raquo;</p>"); ?>
				<?php endwhile;endif;?>
				</div>
<?php corner_end();?></div>
<div id="link" class="sc"><?php corner_start("");?>
<style type="text/css">
#link ul{list-style:none;}
</style>
<ul>
<?php 
function get_links_list_ster($order = 'name', $hide_if_empty = 'obsolete') {
        $order = strtolower($order);

        // Handle link category sorting
        $direction = 'ASC';
        if ( '_' == substr($order,0,1) ) {
                $direction = 'DESC';
                $order = substr($order,1);
        }

        if ( !isset($direction) )
                $direction = '';

        $cats = get_categories("type=link&orderby=$order&order=$direction&hierarchical=0");

        // Display each category
        if ( $cats ) {
                foreach ( (array) $cats as $cat ) {
                        // Handle each category.

                        // Display the category name
                        echo '  <li id="linkcat-' . $cat->cat_ID . '" class="linkcat"><h2>' . $cat->cat_name . "</h2>\n\t<ul>\n";
                        // Call get_links() with all the appropriate params
                        get_links($cat->cat_ID, '<li>', "</li>", ": ", true, 'name', true);

                        // Close the last category
                        echo "\n\t</ul>\n</li>\n";
                }
        }
}
?>

<?php get_links_list_ster('_id'); ?> 
<?php //get_links('-1', '<li>', '</li>', '', FALSE, 'category' , TRUE, TRUE, -1, TRUE); 
?>
<?php  $commenter = wp_get_current_commenter();
extract($commenter);
if($comment_author_url!="")
echo "<li><ul><li><a href='$comment_author_url'>$comment_author</a></li></ul></li>";
?>
</ul>
<?php corner_end();?></div>

</div></div>

<div id="sidebar"><div id="innersidebar">
<dl>
	<dd class="sc"><?php corner_start("noa comments");?>
<script type="text/javascript" src="http://www.google.com/reader/ui/publisher-en.js"></script>
<script type="text/javascript" src="http://www.google.com/reader/public/javascript/user/10834475335678415314/state/com.google/starred?n=10&callback=GRC_p(%7Bc%3A%22-%22%2Ct%3A%22%5Cu9605%5Cu5FAE%5Cu5802%5Cu5171%5Cu4EAB%5Cu6587%5Cu7AE0%22%2Cs%3A%22true%22%2Cb%3A%22false%22%7D)%3Bnew%20GRC"></script>
	<?php corner_end();?></dd>	
	<dd class="sc"><?php corner_start("");?>
		<div class="h2">My Pages</div>
		<ul>
			<li><a href="http://zhiqiang.org">&#25105;&#30340;&#20027;&#39029;(&#33521;&#25991;)</a></li>
			<li><a href="http://www.douban.com/people/mathzqy" target="_blank">&#25105;&#30340;&#35910;&#29923;</a></li>
			<li><a href="http://www.flickr.com/photos/mathzqy/" target="_blank">&#25105;&#30340;Flickr</a></li>
			<li><a href="http://picasaweb.google.com/mathzqy" target="_blank">&#25105;&#30340;Google Web Picasa</a></li>
			<li><a href="http://mathzqy.googlepages.com" target="_blank">&#25105;&#30340;Google Pages</a></li>
			<li><a href="http://del.icio.us/mathzqy" target="_blank">&#25105;&#30340;delicious&#20070;&#31614;</a></li>
			<li><a href="http://mathzqy.spaces.msn.com" target="_blank">&#25105;&#30340;MSN Spaces</a></li>
		</ul>
	<?php corner_end();?></dd>
	
	<dd class="sc"><?php corner_start("");?>
<?php include (TEMPLATEPATH . '/subscribe.php'); ?>
			<a href="http://feeds.feedburner.com/zhiqiang"><img src="http://storyday.com/pub/fb/show.php?id=2" alt="Feedburner" /></a>		
	<?php corner_end();?></dd>
</dl>
</div></div>
<?php get_footer(); ?>