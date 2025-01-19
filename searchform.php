<form role="search" method="get" id="searchform" class="searchform" action="<?php bloginfo('url') ?>">
	<input type="text" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="开始搜索吧杂鱼~" required>
    <button type="submit"><span class="iconfont icon-sousuo"></span></button>
</form>