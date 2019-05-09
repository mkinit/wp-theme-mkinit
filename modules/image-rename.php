<?php
//上传图片自动命名
function mk_upload_image_auto_rename($file){
	date_default_timezone_set('PRC');//设置中国时区
	$time = date("Y-m-d-H-i-s-");
	$file['name'] = $time.mt_rand(date("s"),(date("s")+1)*date("Y")).".".pathinfo($file['name'] , PATHINFO_EXTENSION);
	return $file;
}
add_filter('wp_handle_upload_prefilter', 'mk_upload_image_auto_rename');
