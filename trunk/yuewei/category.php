<?php get_header(); ?>

<div class="sc"><?php corner_start("");?>				
	<h2><?php _e('Archive for '); echo single_cat_title(); ?></h2>
	
	<ul class="liicon">
	<?php
		$myposts = get_posts('numberposts=1000&category='.$cat);
		foreach($myposts as $post) :
	?>
		<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endforeach; ?>
	</ul>	
<?php corner_end();?></div>
<?php get_sidebar(); ?>

<?php get_footer(); ?>
