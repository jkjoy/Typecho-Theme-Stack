<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('head.php'); ?>
<body class="article-page">
<?php $this->need('header.php'); ?>
    <?php
    // 引入 TOC.php 文件
    require_once 'toc.php'; 
    // 获取当前文章内容
    if ($this->is('post')) {
        $content = $this->content;
        echo generate_toc($content);
    }
    ?>
<main class="main full-width">
    <article class="has-image main-article">
    <header class="article-header">
      <?php $firstImage = img_postthumb($this->cid); $cover = $this->fields->cover;  $imageToDisplay = !empty($cover) ? $cover : $firstImage; if($imageToDisplay): ?> 
        <div class="article-image">
            <a href="<?php $this->permalink() ?>">
                <img src="<?php echo $imageToDisplay; ?>" width="800"  height="534"  loading="lazy" alt="<?php $this->title() ?>" />
            </a>
        </div>
            <?php else: ?> 
        <?php endif; ?>    
    <div class="article-details">
    <header class="article-category">
    <?php foreach($this->categories as $category): ?>
        <a href="<?php echo $category['permalink']; ?>"><?php echo $category['name']; ?></a>
    <?php endforeach; ?>
    </header>
    <div class="article-title-wrapper">
        <h2 class="article-title">
            <a href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
        </h2>
        <h3 class="article-subtitle">
       <!-- 删除摘要-->
        </h3>  
    </div>
    <footer class="article-time">
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-time" width="56" height="56" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" /><circle cx="18" cy="18" r="4" /><path d="M15 3v4" /><path d="M7 3v4" /><path d="M3 11h16" /><path d="M18 16.496v1.504l1 1" /></svg>
                <time class="article-time--published"><?php $this->date('Y-m-d H:i'); ?></time>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><circle cx="12" cy="12" r="9" /><polyline points="12 7 12 12 15 15" /></svg>
                <time class="article-time--reading">
                <?php $content = $this->content; ?>
                <?php $readingTime = getReadingTime($content);?>
                阅读时长
                <?php echo isset($readingTime) ? $readingTime . '分钟' : '未知'; ?>
                </time>
            </div>
    </footer> 
</div>
</header>
    <section class="article-content">
    <?php $content = $this->content; echo addHeaderLinks($content); ?>
    </section>
    <footer class="article-footer">
    <section class="article-tags">
     <?php $this->tags(' ', true, ' '); ?>
    </section>
    <section class="article-copyright">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copyright" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><circle cx="12" cy="12" r="9" /><path d="M14.5 9a3.5 4 0 1 0 0 6" /></svg>
        <span>CC BY-NC-SA 4.0 Deed | 署名-非商业性使用-相同方式共享 </span>
    </section>
    <section class="article-lastmod">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z"/><circle cx="12" cy="12" r="9" /><polyline points="12 7 12 12 15 15" /></svg>
        <span>
        <?php $postId = $this->cid; $lastModifiedTime = get_last_modified_time($postId); if ($lastModifiedTime) { echo ' 最后更新时间：' . htmlspecialchars($lastModifiedTime) . ' ';} ?>
        </span>
    </section>
</footer>
</article>
<!-- 如果设置了第三方评论系统则使用第三方评论 -->
<?php if($this->allow('comment')): ?>
    <?php if($this->options->twikoo): ?> 
    <div class="comments-container">
    <?php $this->options->twikoo() ?>
    </div> 
    <?php else: ?>
    <div class="comments-container">
        <?php $this->need('comments.php'); ?>
    </div>
    <?php endif; ?>
<?php endif; ?>
<style>
    .comments-container {
        background-color: var(--card-background);
        border-radius: var(--card-border-radius);
        box-shadow: var(--shadow-l1);
        padding: var(--card-padding);
    }
</style>
<?php $this->need('footer.php'); ?>