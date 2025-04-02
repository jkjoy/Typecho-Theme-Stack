<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<aside class="sidebar right-sidebar sticky">   
    <form id="search" method="post" action="./" role="search" class="search-form widget">
        <label>Search</label>
		<input type="text" name="s" class="search-field text" placeholder="站内搜索" required/>
        <button type="submit" class="search-submit submit">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                             <path stroke="none" d="M0 0h24v24H0z"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" />
            </svg>
        </button>
	</form>  
    <?php if ($this->options->showgd): ?>
    <!-- 归档开始 -->
    <section class="widget archives">
        <div class="widget-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-infinity" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M9.828 9.172a4 4 0 1 0 0 5.656 a10 10 0 0 0 2.172 -2.828a10 10 0 0 1 2.172 -2.828 a4 4 0 1 1 0 5.656a10 10 0 0 1 -2.172 -2.828a10 10 0 0 0 -2.172 -2.828" /></svg>
        </div>
        <h2 class="widget-title section-title">归档</h2>
        <div class="widget-archive--list">
        <?php $this->widget('Widget_Contents_Post_Date', 'type=month&format=Y年m月')->parse('
        <div class="archives-year"> 
        <a href="{permalink}">   
            <span class="year">{date}</span>  
            <span class="count">{count} </span>  
        </a> 
        </div> 
        '); ?>
    </section>
    <?php endif; ?>   
    <!-- 分类开始 -->
    <section class="widget tagCloud">
        <div class="widget-icon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><line x1="5" y1="9" x2="19" y2="9" /><line x1="5" y1="15" x2="19" y2="15" /><line x1="11" y1="4" x2="7" y2="20" /><line x1="17" y1="4" x2="13" y2="20" /></svg>
        </div>
        <h2 class="widget-title section-title">分类</h2>
        <div class="tagCloud-tags">
            <?php $this->widget('Widget_Metas_Category_List')->parse('<a href="{permalink}" class="font_size_1"> {name}</a> '); ?>
        </div>
    </section>
    <!-- 标签开始 -->
    <section class="widget tagCloud">
        <div class="widget-icon">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-tag" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M11 3L20 12a1.5 1.5 0 0 1 0 2L14 20a1.5 1.5 0 0 1 -2 0L3 11v-4a4 4 0 0 1 4 -4h4" /><circle cx="9" cy="9" r="2" /></svg>
        </div>
        <h2 class="widget-title section-title">标签</h2>
            <?php $this->widget('Widget_Metas_Tag_Cloud', 'sort=mid&ignoreZeroCount=1&desc=0&limit=20')->to($tags); ?>
            <?php if($tags->have()): ?>
            <div class="tagCloud-tags">
                <?php while ($tags->next()): ?>
                    <a class="font_size_1" target="<?php $this->options->sidebarLinkOpen(); ?>" data-toggle="tooltip" data-placement="top" href="<?php $tags->permalink(); ?>" rel="tag" title="<?php $tags->count(); ?> 篇文章"><?php $tags->name(); ?></a>
                <?php endwhile; ?>
            </div>
                <?php else: ?>
                <p class="font_size_1">暂无标签</p>
                <?php endif; ?>    
    </section>
</aside>
