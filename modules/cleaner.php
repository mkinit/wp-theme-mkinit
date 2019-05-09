<?php
//移除前台不需要的资源链接
remove_action('wp_head', 'print_emoji_detection_script', 7);//移除emjo表情的脚本
remove_action('wp_print_styles', 'print_emoji_styles');//移除emjo表情的基本样式
add_filter('emoji_svg_url', '__return_false');//移除emjo表情预加载资源地址
remove_action('wp_head', 'rsd_link');//移除离线编辑器接口
remove_action('wp_head', 'wlwmanifest_link');//移除离线编辑器接口
remove_action('wp_head', 'feed_links', 2);//文章和评论feed
remove_action('wp_head', 'feed_links_extra', 3);//去除评论feed
remove_action('wp_head', 'rel_canonical');//移除文章地址
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);//前后篇文章的url
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);//移除短链接
remove_action('wp_head', 'wp_oembed_add_discovery_links');//移除头部的embed link标签
remove_action('wp_head', 'wp_oembed_add_host_js');//移除底部的embed script标签
remove_action('wp_head', 'rest_output_link_wp_head', 10);//移除头部json链接

add_action( 'wp_enqueue_scripts', 'remove_block_library_css', 100 );//移除前台的wp-block-library-css
function remove_block_library_css() {
	wp_dequeue_style( 'wp-block-library' );
}

//移除jquery migrate版本兼容脚本，来自remove-jquery-migrate插件
function twf_remove_jquery_migrate( $scripts ) {
	if ( ! is_admin() && isset( $scripts->registered['jquery'] ) ) {
		$script = $scripts->registered['jquery'];
			if ( $script->deps ) { // Check whether the script has any dependencies
				$script->deps = array_diff( $script->deps, array( 'jquery-migrate' ) );
			}
		}
	}
add_action( 'wp_default_scripts', 'twf_remove_jquery_migrate' );