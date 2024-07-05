<?php
function generate_toc($content) {
    $toc = '<aside class="sidebar right-sidebar sticky">
        <section class="widget archives">
            <div class="widget-icon">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z"/>
                    <line x1="5" y1="9" x2="19" y2="9" />
                    <line x1="5" y1="15" x2="19" y2="15" />
                    <line x1="11" y1="4" x2="7" y2="20" />
                    <line x1="17" y1="4" x2="13" y2="20" />
                </svg>
            </div>
            <h2 class="widget-title section-title">文章目录</h2>
            <div class="widget--toc">
                <nav id="TableOfContents">
                    ';

    // 初始化变量
    $has_toc = false;

    // 使用正则表达式提取标题
    if (preg_match_all('/<h([1-6])>(.*?)<\/h\1>/', $content, $matches, PREG_SET_ORDER)) {
        $current_level = 0;
        foreach ($matches as $match) {
            $level = intval($match[1]);
            $title = strip_tags($match[2]);
            $id = $title; // 保留标题原有格式

            // 根据标题层级生成嵌套列表
            if ($level > $current_level) {
                $toc .= '<ol>';
            } elseif ($level < $current_level) {
                $toc .= str_repeat('</ol>', $current_level - $level);
            }

            $toc .= '<li><a href="#' . htmlspecialchars($id) . '">' . htmlspecialchars($title) . '</a>';

            // 检查下一个标题是否是下一级，如果是则在这里闭合 li，以便包含子 ol
            if ($level >= $current_level) {
                $toc .= '</li>';
            }

            $current_level = $level;
            $has_toc = true;
        }

        // 关闭所有打开的列表标签
        if ($current_level > 0) {
            $toc .= str_repeat('</ol>', $current_level);
        }
    }

    $toc .= '  
                </nav>
            </div>
        </section>
    </aside>';

    // 如果没有 TOC 内容，则返回空字符串
    return $has_toc ? $toc : '';
}
?>