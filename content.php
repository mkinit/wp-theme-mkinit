<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	<article>
		<h2><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<div class="article-content"><?php echo wp_trim_words( get_the_content(), 100, '……' );//the_content(); ?></div>
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
<?php
	the_posts_pagination( array(
		'prev_text'=>'<span class="dashicons dashicons-arrow-left-alt2"></span>',
		'next_text'=>'<span class="dashicons dashicons-arrow-right-alt2"></span>',
	) );
?>