<?php

get_template_part('modules/cleaner');//引用头部无用标签清理模块

get_template_part('modules/image-rename');//引用上传图片自动命名模块

//引用资源
add_action('wp_enqueue_scripts', function(){
	wp_enqueue_style('dashicons');//引用WordPress官方Dashicons字体图标的CSS文件
	wp_enqueue_script('jquery');//引用JQ库
	wp_enqueue_script('main-js', get_template_directory_uri() . '/main.js', '', '', true);//引用主题的主要脚本文件
	wp_enqueue_style('prism', get_template_directory_uri() . '/css/prism.css');//引用代码高亮样式
	wp_enqueue_script('prism', get_template_directory_uri() . '/js/prism.js');//引用代码高亮脚本
});

/*首页排除分类*/
function mk_home_filter_category( $query) {
	if ( $query->is_home) {
         $query->set('cat','-1'); //注意前面要加一个减号
     }
     return $query;
 }
 add_filter('pre_get_posts','mk_home_filter_category');

//搜索伪静态
/*
或修改.htaccess文件
RewriteCond %{QUERY_STRING} \\?s=([^&]+) [NC]
RewriteRule ^$ /search/%1/? [NC,R,L]
*/
function mk_search_url_rewrite() {
	if ( is_search() && ! empty( $_GET['s'] ) ) {
		wp_redirect( home_url( "/search/" ) . urlencode( get_query_var( 's' ) ) );
		exit();
	}
}
add_action( 'template_redirect', 'mk_search_url_rewrite' );

//后台文章预览
add_editor_style('css/editor-style.css');

//更改后台样式
function mk_admin_style(){
	wp_enqueue_style('admin-style', get_template_directory_uri() . '/css/admin-style.css');
}
add_action('admin_head', 'mk_admin_style');//引入后台设置样式
add_action('login_head', 'mk_admin_style');//引入后台登录样式

//开启链接
add_filter('pre_option_link_manager_enabled', '__return_true');

//开启特色图片
if ( function_exists('add_theme_support') ) {
	add_theme_support('post-thumbnails');
}

//自动跳转到文本编辑器
add_filter('wp_default_editor', create_function('', 'return "html";'));

//WordPress 禁止可视化编辑模式
//add_filter('user_can_richedit','__return_false');

//注册菜单
register_nav_menus(
	array(
		'mk-main-menu' => '主菜单'
	)
);

//给默认编辑器添加自定义快捷按钮
add_action('after_wp_tiny_mce', 'mk_add_code_button');
function mk_add_code_button($mce_settings) {
	?>
	<script type="text/javascript">
		QTags.addButton( 'code-inline', '代码行', "<code class='line-numbers language-语言'>", "</code>" );
		QTags.addButton( 'precode', '代码块', "<pre><code class='line-numbers language-语言'>", "</code></pre>" );
		QTags.addButton( 'h3', '三号标题', "<h3>", "</h3>" );
		QTags.addButton( 'tab', 'TAB', "\t" );
		QTags.addButton( 'lazyload-image', '手动添加图片地址', '<img data-src="图片地址" src="/wp-content/themes/mkinit/images/placeholder.png" />');
		QTags.addButton( 'lazyload-full-image', '添加懒加载', 'src="/wp-content/themes/mkinit/images/placeholder.png" data-');
		QTags.addButton( 'angle-brackets-left', '实体小于号', "&lt;" );
		QTags.addButton( 'angle-brackets-right', '实体大于号', "&gt;" );
	</script>
	<?php
}

//判断是否属于某个分类的子分类
function mk_post_is_in_descendant_category( $cats, $_post = null )
{
	foreach ( (array) $cats as $cat ) {
		if(!is_numeric($cat)){//如果传入的是分类别名而不是id，那就获取该分类的id
			$cat = get_category_by_slug($cat)->term_id;
		}
		$descendants = get_term_children( (int) $cat, 'category');
		if ( $descendants && in_category( $descendants, $_post ) )
			return true;
	}
	return false;
}

/*添加菜单的图像描述输出*/
function twentyfifteen_nav_description( $item_output, $item, $depth, $args ) {
	//if ( 'primary' == $args->theme_location && $item->description ) {//可以改成自己注册的菜单名也可以注释掉
	$item_output = str_replace( $args->link_after . '</a>', '<div class="menu-item-description">' . $item->description . '</div>' . $args->link_after . '</a>', $item_output );
	//}
	return $item_output;
}
add_filter( 'walker_nav_menu_start_el', 'twentyfifteen_nav_description', 10, 4 );


//关闭上传图片自动裁切功能（缩略图和大尺寸，开放中等尺寸的裁切）
//后台媒体设置，将所有图像大小都设置为0。
//进入全局设置：http://你的域名/wp-admin/options.php，将medium_large_size_w设置为0。
//自定义裁切
//add_image_size( 'thumb-name1', 120, 120, true ); //硬剪裁模式（不保持原来比例）
//add_image_size( 'thumb-name2', 220, 180 ); //软剪裁模式（保持原来比例）
//add_image_size( 'thumb-name3', 220, 220, array('right', 'bottom') );//将从右下方裁切