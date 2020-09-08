<!DOCTYPE html>
<html lang="zh-cmn-Hans-CN">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />
	<?php get_template_part('/modules/title'); ?>
	<meta name="author" content="水秋玄" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
	<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/media.css"/>
	<link rel="stylesheet/less" type="text/css" href="<?php bloginfo('template_url'); ?>/css/main.less" />
	<script src="<?php bloginfo('template_url'); ?>/js/less.min.js" type="text/javascript"></script>
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favicon.png" />
	<?php wp_head(); ?>
</head>
<body>
	<div class="sidebar-menu">
		<div class="sidebar-menu-btn">
			<span class="dashicons dashicons-menu"></span>
		</div>
		<?php wp_nav_menu(array(
			'theme_location' => 'mk-main-menu',
			'container' => 'div',//指定容器标签类型
			'container_class' => 'main-menu-container',//指定容器class
			//'container_id' => 'main-menu-container',//指定容器id
			'menu_class' => 'main-menu-list',//ul的class
			'menu_id' => 'main-menu-list',//ul的id
			'depth' => '2',//支持二级菜单
			'fallback_cb' => 'wp_page_menu'//如果没有菜单则使用页面链接作为菜单
		)); ?>
	</div><!--主菜单结束-->
	<div class="page-container">
		<div class="mk-blog mk-center">
			<header class="header">
				<div class="top mk-flex-between">
					<div class="top-info">
						<div class="avatar">
							<img src="<?php bloginfo('template_url'); ?>/images/avatar.jpg" alt="万年不变的头像">
						</div>
						<div class="blog-name">
							<h1><a href="<?php bloginfo('url')?>"><?php bloginfo('name')?></a></h1>
							<p class="blog-description"><?php bloginfo('description'); ?></p>
						</div>
					</div>
					<div class="search"><?php get_template_part('searchform'); ?></div>
				</div>
			</header>
			<div class="location-navigation"><?php get_template_part('modules/location-navigation'); ?></div>