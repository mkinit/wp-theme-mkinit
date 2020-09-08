<?php if ( is_home() ) { ?><title><?php bloginfo('name'); if(get_query_var('paged')) { echo '_第'; echo get_query_var('paged'); echo '页';} echo " - "; bloginfo('description'); ?></title><?php } ?>
<?php if ( is_search() ) { ?><title><?php echo get_search_query(); echo " - "; bloginfo('name'); ?></title><?php } ?>
<?php if ( is_single() ) { ?><title><?php the_title(); if(get_query_var('page')) { echo '_第'; echo get_query_var('page'); echo '页';} echo " - "; bloginfo('name'); ?></title><?php } ?>
<?php if ( is_page() ) { ?><title><?php the_title(); echo " - "; bloginfo('name'); ?></title><?php } ?>
<?php if ( is_category() ) { ?><title><?php single_cat_title(); if(get_query_var('paged')) { echo '_第'; echo get_query_var('paged'); echo '页';} echo " - "; bloginfo('name'); ?></title><?php } ?>
<?php if ( is_year() ) { ?><title><?php the_time('Y年'); ?>所有文章 - <?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_month() ) { ?><title><?php the_time('F'); ?>份所有文章 - <?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_day() ) { ?><title><?php the_time('Y年n月j日'); ?>所有文章 - <?php bloginfo('name'); ?></title><?php } ?>
<?php if ( is_404() ) { ?><title>亲，你迷路了！ - <?php bloginfo('name'); ?></title><?php } ?>
<?php if (function_exists('is_tag')) { if ( is_tag() ) { ?><title><?php  single_tag_title("", true); echo " - "; bloginfo('name'); ?></title><?php } ?><?php } ?>
<?php if ( is_tax('notice') ) { ?><title><?php setTitle(); echo " - "; bloginfo('name'); ?></title><?php } ?>