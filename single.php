<?php
/*
普通文章的内容模板
*/
get_header();?>

<div class="page-content single">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article>
		<h2><?php the_title(); ?></h2>
		<div class="article-content"><?php the_content(); ?></div>
		<div class="article-info">
			<?php if(get_post_meta($post->ID, 'source', true)): ?>
				<p>来源：<?php echo get_post_meta($post->ID, 'source', true); ?></p>
			<?php endif; ?>
			<?php if(get_post_meta($post->ID, 'url', true)): ?>
				<p>
					<?php if(get_post_meta($post->ID, 'url_text', true)): echo get_post_meta($post->ID, 'url_text', true).'：'; else : ?>地址：
					<?php endif; ?>
					<a href="<?php echo get_post_meta($post->ID, 'url', true); ?>" target="_blank"><?php echo get_post_meta($post->ID, 'url', true); ?></a>
				</p>
			<?php endif; ?>
		</div>
		<div class="article-footer mk-flex-between">
			<div class="article-footer-date"><span class="dashicons dashicons-calendar-alt"></span><?php echo get_the_date(); ?></div>
			<div class="article-footer-category"><span class="dashicons dashicons-category"></span><?php echo get_the_category_list(', '); ?></div>
			<?php if(get_the_tag_list()): ?>
				<div class="article-footer-tag"><span class="dashicons dashicons-tag"></span><?php echo get_the_tag_list('',', '); ?></div>
			<?php endif; ?>
		</div>
	</article>
<?php endwhile; else: ?>
<p><?php echo '抱歉没有内容'; ?></p>
<?php endif; ?>
</div>

<?php get_footer();?>