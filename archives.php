<?php 
/**
 * 文章归档
 *
 * @package custom
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('head.php'); ?>
<body class="template-archives">
<?php $this->need('header.php'); ?>
<main class="main full-width">
    <header>
        <h2 class="section-title">Categories</h2>
        <div class="subsection-list">
            <div class="article-list--tile">
            <?php $this->widget('Widget_Metas_Category_List')->to($categories); ?>
<?php while($categories->next()): ?>
    <?php
    // 获取分类 ID
    $categoryId = $categories->mid;
    // 获取主题URL
    $imgUrl = $this->options->imgurl;
    // 为每个分类生成图片地址
    $categoryImage = $imgUrl . '/' . $categoryId . '.jpg';
    ?>
    <article class="has-image">
        <a href="<?php $categories->permalink(); ?>">
            <div class="article-image">
                <img src="<?php echo $categoryImage; ?>" loading="lazy" alt="<?php $categories->name(); ?>">
            </div>
            <div class="article-details">
                <h2 class="article-title"><?php $categories->name(); ?></h2>
            </div>
        </a>
    </article>
<?php endwhile; ?>

            </div>
        </div>    
    </header>
    <?php
        $stat = Typecho_Widget::widget('Widget_Stat');
        Typecho_Widget::widget('Widget_Contents_Post_Recent', 'pageSize=' . $stat->publishedPostsNum)->to($archives);
        $year = 0; 
        $output = '<div class="archives-group"> '; // Start archives container      
        while ($archives->next()) {
            $year_tmp = date('Y', $archives->created);   
            if ($year != $year_tmp) {
                if ($year > 0) {
                    $output .= '</div>'; // 结束上一个年份的月份列表和包裹的div
                }
                $year = $year_tmp; 
                $output .= '
        <h2 class="archives-date section-title"><a href="#' . $year . '">' . $year . '</a></h2><div class="article-list--compact">'; // 开始新的年份div
            }       
            // 输出文章项
            $output .= '<article>
            <a href="' . $archives->permalink . '"> 
            <div class="article-details">
            <h2 class="article-title">'. $archives->title . '</h2> 
            <footer class="article-time">
                <time>'. date('m月d日', $archives->created) . '</time>
            </footer>
              <div class="article-image">
            </div>
            </div>
            </a>
            </article>
            ';
        }
        $output .= '</div> '; // End archives container
        echo $output;
    ?>
</div>
 
<?php $this->need('footer.php'); ?>