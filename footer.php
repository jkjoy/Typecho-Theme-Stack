<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer class="site-footer">
    <section class="copyright">
        &copy; 
            2020 - 2024     ·  <?php $this->options->title(); ?>
    </section>
    <section class="powerby">
        Powered by <a href="https://typecho.org/" target="_blank" rel="noopener">Typecho</a> <br />
        Theme <b><a href="https://github.com/CaiJimmy/hugo-theme-stack" target="_blank" rel="noopener" data-version="3.26.0">Stack</a></b> designed by <a href="https://jimmycai.com" target="_blank" rel="noopener">Jimmy</a>
    </section>
    <?php $this->options->tongji() ?>
</footer>
            </main>
        </div>
<script type="text/javascript" src="<?php $this->options->themeUrl('js/main.js'); ?>" defer></script>
    </body>
</html>
