<?php
/*
Template Name:默认页面模板
*/
get_header();?>

<div class="page-content page">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article>
		<h2><?php the_title(); ?></h2>
		<div class="article-content"><?php the_content(); ?></div>
		<div class="article-footer">
			<div class="article-footer-date"><span class="dashicons dashicons-calendar-alt"></span><?php echo get_the_date(); ?></div>
		</div>
	</article>
<?php endwhile; else: ?>
<p><?php echo '抱歉没有内容'; ?></p>
<?php endif; ?>
</div>

<?php get_footer();?>