<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
 <div class="post--ingle__comments">
    <?php $this->comments()->to($comments); ?>
    <?php if($this->allow('comment')): ?>
        <?php if ($this->is('attachment')) : ?>
        <?php _e(''); ?>
        <?php else: ?>
    	<h3 class="comments--title" id="comments">
            <svg viewBox="0 0 24 24" class="icon" fill="currentColor" aria-hidden="true" width="16" height="16">
                <g>
                    <path
                        d="M1.751 10c0-4.42 3.584-8 8.005-8h4.366c4.49 0 8.129 3.64 8.129 8.13 0 2.96-1.607 5.68-4.196 7.11l-8.054 4.46v-3.69h-.067c-4.49.1-8.183-3.51-8.183-8.01zm8.005-6c-3.317 0-6.005 2.69-6.005 6 0 3.37 2.77 6.08 6.138 6.01l.351-.01h1.761v2.3l5.087-2.81c1.951-1.08 3.163-3.13 3.163-5.36 0-3.39-2.744-6.13-6.129-6.13H9.756z">
                    </path>
                </g>
            </svg><?php $this->commentsNum(_t('0'), _t('1'), _t('%d')); ?>
        </h3>
        <ol class="commentlist"></ol>
        <?php if ($comments->have()): ?>
        <?php $comments->listComments(); ?>
    <?php
            $comments->pageNav(
                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M10.8284 12.0007L15.7782 16.9504L14.364 18.3646L8 12.0007L14.364 5.63672L15.7782 7.05093L10.8284 12.0007Z" fill="var(--main)"></path></svg>',
                '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M13.1714 12.0007L8.22168 7.05093L9.63589 5.63672L15.9999 12.0007L9.63589 18.3646L8.22168 16.9504L13.1714 12.0007Z" fill="var(--main)"></path></svg>',
                1,
                '...',
                array(
                    'wrapTag' => 'div',
                    'wrapClass' => 'pagination_page',
                    'itemTag' => '',
                    'textTag' => 'a',
                    'currentClass' => 'active',
                    'prevClass' => 'prev',
                    'nextClass' => 'next'
                )
            );
        ?>
        <?php else: ?>
            <center><h3><?php _e('暂无评论'); ?></h3></center>
        <?php endif; ?>
    <div id="<?php $this->respondId(); ?>" class="comment-respond">
        <div class="cancel-comment-reply cancel-comment-reply-link"><?php $comments->cancelReply(); ?></div>
    	<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" role="form" class="comment-form">
            <?php if($this->user->hasLogin()): ?>
    		<p><?php _e('登录身份: '); ?>
            <a href="<?php $this->options->profileUrl(); ?>">
            <?php $this->user->screenName(); ?></a>. 
            <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>

    		<p class="comment-form-author">
    			<input placeholder="称呼 *" type="text" name="author" id="author" class="text" value="" required />
    		</p>
    		<p class="comment-notes">
    			<input placeholder="邮箱<?php if ($this->options->commentsRequireMail): ?> *<?php endif; ?>" type="email" name="mail" id="mail" class="text" value=""<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
    		</p>
    		<p class="comment-form-url">
    			<input type="url" name="url" id="url" class="text" placeholder="http(s)://<?php if ($this->options->commentsRequireURL): ?> *<?php endif; ?>" value=""<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
    		</p>
            <?php endif; ?>
            <p class="comment-form-comment">
            <textarea rows="8" cols="50" name="text" id="textarea" class="textarea" onkeydown="if(event.ctrlKey&&event.keyCode==13){document.getElementById('misubmit').click();return false};" placeholder="<?php _e('评论审核后显示，请勿重复提交...'); ?>" required ><?php $this->remember('text'); ?></textarea>
    		</p>
            
    		<p class="form-submit">
            <button type="submit" class="submit" id="misubmit"><?php _e('提交评论（Ctrl+Enter）'); ?></button>
            </p>
    	</form>
    </div>
    <?php endif; ?>
    <?php else: ?>
    
    <?php endif; ?>   
    <?php $this->options->twikoo(); ?>
