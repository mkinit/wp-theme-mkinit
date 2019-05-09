<div class="mk-search-form"><form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="输入搜索内容" required />
	<button type="submit" id="search-submit"><span class="dashicons dashicons-search"></span></button>
</form></div>