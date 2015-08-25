<?php
	require_once('../../../../wp-config.php');
	
	global $comment, $comments, $post, $wpdb, $authordata;
	$id = (int) $_REQUEST['id'];
	$pos = isset($_REQUEST['pos']) ? $_REQUEST['pos'] : "SP";
	global $ajaxpost;
	$ajaxpost = true;
query_posts('p='.$id);

	if(!have_posts())
		query_posts('page_id='.$id);

		if (0 == get_option('IACcommentorder')) { //comments ascending
		$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = '$id' AND comment_approved = '1' ORDER BY comment_date ASC");
		$comment_num = 1;
	} else { //comments descending
		$comments = $wpdb->get_results("SELECT * FROM $wpdb->comments WHERE comment_post_ID = '$id' AND comment_approved = '1' ORDER BY comment_date DESC");
		$comment_num = $wpdb->get_var("SELECT COUNT(*) FROM $tablecomments WHERE comment_post_ID = '$id' AND comment_approved = '1'");
	}
	
	$authordata = get_userdata($post->post_author);
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	<div class="post">
	
			<h2 class="posttitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title=""><?php the_title(); ?></a></h1>
			
			<div class="postmeta">
			<span class="red author"><?php the_author() ?></span><span class="time"><?php the_time('F j, Y') ?></span><span class="category"> <?php the_category(' ') ?></span>
			<?php edit_post_link(__('Edit'), ' &#183; ', ''); ?>
			</div>
			
			<div class="postentry">
				<?php the_content("<p>Read the rest of this entry &raquo;</p>"); ?>
			<?php wp_link_pages(); ?>
			</div>
	<?php comments_template(); ?>
	<?php endwhile; else: ?>
		<p>这篇文章已经不见了</p>
	<?php endif; ?>
		<div style="text-align:center; font-size:150%"><a href = "#" onclick="window.location.hash = 'wrapper'; window.location.hash='<?php echo $id;?>';return false;">看完了，让我回到文章列表</a>
		</div>