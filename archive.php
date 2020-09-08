<?php
/*
归档模板
*/
get_header();?>

<div class="child-categories">
	<ul>
		<?php wp_list_categories('title_li=&child_of='.get_query_var('cat')); ?>
	</ul>
</div>

<div class="page-content archive">
	<?php get_template_part('content'); ?>
</div>

<?php get_footer();?>