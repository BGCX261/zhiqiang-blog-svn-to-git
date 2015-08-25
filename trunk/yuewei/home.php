<?php
/*
Template Name: home
*/
?>
<?php get_header(); ?>
<div class="sc"><?php corner_start("");?>
	<?php af_ela_super_archive(); ?>
	<div class="clear"></div>
<?php corner_end();?></div>

<div class="sc"><div class='corner'><i class='c5'></i><i class='c3'></i><i class='c2'></i><i class='c1'></i></div><div id="SP" class="scc">
<?php 
define("ISHOME", true);
$id = get_first_post(); //1;isset($_REQUEST['id']) ? $_REQUEST['id'] : get_first_post();
global $comment, $comments, $post, $wpdb, $authordata;
	$pos = isset($_REQUEST['pos']) ? $_REQUEST['pos'] : "SP";
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
	
			<h2 class="posttitle" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title=""><?php the_title(); ?></a></h2>
			
			<p class="postmeta"> 
			<span class="red author"><?php the_author() ?></span><span class="time"><?php the_time('F j, Y') ?></span><span class="category"> <?php the_category(' ') ?></span>
			<?php edit_post_link(__('Edit'), ' &#183; ', ''); ?>
			</p>
			
			<div class="postentry">
				<?php the_content("<p>Read the rest of this entry &raquo;</p>"); ?>
				<?php wp_link_pages(); ?>
			</div>
		</div>
		<?php comments_template(); ?>
				
	<?php endwhile; else : ?>

		<h2><?php _e('Not Found'); ?></h2>

		<p><?php _e('Sorry, but the page you requested cannot be found.'); ?></p>
		
		<h3><?php _e('Search'); ?></h3>
		
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>
<?php corner_end();?></div>
<?php //get_sidebar(); 
?>
<?php include (TEMPLATEPATH . '/indexsidebar.php'); 
?>
<?php get_footer(); ?>
