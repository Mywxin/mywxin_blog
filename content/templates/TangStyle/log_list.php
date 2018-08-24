<?php 
/*
* 首页日志列表部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="main">
<?php doAction('index_loglist_top'); ?>
<?php foreach($logs as $value): ?>
		<div class="post_list">
			<h2><?php topflg($value['top']); ?><a href="<?php echo $value['log_url']; ?>"><?php echo $value['log_title']; ?></a></h2>
			<div class="info"><?php blog_author($value['author']); ?> | <?php blog_sort($value['logid']); ?> | <?php echo gmdate('Y-m-d', $value['date']); ?></div>
			<div class="excerpt">
				<?php
				if(Get_Log($value['logid'],'excerpt'))
					echo $value['log_description'];
				else echo utf8_strcut(Get_Log($value['logid'],'content'), 0, 200);
				?>
				<?php if (!Get_Log($value['logid'],'excerpt')):?>
				<span class="more">[<a href="<?php echo $value['log_url']; ?>" class="more-link" style="opacity: 1;">阅读全文</a>]</span>
				<?php endif;?>
			</div>
			<div class="meta">
				<span class="meat_span"><i class="iconfont">&#279;</i><?php echo $value['views']; ?>次浏览</span>
				<span class="meat_span"><i class="iconfont">&#54;</i><a href="<?php echo $value['log_url']; ?>#comments"><?php echo $value['comnum']; ?>条评论</a></span>
				<span class="meat_span meat_max"><i class="iconfont">&#48;</i><?php blog_tag($value['logid']); ?></span>
			</div>
		</div>
<?php endforeach; ?>
<div class="navigation">
	<div class="pagination">
		<?php echo $page_url;?>
	</div>
</div>
</div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>