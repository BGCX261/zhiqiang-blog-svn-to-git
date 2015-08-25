<?php
/*
Template Name: about
*/
?>
<?php get_header(); ?>
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<div class="sc"><?php corner_start("post");?>
			<h2 id="post-<?php the_ID(); ?>"><?php the_title(); ?></h2>
			
<div class="postentry">	
			<?php the_content("<p>__('Read the rest of this page &raquo;')</p>"); ?>
			<?php wp_link_pages(); ?>
		</div>	
			<?php edit_post_link(__('Edit'), '<p>', '</p>'); ?>
			<?php // comments_template(); ?>
		<?php corner_end();?></div>
	<?php endwhile; endif; ?>
	<div class="sc" id="recent"><?php corner_start("noa comments");?>
		<div class="h2">Recently</div>
		
			<?php if (function_exists("fanfou_list_posts")) fanfou_list_posts("title_li=&limit=20");else{?>
<script type="text/javascript" src="http://www.google.com/reader/ui/publisher-en.js"></script>
<script type="text/javascript" src="http://www.google.com/reader/public/javascript/user/03562728422470037697/label/twitter?n=30&callback=GRC_p(%7Bc%3A%22-%22%2Ct%3A%22%22%2Cs%3A%22false%22%2Cb%3A%22false%22%7D)%3Bnew%20GRC"></script>
			<?php }?>

	<?php corner_end();?></div>
</div></div>

<div id="sidebar"><div id="innersidebar">
<dl>	
	<dd class="sc"><?php corner_start(" paddingtop10 center");?>
		<iframe src="http://www.google.com/talk/service/badge/Show?tk=z01q6amlq39ee5r10g9qv7l9g6cqsbnl8stkm41rfsmbafonl7khsth0pn2n6halvnbgfo5opgtjfa6dqmj4la85fpec0m1r9aekdtliund2clm50tatlttrmkucjfgi5fpefcaimbmb7jamsudqasjs066aaibq4lo5smok7o1hlvakm8po4l9lf6oajvao1tk&w=200&h=60" frameborder="0" allowtransparency="true" width="200" height="60"></iframe>
	<?php corner_end();?></dd>
	<dd class="sc"><?php corner_start(" paddingtop10 center");?>
<embed allowScriptAccess="never"  saveEmbedTags="true" src="http://www.polldaddy.com/poll.swf" FlashVars="p=138180" quality="high"  wmode="transparent"  bgcolor="&#035;ffffff" width="252"  height="299"  name="beta3" salign="tl" scale="autoscale"  type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" ></embed>
	<?php corner_end();?></dd>
	<dd class="sc"><?php corner_start(" paddingtop10 center");?>
		<iframe src="http://www.google.com/calendar/embed?title=Zhang-Zi's%20Calendar&amp;showTabs=0&amp;mode=AGENDA&amp;height=500&amp;wkst=1&amp;hl=zh_CN&amp;bgcolor=%23FFFFFF&amp;src=mathzqy%40gmail.com&amp;color=%232952A3&amp;src=40jgds562us0ta5oubqe47ahv8%40group.calendar.google.com&amp;color=%23528800&amp;src=kkafo9pce7l57vc4iam7nbcqn4%40group.calendar.google.com&amp;color=%23A32929&amp;src=7qrlfctofj1kfvt935c69il50dprfdjn%40import.calendar.google.com&amp;color=%235A6986&amp;src=china__en%40holiday.calendar.google.com&amp;color=%235A6986&amp;ctz=Asia%2FShanghai" style=" border-width:0 " width="270" height="350" frameborder="0" scrolling="no"></iframe>
	<?php corner_end();?></dd>
	<dd class="sc"><?php corner_start("posts");?>
		<div class="h2">recently</div>
		<ul>
			<?php get_recent_posts_1(10);?>
		</ul>
	<?php corner_end();?></dd>
	<dd class="sc"><?php corner_start();?>
		<?php include (TEMPLATEPATH . '/subscribe.php'); ?>
	<?php corner_end();?></dd>
</dl>
</div></div>
<?php //include (TEMPLATEPATH . '/indexsidebar.php'); 
?>
<?php get_footer(); ?>