</div>
<?php
function threadedComments($comments, $options) {
    $commentClass = '';
    if ($comments->authorId) {
        if ($comments->authorId == $comments->ownerId) {
            $commentClass .= ' comment-by-author';
        } else {
            $commentClass .= ' comment-by-user';
        }
    }
    $depth = $comments->levels + 1;
    ?>
    <li id="li-<?php $comments->theId(); ?>" class="<?php 
        if ($comments->levels == 0) {
            echo 'comment parent';
        } else {
            echo 'comment child';
        }
        echo $commentClass; 
    ?>">
        <div class="comment-body" id="<?php $comments->theId(); ?>">
            <div class="comment-meta">
                <div class="comment--avatar">
                <?php if ($comments->url): ?>
                            <a href="<?php echo $comments->url ?>" target="_blank" rel="external nofollow"><?php echo $comments->gravatar('40', ''); ?> </a>
                        <?php else: ?>
                            <?php echo $comments->gravatar('40', ''); ?> 
                        <?php endif; ?>
                </div>
                <div class="comment--meta">
                    <div class="comment--author"><?php echo $comments->author; ?><span class="dot"></span>
                    <div class="comment--time"><?php $comments->date('Y-m-d H:i'); ?></div>
                    <span class="comment-reply-link u-cursorPointer">
                        <?php $comments->reply('<svg viewBox="0 0 24 24" width="14" height="14" fill="currentColor" aria-hidden="true" class="" ><g><path d="M12 3.786c-4.556 0-8.25 3.694-8.25 8.25s3.694 8.25 8.25 8.25c1.595 0 3.081-.451 4.341-1.233l1.054 1.7c-1.568.972-3.418 1.534-5.395 1.534-5.661 0-10.25-4.589-10.25-10.25S6.339 1.786 12 1.786s10.25 4.589 10.25 10.25c0 .901-.21 1.77-.452 2.477-.592 1.731-2.343 2.477-3.917 2.334-1.242-.113-2.307-.74-3.013-1.647-.961 1.253-2.45 2.011-4.092 1.78-2.581-.363-4.127-2.971-3.76-5.578.366-2.606 2.571-4.688 5.152-4.325 1.019.143 1.877.637 2.519 1.342l1.803.258-.507 3.549c-.187 1.31.761 2.509 2.079 2.629.915.083 1.627-.356 1.843-.99.2-.585.345-1.224.345-1.83 0-4.556-3.694-8.25-8.25-8.25zm-.111 5.274c-1.247-.175-2.645.854-2.893 2.623-.249 1.769.811 3.143 2.058 3.319 1.247.175 2.645-.854 2.893-2.623.249-1.769-.811-3.144-2.058-3.319z"></path></g></svg>'); ?>
                    </span>
                    </div>
                </div>
            </div>
            <div class="comment-content">
                <?php $comments->content(); ?>
            </div>
        </div>
        <?php if ($comments->children) { ?>
            <ol class="children">
                <?php $comments->threadedComments($options); ?>
            </ol>
        <?php } ?>
    </li>
    <?php } ?>
<ol class="commentlist">
    <?php $this->comments()->to($comments); ?>
    <?php while($comments->next()): ?>       
    <?php endwhile; ?>
</ol>
<style>
.pagination_page{
    display: flex;
    align-items: center;
    justify-content: center;
    margin-top: 10px;
    gap: 15px;
}
.pagination_page li.active a {
    background: var(--body-background);
    color: #fff;
    font-weight: 500;
}
.pagination_page a{
    display: flex;
    padding: 9px;
    font-size: 20px;
    width: 30px;
    height: 35px;
    background: var(--body-background);
    border-radius: 50%;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    transition: 0.2s;
    -webkit-transition: 0.2s;
    justify-content: center;
    align-items: center;
    letter-spacing: 0;
}
.pagination_page span.next{
    cursor: pointer;
}
.pagination_page li.active a:hover{
    cursor: not-allowed;
}
.comment-form label {
  display: block;
  margin-bottom: 10px;
  font-size: 14px;
  cursor: pointer;
  line-height: 1.4
}
.comment-form label .required {
  color: red
}
.comment-form input,
.comment-form textarea {
  width: 100%;
  resize: none;
  border-radius: 5px;
  box-sizing: border-box;
  border: 1px solid #999;
  padding: 8px 15px;
  font-size: 14px
}

.comment-form .submit {
  background-color: #000;
  color: #fff;
  border: 0;
  font-size: 14px;
  cursor: pointer;
  padding: 8px 30px;
  border-radius: 5px;
  width: auto
}
.comment-form p {
  margin-bottom: 15px
}
.comment-form p:last-of-type {
  margin-bottom: 0
}
.comment-form .comment-notes,
.comment-form .logged-in-as {
  font-size: 12px;
}
.comment-reply-title {
  font-weight: 700;
  font-size: 18px;
  display: flex;
  align-items: center
}
.comment-reply-title small {
  margin-left: auto;
  font-weight: 400;
  font-size: 18px
}
.commentlist {
  border-top: 1px solid var(--theme);
  list-style: none;
  padding-top: 10px
}

