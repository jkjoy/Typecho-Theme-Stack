<?php 
/**
 * 友情链接
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('head.php'); ?>
<body class="template-archives">
<?php $this->need('header.php'); ?>
<main class="main full-width">
<article class="main-article">
<header class="article-header">
<div class="article-details">
<div class="article-title-wrapper">
<h2 class="article-title">
<?php $this->title() ?> 
</h2>
<h3 class="article-subtitle">
<?php $this->content(); ?>
</h3>
</div>
<section class="article-content">
</section>
</article>
<div class="article-list--compact links">
<?php
Links_Plugin::output('<article>
<a href="{url}" target="_blank" rel="noopener">
<div class="article-details">
<h2 class="article-title">{name}</h2>
<footer class="article-time">
{title}
</footer>
</div>
<div class="article-image">
<img src="{image}" loading="lazy">
</div>
</a>
</article>
');
        ?>
 
    </div>
<?php $this->need('footer.php'); ?>