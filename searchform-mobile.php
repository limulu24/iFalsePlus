<form role="searchform-mb" method="get" id="searchform-mb" class="searchform-mb" action="<?php bloginfo('url') ?>">
	<div>
		<input type="text-" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="开始搜索吧杂鱼~" required>
        <button type="submit"><span class="iconfont icon-sousuo"></span></button>
	</div>
</form>