.commentlist .comment {
  padding: 0 0
}
.commentlist .comment-respond {
  margin-top: 20px;
  padding: 20px;
  border-radius: 5px
}
@keyframes comment--fresh {
  0% {
      background-color: #fff
  }

  100% {
      background-color: #fffee0
  }
}
.comment:last-child>.comment-body {
  border-bottom: 0
}
.comment.parent {
  border-bottom: 1px solid var(--theme)
}
.comment.parent:last-child {
  border-bottom: 0
}
.comment-body {
  padding: 25px 0
}
.comment-body__fresh {
  animation: comment--fresh 1.5s ease-in-out infinite alternate;
  border-radius: 5px
}
.comment-body .avatar {
  transition: .5s box-shadow
}
.comment-body:hover .avatar {
  box-shadow: 0 0 3px 0
}
.comment--avatar {
  flex: none;
  margin-right: 10px;
  display: flex
}
.comment--author {
  color: var(--card-text-color-tertiary);
  flex: auto;
  display: flex;
  align-items: center
}
.comment--author .comment-reply-link {
  margin-left: auto
}
.comment--author .comment-reply-link svg {
  width: 15px;
  height: 15px
}
.comment--author a:hover {
  text-decoration: underline
}
.comment--meta {
  display: flex;
  align-items: center;
  flex: auto
}
.comment-meta {
  display: flex;
  align-items: center
}
.comment-meta .avatar {
  border-radius: 100%
}
div.cancel-comment-reply.cancel-comment-reply-link {
  text-align: right;
}
.comment-content {
  word-wrap: break-word !important;
  overflow-wrap: break-word !important;
  white-space: normal !important;
}
.comment-content a {
  text-decoration: underline
}
.children {
  margin-left: 0;
  padding-bottom: 10px
}
.children .avatar {
  width: 32px;
  height: 32px
}
.children .comment-body {
  border-bottom: 0;
  padding: 15px 0
}
.children .comment-content {
  font-size: 14px
}
.parent>.children {
  margin-left: 50px
}
.comment-meta {
  margin-bottom: 10px;
  font-size: 14px;
  display: flex;
  align-items: center
}
.comment-meta .comment-metadata {
  margin-left: auto
}
.comment-reply-link {
  font-size: 12px
}
.no--comment {
  text-align: center;
  padding: 30px 0
}
.comments--title {
  color: var(--card-text-color-tertiary);
  margin-top: 30px;
  font-size: 18px;
  font-weight: 700;
  margin-bottom: 10px;
  display: flex;
  align-items: center
}
.comments--title svg {
  color: var(--card-text-color-tertiary);
  width: 24px;
  height: 24px;
  margin-right: 5px;
  position: relative;
  transform: translate3d(0, 1px, 0);
}
.comment-respond {
  padding-top: 30px
}
.comment-form-cookies-consent #wp-comment-cookies-consent {
  display: none
}
.comment-form-cookies-consent label {
  font-size: 14px;
  display: flex;
  align-items: center;
  position: relative
}
.comment-form-cookies-consent label::before {
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, .15);
  border-radius: 100%;
  height: 16px;
  margin-right: 6px;
  vertical-align: middle;
  width: 16px;
  content: "";
  flex: none
}
.dot::before {
  content: "·";
  margin-left: 4px;
  margin-right: 4px
}
.comment-form-cookies-consent input:checked+label::after {
  border-radius: 100%;
  content: "";
  position: absolute;
  left: 1px;
  height: 12px;
  margin: 2px;
  width: 12px;
  flex: none
}
/* 去除有序列表（<ol>）的列表号 */
ol.comment-list {
  list-style-type: none;
  padding-left: 0; /* 取消左侧的默认填充 */
}
/* 去除无序列表（<ul>）的列表号 */
ul.comment-list {
  list-style-type: none;
  padding-left: 0; /* 取消左侧的默认填充 */
}
/* 适用于所有嵌套的评论列表 */
ol.comment-list li, ul.comment-list li {
  list-style-type: none;
}
.text, .textarea {
  color: var(--card-text-color-main);
  background-color: var(--card-background);
}
</style>