<?php 
/*
* 自建页面模板
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="main">
<div id="article">
	<h1><?php echo $log_title; ?></h1>
	<div class="text"><?php echo $log_content; ?></div>
		<div class="text_add">
			<div class="copy"><p style="color:#F00;">本文出自 <?php echo $blogname; ?>，转载时请注明出处及相应链接。</p></div>
		</div>
	<div class="meta"><i class="iconfont">&#48;</i><?php blog_tag($logid); ?></div>
	<?php doAction('log_related', $logData); ?>
</div>
<div id="comments">
	<?php blog_comments($comments); ?>
	<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
	<div style="clear:both;"></div>
</div>
</div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>