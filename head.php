<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<title><?php $this->archiveTitle([
            'category' => _t('分类 %s 下的文章'),
            'search'   => _t('包含关键字 %s 的文章'),
            'tag'      => _t('标签 %s 下的文章'),
            'author'   => _t('%s 发布的文章')
        ], '', ' - '); ?><?php $this->options->title(); ?></title>
<link rel='canonical' href='<?php $this->options->siteUrl(); ?>'>
<?php if ($this->options->showmod):?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/mod.css');?>">
<?php else:?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('css/style.css');?>">
<?php endif;?>
<link rel="shortcut icon" href="<?php $this->options->iconUrl(); ?>" />
<?php $this->options->addhead() ?>
<?php $this->header("generator=&template="); ?>
</head>
<script>
    (function() {
        const colorSchemeKey = 'StackColorScheme';
        const colorSchemeItem = localStorage.getItem(colorSchemeKey);
        const supportDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches === true;

        if (colorSchemeItem == 'dark' || colorSchemeItem === 'auto' && supportDarkMode) {
            

            document.documentElement.dataset.scheme = 'dark';
        } else {
            document.documentElement.dataset.scheme = 'light';
        }
    })();
</script>