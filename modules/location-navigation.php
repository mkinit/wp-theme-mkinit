<?php
echo "所在位置：";

if(is_home()){
	echo "首页";
	if(get_query_var('paged')){
		echo ' - 第 '.get_query_var('paged').' 分页';
	}
	
}

if(is_category()){
	echo '分类目录 / '.get_category_parents( get_query_var('cat') , true, ' / ');
	if(get_query_var('paged')){
		echo ' - 第 '.get_query_var('paged').' 分页';
	}
}

if(is_tag()){
	echo '标签分类 / ';
	echo single_tag_title();
	if(get_query_var('paged')){
		echo ' - 第 '.get_query_var('paged').' 分页';
	}
}

if(is_search()){
	echo '“'.get_search_query().'”'.'的搜索结果';
	if(get_query_var('paged')){
		echo ' - 第 '.get_query_var('paged').' 分页';
	}
}

if(is_single()){
	echo the_category(' / ', 'multiple');
	echo ' / 正文';
}

if (is_page()){
	echo '单页面 / ';
	echo the_title();
}

if(is_404()){
	echo '误入歧途了！';
}

?>