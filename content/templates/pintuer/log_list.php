<?php 
/**
 * 站点首页模板
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div class="container">
<div class="line">
	<div class="xm9">
		<!--list.start-->
		<div class="doc-right">
		<?php doAction('index_loglist_top'); ?>
		<?php 
		if (!empty($logs)):
		foreach($logs as $value): 
		?>
		<div class="panel">
			<div class="panel-head">
				<span class="float-right text-small">
					<?php echo gmdate('Y-n-j', $value['date']); ?> <?php blog_author($value['author']); ?> 
					<?php blog_sort($value['logid']); ?> 
					<?php editflg($value['logid'],$value['author']); ?>
				</span>
				<strong><?php topflg($value['top'], $value['sortop'], isset($sortid)?$sortid:''); ?><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></strong>
			</div>
			<div class="panel-body"><?php echo $value['log_description']; ?></div>
			<div class="panel-foot">
				<?php topflg($value['top'], $value['sortop'], isset($sortid)?$sortid:''); ?><a href="<?php echo $value['log_url']; ?>" class="button bg-yellow float-right button-little">阅读全文</a>
				<small class="padding-small-top"><?php blog_tag($value['logid']); ?> | <a href="<?php echo $value['log_url']; ?>#comments">评论(<?php echo $value['comnum']; ?>)</a> | <a href="<?php echo $value['log_url']; ?>">浏览(<?php echo $value['views']; ?>)</a></small>
			</div>
		</div>
		<br />
		<?php 
		endforeach;
		else:
		?>
		<h2>未找到</h2>
		<p>抱歉，没有符合您查询条件的结果。</p>
		<?php endif;?>
		<div id="pagenavi" class="text-center">
			<?php echo $page_url;?>
		</div>
		</div>
		<!--list.end-->
	</div>
<!-- end #contentleft-->
<?php
 include View::getView('side');
 include View::getView('footer');
?>