<?php 
/*
* 阅读日志页面
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="main">
<div id="article">
	<h1><?php topflg($top); ?><?php echo $log_title; ?></h1>
	<div class="info">
		<span class="meat_span">作者：<?php blog_author($author); ?></span>
		<span class="meat_span">分类：<?php blog_sort($logid); ?></span>
		<span class="meat_span">发布于：<?php echo gmdate('Y-n-j G:i', $date); ?></span>
		<span class="meat_span"><i class="iconfont">&#279;</i><?php echo Get_Log($logid,'views'); ?>次浏览</span>
		<span class="meat_span"><i class="iconfont">&#54;</i><a href="<?php echo $value['log_url']; ?>#comments"><?php echo Get_Log($logid,'comnum'); ?>条评论</a>
	</div>
	<div class="text"><?php echo $log_content; ?></div>
		<div class="text_add">
			<div class="copy"><p style="color:#F00;">本文出自 <?php echo $blogname; ?>，转载时请注明出处及相应链接。</p></div>
		</div>
	<div class="meta"><i class="iconfont">&#48;</i><?php blog_tag($logid); ?></div>
	<?php doAction('log_related', $logData); ?>
</div>
<div class="post_link">
	<?php neighbor_log($neighborLog); ?>
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