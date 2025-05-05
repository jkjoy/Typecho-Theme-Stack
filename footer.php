<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer class="site-footer">
    <section class="copyright">
        &copy; <?php echo date("Y"); ?>  · <?php $this->options->title(); ?> 
    </section>
    <section class="powerby">
        Powered by <b><a href="https://typecho.org/" target="_blank" rel="noopener">Typecho</a></b>· 
        Theme <b><a href="https://github.com/CaiJimmy/hugo-theme-stack" target="_blank" rel="noopener" data-version="3.26.0">Stack</a></b>·  designed by <a href="https://jimmycai.com" target="_blank" rel="noopener">Jimmy</a>
        · Made with <b><a href="https://www.imsun.org/" target="_blank">Sun</a></b>
        <br>
        页面加载耗时<?php echo timer_stop();?>   💻️ <?php $this->author(); ?> <?php get_last_login(1); ?> 在线 
    </section>
    <?php $this->options->tongji() ?>
</footer>
</main>
</div>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/main.js'); ?>" defer></script>
<script src="<?php $this->options->themeUrl('js/photoswipe.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/photoswipe-ui-default.min.js'); ?>"></script>
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/default-skin.min.css'); ?>" >
<link rel="stylesheet" href="<?php $this->options->themeUrl('css/photoswipe.min.css'); ?>">
<script src="<?php $this->options->themeUrl('js/vibrant.min.js'); ?>"></script>
</body>
</html>