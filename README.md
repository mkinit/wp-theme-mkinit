# 主题说明

* 主题说明：自用的主题，不完整，用到哪做到哪。

## 主题修改说明

#### 2019-3-11

* 文章页动态添加目录导航（h3）

#### 2019-3-7

* 内容页面自动为图片添加懒加载和图片放大，支持长图上下拖动，以及大屏幕可以继续放大功能。
    * 功能需要使用WordPress自带的媒体库插入图片和“懒加载”快捷按钮的配合
    * ~~在选择插入图片时，“链接到媒体文件”的图片链接是作为图片放大后的图，而“尺寸”是作为懒加载的图。~~
    * 发现一些没有色彩（黑白）的PNG图在wordpress裁切成小尺寸后比原图还大，所以插入图片还是用原尺寸吧。到处是坑。

## 主题基本配置

* 去除头部无用标签
* 添加上传图片自动命名
* 在前台引用WordPress官方Dashicons字体图标的CSS文件
* 在前台引用WordPress官方内置的JQ库
* 添加后台编辑器文章预览样式
* 添加登录界面样式
* 开启链接功能
* 开启编辑文章的特色图片
* 编辑器中添加分页符按钮
* 注册了一个导航位置
* 添加搜索伪静态
* 添加编辑器的快捷按钮
    * 代码行：`<code class='line-numbers language-语言'></code>`
    * 代码块：`<pre><code class='line-numbers language-语言'></code></pre>`
    * h3：`<h3></h3>`
    * tab符：`\t`
    * 实体尖括号-左`&lt;`
    * 实体尖括号-右`&gt;`
    * 手动添加图片地址：`<img data-src="图片地址" src="/wp-content/themes/mkinit/images/placeholder.png" />`
    * 添加懒加载：`src="/wp-content/themes/mkinit/images/placeholder.png" data-`
        * 使用说明：使用媒体库插入图片后，在src前直接使用该快捷按钮
            * 使用快捷按钮前：`<a href="http://im.mkinit.com/wp-content/uploads/2019/03/2019-03-07-19-37-18-1551958638965.png"><img src="http://im.mkinit.com/wp-content/uploads/2019/03/2019-03-07-19-37-18-1551958638965-360x278.png" alt="" width="360" height="278" class="alignnone size-medium wp-image-449" /></a>`
            * 使用快捷按钮后：`<a href="http://im.mkinit.com/wp-content/uploads/2019/03/2019-03-07-19-37-18-1551958638965.png"><img src="/wp-content/themes/mkinit/images/placeholder.png" data-src="http://im.mkinit.com/wp-content/uploads/2019/03/2019-03-07-19-37-18-1551958638965-360x278.png" alt="" width="360" height="278" class="alignnone size-medium wp-image-449" /></a>`
* 添加菜单的图像描述输出
* 添加“判断是否属于某个分类的子分类”函数，原网络流传版本无法通过分类别名判断，修改为可以通过别名获取id再进行判断
* 文章内页默认为图片添加放大功能
* 添加文章内页图片的懒加载
* 关闭缩略图和大尺寸的裁切

## 需要安装的插件(内置推荐)

* Classic Editor：经典编辑器样式
* wp clean up：数据库清理优化
	* https://wordpress.org/plugins/wp-clean-up/

## 其它设置

* 关闭上传图片自动裁切功能
    * 后台媒体设置，将所有图像大小都设置为0。
    * 进入全局设置：http://你的域名/wp-admin/options.php，将medium_large_size_w设置为0。