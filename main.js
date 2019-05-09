jQuery(document).ready(function($){

	$(window).scroll('scroll', throttle(is_top));//显示返回顶部按钮

	/*判断是否在内页并且内容有图片*/
	if($('.article-content').length&&$('.article-content img').length){
		load_img();
		$(window).scroll(throttle(load_img));
	}

	/*加载图片*/
	function load_img(){
		var window_h = $(window).height();//获取浏览器窗口高度
		var window_scroll_h = $(window).scrollTop();//获取滚动高度
		
		$('.article-content img').each(function(){
			var this_top = $(this).offset().top;
			if(is_load($(this)) && this_top-window_scroll_h<=window_h){//如果图片还没加载并且出现在窗口视图中
				$(this).attr('src', $(this).attr('data-src'));
			}
		});
	}

	/*判断图片是否已经加载*/
	function is_load(ele){
		if(ele.attr('src')=='/wp-content/themes/mkinit/images/placeholder.png'){
			return true;
		}else{
			return false;
		}
	}

	
	if($('.single .article-content').length){/*判断是否文章页*/

		/*内容也图片放大*/
		$('body').append($('<div class="img-container-box"><div class="img-content-box"><img width="100%" height="auto" src="" /></div><span class="dashicons dashicons-minus"></span><span class="dashicons dashicons-plus"></span><span class="dashicons dashicons-no"></span></div>'));

		$('.article-content img').parent('a').on('click', function(){//点击图片的上级a标签放大图片
			$('.img-container-box').show('slow');
			$('.img-content-box img').attr('src', $(this).attr('href'));

			$('.img-content-box').css('max-width','80%');

			$('.img-container-box').on('click', function(){
				$(this).hide('slow');
			});
			return false;
		});

		$('.img-content-box img').on('click', function(e){//在这个实例中mousedown、mousemove和mouseup中无法停止事件冒泡，需要单独在click事件中加上。
			e.stopPropagation();
		});

		$('.img-content-box img').on('mousedown', function(e){//支持长图的拖动
			if(e.button===0){
				var current_mouse_Y = e.clientY;
				var current_top = parseInt($(this).parent('.img-content-box').css('top'));
				$(this).on('mousemove', function(e){
					$(this).parent('.img-content-box').css('top',current_top-(current_mouse_Y-e.clientY));
					$(document).on('mouseup', function(){
						$('.img-content-box img').unbind('mousemove');
					});
					return false;
				});
			}
		});

		$('.img-container-box .dashicons-minus').on('click', function(e){//图片缩小按钮
			e.stopPropagation();
			var width = parseInt($('.img-content-box').css('width'));
			$('.img-content-box').css('max-width',width-width*0.1);
		});

		$('.img-container-box .dashicons-plus').on('click', function(e){//图片放大按钮
			e.stopPropagation();
			var width = parseInt($('.img-content-box').css('width'));
			$('.img-content-box').css('max-width',width+width*0.1);
		});

		$('.img-container-box .dashicons-no').on('click', function(e){//关闭放大图片
			e.stopPropagation();
			$(this).parent('.img-container-box').hide('slow');
		});
		/*图片放大结束*/

		/*动态添加文章目录导航*/
		if($('.single .article-content h3').length){
			var post_nav = $('<div class="post-nav"><h4>文章目录</h4></div>');//创建文章导航容器
			var ol_list = $('<ul></ul>');//创建一个无序列表
			var h3_title = $(this).find('h3');//获取h3标题
			h3_title.each(function(index){
				$(this).attr('id', $(this).text());//设置h3标题的id
				var nav_link = $('<li>'+(index+1)+'. <a href="#'+$(this).text()+'">'+$(this).text()+'</a></li>')
				ol_list.append(nav_link);//把每一个列表项插入到无序列表
			});
			post_nav.append(ol_list);//在文章导航容器中插入无序列表
			$('.article-content').prepend(post_nav);//在文章开头插入导航
		}

	}/*是否文章页判断结束*/

	/*菜单*/
	function mk_sidebar_menu(){
		var menu_open_btn = $('.sidebar-menu-btn .dashicons-menu');
		var menu_close_btn = $('.sidebar-menu-btn .dashicons-no-alt');
		var menu_box = $('.sidebar-menu');
		var menu_list = $('.main-menu-list')

		if(jQuery(document).width()<=414){
			menu_box.animate({'left':-menu_box.width() + 'px'},1000);
		}else{
			menu_box.animate({'left':-menu_box.width()+50 + 'px'},1000);
		}

		/*
		菜单开关按钮切换函数，
		参数1：要显示和隐藏的菜单元素，
		参数2：点击后需要隐藏的按钮元素，
		参数3：要显示的按钮元素
		参数4：菜单要移动到哪里
		*/
		function mk_sidebar_menu_switch(menu_box, hide_btn, show_btn, position){//两个按钮共用函数
			menu_box.animate( { 'left':position }, function(){
				hide_btn.css('opacity',0).css('display','none');
				show_btn.css( { 'display':'block', 'opacity':1} );
			} );
		}

		menu_open_btn.click(function(){
			mk_sidebar_menu_switch(menu_box, $(this), menu_close_btn, 0);
			menu_list.animate({'paddingTop':($(window).height()-menu_list.height())/5+'px'},1000);
		});

		menu_close_btn.click(function(){
			if(jQuery(document).width()<=414){
				mk_sidebar_menu_switch(menu_box, $(this), menu_open_btn, -menu_box.width() + 'px');
			}else{
				mk_sidebar_menu_switch(menu_box, $(this), menu_open_btn, -menu_box.width()+50 + 'px');
			}
			
			menu_list.animate({'paddingTop':'35px'},1000);
		});
	}
	mk_sidebar_menu();

	/*返回顶部*/
	$('.go-to-top').click(function(){
		$('html').animate({scrollTop:0},'slow');
	});

	function is_top(){//判断是否在顶部
		if($(window).scrollTop()>=300){
			$('.go-to-top').fadeIn('slow');
		}else{
			$('.go-to-top').fadeOut('fast');
		}
	}

	function throttle(fn){//节流函数（来自：https://www.cnblogs.com/coco1s/p/5499469.html）
		var timer,
		star_time = new Date();
		return function(){
			var current_time = new Date();
			clearTimeout(timer);//防止连续滚动
			if(current_time-star_time>=1000){//两次滚动时间需要超过1s，否则延迟500ms执行
				fn();
				star_time = current_time;
			}else{
				timer = setTimeout(fn,500);
			}
		}
	}

});