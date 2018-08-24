<?php 
/**
 * 阅读文章页面
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="container">
	<div class="line">
	<div class="xl12 xs12 xm9 xb9">
	<!--list.start-->
		<div class="doc-right">
			<div class="panel">
			<div class="panel-body">
			<br />
			<h1 align="center"><?php topflg($top); ?><?php echo $log_title; ?></h1>
			<p class="text-center text-small"><?php echo gmdate('Y-n-j', $date); ?>  <?php blog_author($author); ?> <?php blog_sort($logid); ?> <?php editflg($logid,$author); ?></p>
			<hr />
			<?php echo $log_content; ?>
			</div>
			<span class="tag bg-main float-left margin-small"><?php blog_tag($logid); ?></span>
			<span class="nextlog float-right margin-small text-main"><?php neighbor_log($neighborLog); ?></span>
			<hr>
			<?php doAction('log_related', $logData); ?>
			<div class="panel-body border-top">
				<?php blog_comments($comments); ?>
				<?php blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark); ?>
			</div>
		</div>
	</div>
	<!--list.end-->
	<script>
	$(function(){
		layer.config({
		    extend: [
		        'http://www.pintuer.com/plugins/layer/extend/layer.ext.js'
		    ]
		});
		$(".panel-body").click(function(){
			layer.photos({
		        photos: $(this)
		    });
		});
	});
	</script>
</div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>