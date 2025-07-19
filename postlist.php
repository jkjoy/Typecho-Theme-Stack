<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<main class="main full-width">
    <section class="article-list">
    <?php while ($this->next()): ?>
        <?php $firstImage = img_postthumb($this->cid); $cover = $this->fields->cover;  $imageToDisplay = !empty($cover) ? $cover : $firstImage; if($imageToDisplay): ?>
    <article class="has-image">
    <header class="article-header">
        <div class="article-image">
            <a href="<?php $this->permalink() ?>">
                <img src="<?php echo $imageToDisplay; ?>" width="800"  height="534"  loading="lazy" alt="<?php $this->title() ?>" />
            </a>
        </div>
    <div class="article-details">
    <header class="article-category">
    <?php foreach($this->categories as $category): ?>
        <a href="<?php echo $category['permalink']; ?>"><?php echo $category['name']; ?></a>
    <?php endforeach; ?>
    </header>
    <div class="article-title-wrapper">
        <h2 class="article-title">
            <a href="<?php $this->permalink() ?>"><?php $this->sticky();$this->title() ?></a>
        </h2>
        <h3 class="article-subtitle">
        <?php if($this->fields->summary){ echo $this->fields->summary; } else { $this->excerpt(200);}?>
        </h3>
    </div> 
    <footer class="article-time">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-time" width="56" height="56" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" /><circle cx="18" cy="18" r="4" /><path d="M15 3v4" /><path d="M7 3v4" /><path d="M3 11h16" /><path d="M18 16.496v1.504l1 1" /></svg>
            <time class="article-time--published"><?php $this->date(); ?></time>
        </div>
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><circle cx="12" cy="12" r="9" /><polyline points="12 7 12 12 15 15" /></svg>
            <time class="article-time--reading">
            <?php $content = $this->content; ?>阅读时长≈
            <?php $readingTime = getReadingTime($content);?>
            <?php echo isset($readingTime) ? $readingTime . '分钟' : '未知'; ?>
            </time>
        </div>
    </footer> 
</div>
</header>
</article>
<?php else: ?>         
<article class="">
    <header class="article-header">
    <div class="article-details">
    <header class="article-category">    
    <?php foreach($this->categories as $category): ?>
        <a href="<?php echo $category['permalink']; ?>"><?php echo $category['name']; ?></a>
    <?php endforeach; ?>   
    </header>
    <div class="article-title-wrapper">
        <h2 class="article-title">
            <a href="<?php $this->permalink() ?>"><?php $this->sticky();$this->title() ?></a>
        </h2>
        <h3 class="article-subtitle">
        <?php  if($this->fields->summary){ echo $this->fields->summary; } else { $this->excerpt(200); }?>
        </h3>
    </div>
    <footer class="article-time">    
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-time" width="56" height="56" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" /><circle cx="18" cy="18" r="4" /><path d="M15 3v4" /><path d="M7 3v4" /><path d="M3 11h16" /><path d="M18 16.496v1.504l1 1" /></svg>
                <time class="article-time--published"><?php $this->date(); ?></time>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><circle cx="12" cy="12" r="9" /><polyline points="12 7 12 12 15 15" /></svg>
                <time class="article-time--reading">
                <?php $content = $this->content; ?>阅读时长≈
                <?php $readingTime = getReadingTime($content);?>
                <?php echo isset($readingTime) ? $readingTime . '分钟' : '未知'; ?>
                </time>
            </div>        
    </footer>  
</div>
</header>
</article>
<?php endif; ?>    
<?php endwhile; ?>  
<?php $this->pagenav(
             '', '', 1,'...',
                array(
                    'wrapTag' => 'nav',// 整个分页导航的外围HTML标签
                    'wrapClass' => 'pagination',// 整个分页导航的CSS类
                    'itemTag' => '',// 每个分页项的HTML标签
                    'textTag' => 'span class="page-link dots"',// 文本（页码）的HTML标签
                    'itemClass'   => 'page-link', // 所有分页项的CSS类
                    'currentClass' => 'page-link current',// 当前页码的CSS类
                    'prevClass' => 'hidden',//“前一页”按钮的CSS类
                    'nextClass' => 'hidden' // “后一页”按钮的CSS类
                )
            );
?>