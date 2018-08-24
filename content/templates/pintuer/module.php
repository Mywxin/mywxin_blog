<?php 
/**
 * 侧边栏组件、页面模块
 */
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<?php
//widget：搜索
function widget_search($title){ ?>
	<div id="logsearch" class="input-group padding-little-top" title="<?php echo $title; ?>">
		<form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
			<input type="text" class="input border-main search float-left" name="keyword" size="30" placeholder="关键词" style="width:200px;" /><span class="addbtn"><button type="submit" class="button bg-main icon-search"></button></span>
		</form>
	</div>
	<br />
<?php } ?>
<?php
//widget：blogger
function widget_blogger($title){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
	<div class="tab tab-small">
		<div class="tab-head">
			<ul class="tab-nav">
				<li class="active">
					<a href="#tab-personal"><?php echo $title; ?></a>
				</li>
				<li>
					<a href="#tab-calendar">日历</a>
				</li>
			</ul>
		</div>
		<div class="tab-body tab-body-bordered">
			<div class="tab-panel active" id="tab-personal">
				<div class="media media-y">
					<?php if (!empty($user_cache[1]['photo']['src'])): ?>
					<img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>" width="128" height="128" class="radius" alt="blogger">
					<?php endif;?>
					<div class="media-body" style="width:200px;">
					<p>
						<strong class="text-center"><?php echo $name; ?></strong>
						<?php echo $user_cache[1]['des']; ?>
					</p>
					</div>
				</div>
			</div>
<?php }?>
<?php
//widget：日历
function widget_calendar($title){ ?>
	<div class="tab-panel" id="tab-calendar">
		<div class="line">
			<div id="calendar">
				<script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
			</div>
		</div>
	</div>
	</div>
	</div>
	<br />
<?php }?>
<?php
//widget：热门文章
function widget_hotlog($title){
	$index_hotlognum = Option::get('index_hotlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getHotLog($index_hotlognum);?>
	<div class="tab tab-small">
		<div class="tab-head">
			<ul class="tab-nav">
				<li class="active">
					<a href="#tab-hot">热门</a>
				</li>
				<li>
					<a href="#tab-new">最新</a>
				</li>
				<li>
					<a href="#tab-random">随机</a>
				</li>
			</ul>
		</div>
		<div class="tab-body tab-body-bordered">
			<div class="tab-panel text-small active" id="tab-hot">
				<ul class="sidenav nav spy" data-offset-fixed="320" data-offset-spy="160">
				<?php foreach($randLogs as $value): ?>
				<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
				<?php endforeach; ?>
				</ul>
			</div>
<?php }?>
<?php
//widget：最新文章
function widget_newlog($title){
	global $CACHE; 
	$newLogs_cache = $CACHE->readCache('newlog');
	?>
	<div class="tab-panel text-small" id="tab-new">
		<ul class="sidenav nav spy" data-offset-fixed="320" data-offset-spy="160">
		<?php foreach($newLogs_cache as $value): ?>
		<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
		<?php endforeach; ?>
		</ul>
	</div>
<?php }?>
<?php
//widget：随机文章
function widget_random_log($title){
	$index_randlognum = Option::get('index_randlognum');
	$Log_Model = new Log_Model();
	$randLogs = $Log_Model->getRandLog($index_randlognum);?>
	<div class="tab-panel text-small" id="tab-random">
		<ul class="sidenav nav spy" data-offset-fixed="320" data-offset-spy="160">
		<?php foreach($randLogs as $value): ?>
			<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
		<?php endforeach; ?>
		</ul>
	</div>
	</div>
	</div>
	<br />
<?php }?>	
<?php
//widget：分类
function widget_sort($title){
	global $CACHE;
	$sort_cache = $CACHE->readCache('sort'); ?>
	<div class="tab tab-small">
		<div class="tab-head">
			<ul class="tab-nav">
				<li class="active">
					<a href="#tab-class">分类</a>
				</li>
				<li>
					<a href="#tab-archives">存档</a>
				</li>
				<li>
					<a href="#tab-tag">标签</a>
				</li>
			</ul>
		</div>
		<div class="tab-body tab-body-bordered">
			<div class="tab-panel text-small active" id="tab-class">
				<ul class="sidenav nav spy" data-offset-fixed="320" data-offset-spy="160">
					<li>
						<?php
						foreach($sort_cache as $value):
							if ($value['pid'] != 0) continue;
						?>
						<li>
						<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
						<?php if (!empty($value['children'])): ?>
							<ul>
							<?php
							$children = $value['children'];
							foreach ($children as $key):
								$value = $sort_cache[$key];
							?>
							<li>
								<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
							</li>
							<?php endforeach; ?>
							</ul>
						<?php endif; ?>
						</li>
						<?php endforeach; ?>
					</li>
    			</ul>
			</div>	
<?php }?>
<?php
//widget：归档
function widget_archive($title){
	global $CACHE; 
	$record_cache = $CACHE->readCache('record');
	?>
	<div class="tab-panel text-small padding" id="tab-archives">
		<ol>
			<?php foreach($record_cache as $value): ?>
			<li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li>
			<?php endforeach; ?>
		</ol>
	</div>
<?php } ?>
<?php
//widget：标签
function widget_tag($title){
	global $CACHE;
	$tag_cache = $CACHE->readCache('tags');?>
	<div class="tab-panel text-small padding" id="tab-tag">
	<?php foreach($tag_cache as $value): ?>
		<span class="
			<?php 
				$rd_color=array("badge"=>"","badge bg-main"=>"","badge bg-sub"=>"","badge bg-back"=>"","badge bg-mix"=>"","badge bg-dot"=>"","badge bg-black"=>""
				,"badge bg-gray"=>"","badge bg-white"=>"","badge bg-red"=>"","badge bg-yellow"=>"","badge bg-blue"=>"","badge bg-green"=>"","badge bg-red-light"=>""
				,"badge bg-yellow-light"=>"","badge bg-blue-light"=>"","badge bg-green-light"=>"");
				echo array_rand($rd_color,1) 
			?>
				">
		<a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇文章"><?php echo $value['tagname']; ?></a></span>
	<?php endforeach; ?>
	</div>
	</div>
	</div>
	<br />
<?php }?>
<?php
//widget：最新微语
function widget_twitter($title){
	global $CACHE; 
	$newtws_cache = $CACHE->readCache('newtw');
	$istwitter = Option::get('istwitter');
	?>
	<div class="tab tab-small">
		<div class="tab-head">
			<ul class="tab-nav">
				<li >
					<a href="#tab-talk"><?php echo $title; ?></a>
				</li>
				<li class="active">
					<a href="#tab-comments">最新评论</a>
				</li>
			</ul>
		</div>
		<div class="tab-body tab-body-bordered">
		<div class="tab-panel text-small" id="tab-talk">
			<ul class="sidenav nav spy" data-offset-fixed="320" data-offset-spy="160">
				<?php foreach($newtws_cache as $value): ?>
				<?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank">&nbsp;</a>';?>
				<li><a class="cuttitle"><?php echo $value['t']; ?></a></li>
				<?php endforeach; ?>
			</ul>
		</div>
<?php }?>
<?php
//widget：最新评论
function widget_newcomm($title){
	global $CACHE; 
	$com_cache = $CACHE->readCache('comment');
	?>
	<div class="tab-panel text-small active" id="tab-comments">
			<ul class="sidenav nav spy" data-offset-fixed="320" data-offset-spy="160">
			<?php
			foreach($com_cache as $value):
			$url = Url::comment($value['gid'], $value['page'], $value['cid']);
			?>
			<li id="comment"><strong class="tag-yellow-light"><?php echo $value['name']; ?></strong>
			<br /><a href="<?php echo $url; ?>"><?php echo $value['content']; ?></a></li>
			<?php endforeach; ?>
			</ul>
	</div>
	</div>
	</div>
	<br>
<?php }?>
<?php
//widget：自定义组件
function widget_custom_text($title, $content){ ?>
	<div class="tab tab-small">
		<div class="tab-head">
			<ul class="tab-nav">
				<li class="active">
					<a href="#tab-<?php echo $title; ?>"><?php echo $title; ?></a>
				</li>
			</ul>
		</div>
		<div class="tab-body tab-body-bordered">
		<div class="tab-panel text-small active" id="tab-<?php echo $title; ?>">
			<?php echo $content; ?>
		</div>
		</div>
	</div>
	<br>
<?php } ?>
<?php
//widget：链接
function widget_link($title){
	global $CACHE; 
	$link_cache = $CACHE->readCache('link');
    //if (!blog_tool_ishome()) return;#只在首页显示友链去掉双斜杠注释即可
	?>
	<div class="tab tab-small">
		<div class="tab-head">
			<ul class="tab-nav">
				<li class="active">
					<a href="#tab-link">友情链接</a>
				</li>
			</ul>
		</div>
		<div class="tab-body tab-body-bordered">
			<div class="tab-panel text-small active" id="tab-link">
				<ol>
					<?php foreach($link_cache as $value): ?>
					<li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
					<?php endforeach; ?>
				</ol>
			</div>
		</div>
	</div>
<?php }?> 
<?php
//blog：导航
function blog_navi(){
	global $CACHE; 
	$navi_cache = $CACHE->readCache('navi');
	?>
	<ul class="bar">
	<?php
	foreach($navi_cache as $value):

        if ($value['pid'] != 0) {
            continue;
        }

		if($value['url'] == ROLE_ADMIN && (ROLE == ROLE_ADMIN || ROLE == ROLE_WRITER)):
			?>
			<li class="item common"><a href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
			<li class="item common"><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
			<?php 
			continue;
		endif;
		$newtab = $value['newtab'] == 'y' ? 'target="_blank"' : '';
        $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/');
        $current_tab = BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url'] ? 'current' : 'common';
		?>
		<li class="item <?php echo $current_tab;?>">
			<a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a>
			<?php if (!empty($value['children'])) :?>
            <ul class="sub-nav">
                <?php foreach ($value['children'] as $row){
                        echo '<li><a href="'.Url::sort($row['sid']).'">'.$row['sortname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>

            <?php if (!empty($value['childnavi'])) :?>
            <ul class="sub-nav">
                <?php foreach ($value['childnavi'] as $row){
                        $newtab = $row['newtab'] == 'y' ? 'target="_blank"' : '';
                        echo '<li><a href="' . $row['url'] . "\" $newtab >" . $row['naviname'].'</a></li>';
                }?>
			</ul>
            <?php endif;?>

		</li>
	<?php endforeach; ?>
	</ul>
<?php }?>
<?php
//blog：置顶
function topflg($top, $sortop='n', $sortid=null){
    if(blog_tool_ishome()) {
       echo $top == 'y' ? "<span class='icon-eject bg-yellow'></span>" : '';
    } elseif($sortid){
       echo $sortop == 'y' ? "<span class='icon-caret-up bg-blue'></span>" : '';
    }
}
?>
<?php
//blog：编辑
function editflg($logid,$author){
	$editflg = ROLE == ROLE_ADMIN || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">编辑</a>' : '';
	echo $editflg;
}
?>
<?php
//blog：分类
function blog_sort($blogid){
	global $CACHE; 
	$log_cache_sort = $CACHE->readCache('logsort');
	?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
    <a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>			
	<?php endif;?>
<?php }?>
<?php
//blog：文章标签
function blog_tag($blogid){
	global $CACHE;
	$log_cache_tags = $CACHE->readCache('logtags');
	if (!empty($log_cache_tags[$blogid])){
		$tag = '标签:';
		foreach ($log_cache_tags[$blogid] as $value){
			$tag .= "	<a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>';
		}
		echo $tag;
	}
}
?>
<?php
//blog：文章作者
function blog_author($uid){
	global $CACHE;
	$user_cache = $CACHE->readCache('user');
	$author = $user_cache[$uid]['name'];
	$mail = $user_cache[$uid]['mail'];
	$des = $user_cache[$uid]['des'];
	$title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : '';
	echo '<a href="'.Url::author($uid)."\" $title>$author</a>";
}
?>
<?php
//blog：相邻文章
function neighbor_log($neighborLog){
	extract($neighborLog);?>
	<?php if($prevLog):?>
	&laquo; <a href="<?php echo Url::log($prevLog['gid']) ?>"><?php echo $prevLog['title'];?></a>
	<?php endif;?>
	<?php if($nextLog && $prevLog):?>
		|
	<?php endif;?>
	<?php if($nextLog):?>
		 <a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'];?></a>&raquo;
	<?php endif;?>
<?php }?>
<?php
//blog：评论列表
function blog_comments($comments){
    extract($comments);
    if($commentStacks): ?>
    <a name="comments"></a>
    <strong class="text-main comment-header">评论：</strong>
	<?php endif; ?>
	<?php
	$isGravatar = Option::get('isgravatar');
	foreach($commentStacks as $cid):
    $comment = $comments[$cid];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<div class="comment panel-body border-top text-small" id="comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<div class="comment-info">
			<b><?php echo $comment['poster']; ?> </b><span class="comment-time"><?php echo $comment['date']; ?></span>
			<div class="comment-content text-small padding-small-top height-small"><?php echo $comment['content']; ?></div>
			<div class="comment-reply text-small padding-small-top height-small"><a class="tag bg-main" href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></div>
		</div>
		<?php blog_comments_children($comments, $comment['children']); ?>
	</div>
	<?php endforeach; ?>
    <div id="pagenavi">
	    <?php echo $commentPageUrl;?>
    </div>
<?php }?>
<?php
//blog：子评论列表
function blog_comments_children($comments, $children){
	$isGravatar = Option::get('isgravatar');
	foreach($children as $child):
	$comment = $comments[$child];
	$comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster'];
	?>
	<div class="comment comment-children panel-body border text-small margin-top" id="comment-<?php echo $comment['cid']; ?>">
		<a name="<?php echo $comment['cid']; ?>"></a>
		<div class="comment-info">
			<b><?php echo $comment['poster']; ?> </b><span class="comment-time"><?php echo $comment['date']; ?></span>
			<div class="comment-content text-small padding-small-top height-small"><?php echo $comment['content']; ?></div>
			<?php if($comment['level'] < 4): ?><div class="comment-reply"><a class="tag bg-main" href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></div><?php endif; ?>
		</div>
		<?php blog_comments_children($comments, $comment['children']);?>
	</div>
	<?php endforeach; ?>
<?php }?>
<?php
//blog：发表评论表单
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){
	if($allow_remark == 'y'): ?>
	<div id="comment-place">
	<div class="comment-post" id="comment-post">
		<div class="cancel-reply" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()">取消回复</a></div>
		<strong class="text-green comment-header">发表评论：<a name="respond"></a></strong>
		<hr />
		<form method="post" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" id="commentform">
			<input type="hidden" name="gid" value="<?php echo $logid; ?>" />
			<?php if(ROLE == ROLE_VISITOR): ?>
			<div class="form-group" id="f_1447136101540">
				<div class="field">
					<input class="input" type="text" name="comname" maxlength="49" value="<?php echo $ckname; ?>" size="22" tabindex="1" data-validate="required:请填写昵称" placeholder="请填写昵称">
				</div>
			</div>
			<?php endif; ?>
			<div class="form-group" id="f_1447136101540">
				<div class="field">
					<textarea class="input" name="comment" id="comment" rows="2" tabindex="4" data-validate="required:请填写评论内容" placeholder="请填写评论内容"></textarea>
				</div>
			</div>
			<div class="form-group" id="f_1447136116228">
				<p class="form-inline">
					<?php echo $verifyCode; ?>
				</p>
				<br>
				<input class="button bg-yellow button-block" type="submit" id="comment_submit" value="发表评论" tabindex="6" />
			</div>
			<input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
		</form>
	</div>
	</div>
	<?php endif; ?>
<?php }?>
<?php
//blog-tool:判断是否是首页
function blog_tool_ishome(){
    if (BLOG_URL . trim(Dispatcher::setPath(), '/') == BLOG_URL){
        return true;
    } else {
        return FALSE;
    }
}
?>
