<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
function themeConfig($form) {
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'));
    $form->addInput($logoUrl);
    $icoUrl = new Typecho_Widget_Helper_Form_Element_Text('icoUrl', NULL, NULL, _t('站点 Favicon 地址'));
    $form->addInput($icoUrl);
    $instagramurl = new Typecho_Widget_Helper_Form_Element_Text('instagramurl', NULL, NULL, _t('Instagram'), _t('会在个人信息显示'));
    $form->addInput($instagramurl);
    $telegramurl = new Typecho_Widget_Helper_Form_Element_Text('telegramurl', NULL, NULL, _t('电报'), _t('会在个人信息显示'));
    $form->addInput($telegramurl);
    $githuburl = new Typecho_Widget_Helper_Form_Element_Text('githuburl', NULL, NULL, _t('github'), _t('会在个人信息显示'));
    $form->addInput($githuburl);
    $twitterurl = new Typecho_Widget_Helper_Form_Element_Text('twitterurl', NULL, NULL, _t('twitter'), _t('会在个人信息显示'));
    $form->addInput($twitterurl);
    $mastodonurl = new Typecho_Widget_Helper_Form_Element_Text('mastodonurl', NULL, NULL, _t('mastodon'), _t('会在个人信息显示'));
    $form->addInput($mastodonurl);
    $sidebarBlock = new \Typecho\Widget\Helper\Form\Element\Checkbox(
        'sidebarBlock',
        [   
            'ShowSearch' => _t('显示搜索'),
            'ShowGD'    => _t('显示日期归档'),
            'ShowFL'    => _t('显示全部分类'),
            'ShowTags'  => _t('显示标签'),
        ],
        ['ShowSearch', 'ShowGD', 'ShowFL', 'ShowTags'],
        _t('侧边栏显示')
    );
    $form->addInput($sidebarBlock->multiMode());
    $cnavatar = new Typecho_Widget_Helper_Form_Element_Text('cnavatar', NULL, NULL, _t('Gravatar镜像'), _t('默认https://cravatar.cn/avatar/,建议保持默认'));
    $form->addInput($cnavatar);
    $imgurl = new Typecho_Widget_Helper_Form_Element_Text('imgurl', NULL, NULL, _t('分类图片目录'), _t('在目录下放入对应分类mid的jpg图片'));
    $form->addInput($imgurl);
    $twikoo = new Typecho_Widget_Helper_Form_Element_Textarea('twikoo', NULL, NULL, _t('使用第三方评论'), _t('不填写则不显示'));
    $form->addInput($twikoo);
    $addhead = new Typecho_Widget_Helper_Form_Element_Textarea('addhead', NULL, NULL, _t('Header代码'), _t('在head中插入代码,支持HTML'));
    $form->addInput($addhead);
    $tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL, NULL, _t('Footer代码'), _t('在footer中插入代码支持HTML'));
    $form->addInput($tongji);
    $addsns = new Typecho_Widget_Helper_Form_Element_Textarea('addsns', NULL, NULL, _t('自定义社交联系方式'), _t('头像下方的社交联系方式,具体使用查看使用文档'));
    $form->addInput($addsns);
    $showmod = new Typecho_Widget_Helper_Form_Element_Radio('showmod',
    array('0'=> _t('否'), '1'=> _t('是')),
    '0', _t('是否使用MOD风格'), _t('选择“是”将展示。'));
    $form->addInput($showmod);
} 

// 自定义字段
function themeFields($layout) {
    $summary= new Typecho_Widget_Helper_Form_Element_Textarea('summary', NULL, NULL, _t('文章摘要'), _t('自定义摘要'));
    $layout->addItem($summary);
    $cover= new Typecho_Widget_Helper_Form_Element_Text('cover', NULL, NULL, _t('文章封面'), _t('自定义文章封面'));
    $layout->addItem($cover);
}

// 获取Typecho的选项
$options = Typecho_Widget::widget('Widget_Options');
// 检查cnavatar是否已设置，如果未设置或为空，则使用默认的Gravatar前缀
$gravatarPrefix = empty($options->cnavatar) ? 'https://cravatar.cn/avatar/' : $options->cnavatar;
// 定义全局常量__TYPECHO_GRAVATAR_PREFIX__，用于存储Gravatar前缀
define('__TYPECHO_GRAVATAR_PREFIX__', $gravatarPrefix);

//获取头图
function img_postthumb($cid) {
    $db = Typecho_Db::get();
    $rs = $db->fetchRow($db->select('table.contents.text')
        ->from('table.contents')
        ->where('table.contents.cid=?', $cid)
        ->order('table.contents.cid', Typecho_Db::SORT_ASC)
        ->limit(1));
    // 检查是否获取到结果
    if (!$rs) {
        return "";
    }
    preg_match_all("/https?:\/\/[^\s]*.(png|jpeg|jpg|gif|bmp|webp)/", $rs['text'], $thumbUrl);  //通过正则式获取图片地址
    // 检查是否匹配到图片URL
    if (count($thumbUrl[0]) > 0) {
        return $thumbUrl[0][0];  // 返回第一张图片的URL
    } else {
        return "";  // 没有匹配到图片URL，返回空字符串
    }
}

//文章目录功能-给文章内标题加上id+超链接新窗口打开
function addHeaderLinks($text) {
    return preg_replace_callback('/<h([1-6])>(.*?)<\/h\1>/', function ($matches) {
        $level = $matches[1];
        $title = $matches[2];
        $id = htmlspecialchars(strip_tags($title), ENT_QUOTES, 'UTF-8');
        return sprintf('<h%s id="%s"><a href="#%s" title="%s">%s</a></h%s>', $level, $id, $id, $title, $title, $level);
    }, preg_replace('/<a(?! href="#)(.*?)>/', '<a$1 target="_blank">', $text));
}

//文章最后修改时间
function get_last_modified_time($postId) {
    // 获取数据库对象
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();

    // 查询文章的最后修改时间
    $query = $db->select('modified')
                ->from($prefix . 'contents')
                ->where('cid = ?', $postId)
                ->limit(1);
    // 执行查询
    $row = $db->fetchRow($query);
    // 检查是否有结果
    if ($row) {
        // 返回格式化后的时间
        return date('Y-m-d H:i:s', $row['modified']);
    } else {
        // 如果没有结果，返回空字符串
        return '';
    }
}

//阅读时间
function getReadingTime($text, $wordsPerMinute = 500) {
    // 移除HTML标签
    $text = strip_tags($text);
    // 移除多余的空格
    $text = trim($text);
    // 计算字数
    $wordCount = mb_strlen($text, 'UTF-8');
    // 计算阅读时间
    $readingTime = ceil($wordCount / $wordsPerMinute);
    return $readingTime;
}
