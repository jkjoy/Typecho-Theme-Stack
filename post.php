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
        <a href="<?php echo $category['permalink']; ?>" style="background-color: #2a9d8f; color: #fff;"><?php echo $category['name']; ?></a>
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
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-time" width="56" height="56" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z"/>
  <path d="M11.795 21h-6.795a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v4" />
  <circle cx="18" cy="18" r="4" />
  <path d="M15 3v4" />
  <path d="M7 3v4" />
  <path d="M3 11h16" />
  <path d="M18 16.496v1.504l1 1" />
</svg>
                <time class="article-time--published"><?php $this->date(); ?></time>
            </div>
            <div>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z"/>
  <circle cx="12" cy="12" r="9" />
  <polyline points="12 7 12 12 15 15" />
</svg>
                <time class="article-time--reading">
                <?php $content = $this->content; // 获取文章内容 ?><?php $readingTime = getReadingTime($content); // 计算阅读时间 ?><?php echo isset($readingTime) ? $readingTime . '  minutes' : '未知'; ?> read
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
     <?php $this->tags(' ', true, 'none'); ?>
    </section>
    <section class="article-copyright">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-copyright" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                 <path stroke="none" d="M0 0h24v24H0z"/>
                <circle cx="12" cy="12" r="9" />
                 <path d="M14.5 9a3.5 4 0 1 0 0 6" />
        </svg>
        <span>CC BY-NC-SA 4.0 Deed | 署名-非商业性使用-相同方式共享 </span>
    </section>
    <section class="article-lastmod">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z"/>
                 <circle cx="12" cy="12" r="9" />
                 <polyline points="12 7 12 12 15 15" />
        </svg>
        <span>
           <?php
// 获取当前文章的 ID
$postId = $this->cid;

// 获取最后更新时间
$lastModifiedTime = get_last_modified_time($postId);

// 显示最后更新时间
if ($lastModifiedTime) {
    echo ' 最后更新时间：' . htmlspecialchars($lastModifiedTime) . ' ';
}
?>
        </span>
    </section>
</footer>
</article>
            <script src="<?php $this->options->themeUrl('js/photoswipe.min.js'); ?>"></script>
            <script src="<?php $this->options->themeUrl('js/photoswipe-ui-default.min.js'); ?>"></script>
            <link rel="stylesheet" href="<?php $this->options->themeUrl('css/default-skin.min.css'); ?>" >
            <link rel="stylesheet" href="<?php $this->options->themeUrl('css/photoswipe.min.css'); ?>">
            <script src="<?php $this->options->themeUrl('js/vibrant.min.js'); ?>"></script>
<div class="disqus-container">
<?php $this->options->twikoo() ?>
</div>
<?php $this->need('footer.php'); ?>