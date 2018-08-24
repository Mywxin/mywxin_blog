<?php  if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<?php
function widget_blogger($title){ global $CACHE; $user_cache = $CACHE->readCache('user'); $name = $user_cache[1]['mail'] != '' ? "<a href=\"mailto:".$user_cache[1]['mail']."\">".$user_cache[1]['name']."</a>" : $user_cache[1]['name'];?>
	<div class="widget">
	<h3><?php echo $title; ?></h3>
	<ul id="bloggerinfo">
	<div id="bloggerinfoimg">
	<?php if (!empty($user_cache[1]['photo']['src'])): ?>
	<img src="<?php echo BLOG_URL.$user_cache[1]['photo']['src']; ?>" width="<?php echo $user_cache[1]['photo']['width']; ?>" height="<?php echo $user_cache[1]['photo']['height']; ?>" alt="blogger" />
	<?php endif;?>
	</div>
	<p><b><?php echo $name; ?></b>
	<?php echo $user_cache[1]['des']; ?></p>
	</ul>
	</div>
<?php }?>
<?php
function widget_calendar($title){ ?>
	<div class="widget">
	<h3><?php echo $title; ?></h3>
	<div id="calendar">
	</div>
	<script>sendinfo('<?php echo Calendar::url(); ?>','calendar');</script>
	</div>
<?php }?>
<?php
function widget_tag($title){ global $CACHE; $tag_cache = $CACHE->readCache('tags');?>
	<div class="widget">
	<h3><span><?php echo $title; ?></span></h3>
	<div class="tagcloud">
	<?php foreach($tag_cache as $value): ?>
		<a href="<?php echo Url::tag($value['tagurl']); ?>" title="<?php echo $value['usenum']; ?> 篇日志"><?php echo $value['tagname']; ?></a>
	<?php endforeach; ?>
	</div>
	</div>
<?php }?>
<?php
function widget_sort($title){ global $CACHE; $sort_cache = $CACHE->readCache('sort'); ?>
	<div class="widget">
	<h3><?php echo $title; ?></h3>
	<ul id="blogsort">
	<?php foreach($sort_cache as $value): ?>
	<li class="cat-item">
	<a href="<?php echo Url::sort($value['sid']); ?>"><?php echo $value['sortname']; ?>(<?php echo $value['lognum'] ?>)</a>
	</li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
function widget_twitter($title){ global $CACHE; $newtws_cache = $CACHE->readCache('newtw'); $istwitter = Option::get('istwitter'); ?>
	<div class="widget nowrap">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="twitter">
	<?php foreach($newtws_cache as $value): ?>
	<?php $img = empty($value['img']) ? "" : '<a title="查看图片" class="t_img" href="'.BLOG_URL.str_replace('thum-', '', $value['img']).'" target="_blank">&nbsp;</a>';?>
	<li><?php echo $value['t']; ?><?php echo $img;?></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
function widget_newcomm($title){ global $CACHE; $com_cache = $CACHE->readCache('comment'); ?>
	<div class="widget nowrap">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="newcomment">
	<?php
 foreach($com_cache as $value): $url = Url::comment($value['gid'], $value['page'], $value['cid']); ?>
	<li id="comment"><?php echo $value['name']; ?>
	<br /><a href="<?php echo $url; ?>"><?php echo $value['content']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
function widget_newlog($title){ global $CACHE; $newLogs_cache = $CACHE->readCache('newlog'); ?>
	<div class="widget nowrap">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="newlog">
	<?php foreach($newLogs_cache as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
function widget_hotlog($title){ $index_hotlognum = Option::get('index_hotlognum'); $Log_Model = new Log_Model(); $randLogs = $Log_Model->getHotLog($index_hotlognum);?>
	<div class="widget nowrap">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="hotlog">
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
function widget_random_log($title){ $index_randlognum = Option::get('index_randlognum'); $Log_Model = new Log_Model(); $randLogs = $Log_Model->getRandLog($index_randlognum);?>
	<div class="widget nowrap">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="randlog">
	<?php foreach($randLogs as $value): ?>
	<li><a href="<?php echo Url::log($value['gid']); ?>"><?php echo $value['title']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
function widget_search($title){ ?>
	<div class="widget">
	<div id="search">
	<h3><span><?php echo $title; ?></span></h3>
		<form id="searchform" method="get" action="<?php echo BLOG_URL; ?>">
			<input type="text" value="" name="keyword" id="s" size="30" x-webkit-speech>
			<button type="submit" id="searchsubmit"><i class="iconfont">&#337;</i></button>
		</form>
	</div>
	</div>
<?php } ?>
<?php
function widget_archive($title){ global $CACHE; $record_cache = $CACHE->readCache('record'); ?>
	<div class="widget nowrap">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="record">
	<?php foreach($record_cache as $value): ?>
	<li><a href="<?php echo Url::record($value['date']); ?>"><?php echo $value['record']; ?>(<?php echo $value['lognum']; ?>)</a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php } ?>
<?php
function widget_custom_text($title, $content){ ?>
	<div class="widget nowrap">
	<h3><span><?php echo $title; ?></span></h3>
	<ul>
	<?php echo $content; ?>
	</ul>
	</div>
<?php } ?>
<?php
function widget_link($title){ global $CACHE; $link_cache = $CACHE->readCache('link'); ?>
	<div class="widget nowrap">
	<h3><span><?php echo $title; ?></span></h3>
	<ul id="link">
	<?php foreach($link_cache as $value): ?>
	<li><a href="<?php echo $value['url']; ?>" title="<?php echo $value['des']; ?>" target="_blank"><?php echo $value['link']; ?></a></li>
	<?php endforeach; ?>
	</ul>
	</div>
<?php }?>
<?php
function blog_navi(){ global $CACHE; $navi_cache = $CACHE->readCache('navi'); ?>
	<ul id="nav">
	<?php  foreach($navi_cache as $value): if($value['type'] == 3 && (ROLE == 'admin' || ROLE == 'writer')): ?>
			<li><a href="<?php echo BLOG_URL; ?>admin/write_log.php">写日志</a></li>
			<li><a href="<?php echo BLOG_URL; ?>admin/">管理站点</a></li>
			<li><a href="<?php echo BLOG_URL; ?>admin/?action=logout">退出</a></li>
			<?php  continue; endif; $newtab = $value['newtab'] == 'y' ? 'target="_blank"' : ''; $value['url'] = $value['isdefault'] == 'y' ? BLOG_URL . $value['url'] : trim($value['url'], '/'); $current_tab = (BLOG_URL . trim(Dispatcher::setPath(), '/') == $value['url']) ? 'current' : 'common'; ?>
		<li class="<?php echo $current_tab;?>"><a href="<?php echo $value['url']; ?>" <?php echo $newtab;?>><?php echo $value['naviname']; ?></a></li>
	<?php endforeach; ?>
	</ul>
<?php }?>
<?php
function topflg($istop){ $topflg = $istop == 'y' ? "<img src=\"".TEMPLATE_URL."/images/import.gif\" title=\"置顶文章\" /> " : ''; echo $topflg; } ?>
<?php
function editflg($logid,$author){ $editflg = ROLE == 'admin' || $author == UID ? '<a href="'.BLOG_URL.'admin/write_log.php?action=edit&gid='.$logid.'" target="_blank">编辑</a>' : ''; echo $editflg; } ?>
<?php
function blog_sort($blogid){ global $CACHE; $log_cache_sort = $CACHE->readCache('logsort'); ?>
	<?php if(!empty($log_cache_sort[$blogid])): ?>
	<a href="<?php echo Url::sort($log_cache_sort[$blogid]['id']); ?>"><?php echo $log_cache_sort[$blogid]['name']; ?></a>
	<?php endif;?>
<?php }?>
<?php
function blog_tag($blogid){ global $CACHE; $log_cache_tags = $CACHE->readCache('logtags'); if (!empty($log_cache_tags[$blogid])){ $tag = ''; foreach ($log_cache_tags[$blogid] as $value){ $tag .= "	<a href=\"".Url::tag($value['tagurl'])."\">".$value['tagname'].'</a>'; } echo $tag; } } ?>
<?php
function blog_author($uid){ global $CACHE; $user_cache = $CACHE->readCache('user'); $author = $user_cache[$uid]['name']; $mail = $user_cache[$uid]['mail']; $des = $user_cache[$uid]['des']; $title = !empty($mail) || !empty($des) ? "title=\"$des $mail\"" : ''; echo '<a href="'.Url::author($uid)."\" $title>$author</a>"; } ?>
<?php
function neighbor_log($neighborLog){ extract($neighborLog);?>
	<?php if($prevLog):?>
	<div class="prev">&laquo; <a href="<?php echo Url::log($prevLog['gid']) ?>"><?php echo $prevLog['title'];?></a></div>
	<?php endif;?>
	<?php if($nextLog):?>
		 <div class="next"><a href="<?php echo Url::log($nextLog['gid']) ?>"><?php echo $nextLog['title'];?></a>&raquo;</div>
	<?php endif;?>
<?php }?>
<?php
function blog_trackback($tb, $tb_url, $allow_tb){ if($allow_tb == 'y' && Option::get('istrackback') == 'y'):?>
	<div id="trackback_address">
	<p>引用地址: <input type="text" style="width:350px" class="input" value="<?php echo $tb_url; ?>">
	<a name="tb"></a></p>
	</div>
	<?php endif; ?>
	<?php foreach($tb as $key=>$value):?>
		<ul id="trackback">
		<li><a href="<?php echo $value['url'];?>" target="_blank"><?php echo $value['title'];?></a></li>
		<li>BLOG: <?php echo $value['blog_name'];?></li><li><?php echo $value['date'];?></li>
		</ul>
	<?php endforeach; ?>
<?php }?>
<?php
function blog_comments($comments){ extract($comments); if($commentStacks): ?>
	<h3>评论</h3>
	<?php endif; ?>
	<ol class="comment_list">
	<?php
 $isGravatar = Option::get('isgravatar'); foreach($commentStacks as $cid): $comment = $comments[$cid]; $comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster']; ?>
	<li id="comment">
	<div id="comment-<?php echo $comment['cid']; ?>">
		<?php if($isGravatar == 'y'): ?><div class="avatar"><img src="<?php echo getGravatar($comment['mail']); ?>" /></div><?php endif; ?>
		<div class="comment">
			<div class="comment_meta">
				<cite><?php echo $comment['poster']; ?></cite>
				<span class="time"><?php echo $comment['date']; ?></span>
				<span class="reply"><a class="comment-reply-link" href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></span>
				<p>
					<?php echo $comment['content']; ?>
				</p>
			</div>
		</div>
	</div>
	<?php blog_comments_children($comments, $comment['children']); ?>
	</li>
	<?php endforeach; ?>
	</ol>
    <div class="navigation">
	<div class="pagination">
		<?php echo $commentPageUrl;?>
	</div>
</div>
<?php }?>
<?php
function blog_comments_children($comments, $children){ $isGravatar = Option::get('isgravatar'); foreach($children as $child): $comment = $comments[$child]; if ($comment['level']<3&&!empty($child)): ?>
	<ol class="children">
	<?php endif; break; endforeach; foreach($children as $child): $comment = $comments[$child]; $comment['poster'] = $comment['url'] ? '<a href="'.$comment['url'].'" target="_blank">'.$comment['poster'].'</a>' : $comment['poster']; ?>
	<li id="li-comment-<?php echo $comment['cid']; ?>">
	<div id="comment-<?php echo $comment['cid']; ?>">
		<?php if($isGravatar == 'y'): ?><div class="avatar"><img src="<?php echo getGravatar($comment['mail']); ?>" /></div><?php endif; ?>
		<div class="comment">
			<div class="comment_meta">
				<cite><?php echo $comment['poster']; ?></cite>
				<span class="time"><?php echo $comment['date']; ?></span>
				<span class="reply"><a class="comment-reply-link" href="#comment-<?php echo $comment['cid']; ?>" onclick="commentReply(<?php echo $comment['cid']; ?>,this)">回复</a></span>
				<p>
					<?php echo $comment['content']; ?>
				</p>
			</div>
		</div>
	</div>
	<?php blog_comments_children($comments, $comment['children']);?>
	</li>
	<?php endforeach; foreach($children as $child): $comment = $comments[$child]; if ($comment['level']<3&&!empty($child)): ?>
	</ol>
	<?php endif; break; endforeach; }?>
<?php
function blog_comments_post($logid,$ckname,$ckmail,$ckurl,$verifyCode,$allow_remark){ if($allow_remark == 'y'): ?>
	<div id="comment-place">
	<div id="comment-post" class="respond">
	<h3>
		发表评论
		<span class="cancel-comment-reply-link" id="cancel-reply" style="display:none"><a href="javascript:void(0);" onclick="cancelReply()">取消回复</a></span>
	</h3>
	<form class="commentform" name="commentform" action="<?php echo BLOG_URL; ?>index.php?action=addcom" method="post" id="commentform">
		<p>电子邮件地址不会被公开。必填项已用<span class="required">*</span>标注</p>
		<input type="hidden" name="gid" value="<?php echo $logid; ?>" />
		<?php if(ROLE == 'visitor'): ?>
		<p class="comment-form-author">
			<input type="text" name="comname" id="author" value="<?php echo $ckname; ?>" tabindex="1">
			<label for="author">
				姓名
				<span class="required">*</span>
			</label>
		</p>
		<p class="comment-form-email">
			<input type="email" name="commail" id="email" value="<?php echo $ckmail; ?>" tabindex="2">
			<label for="email">
				电子邮件
				<span class="required">*</span>
			</label>
		</p>
		<p class="comment-form-url">
			<input type="text" name="comurl" id="url" value="<?php echo $ckurl; ?>" tabindex="3">
			<label for="url">
				站点
			</label>
		</p>
		<?php endif; ?>
		<p class="comment-form-comment">
			<label for="comment">
				评论
			</label>
			<textarea name="comment" id="comment" cols="45" rows="8" tabindex="4"></textarea>
		</p>
		<p class="form-submit">
			<p><span id="verify"><?php echo $verifyCode; ?> </span>
			<input type="submit" id="submit" value="发表评论" tabindex="6" /></p>
			<input type="hidden" name="pid" id="comment-pid" value="0" size="22" tabindex="1"/>
		</p>
	</form>
	</div>
	</div>
	<?php endif; ?>
<?php }?>
<?php
function utf8_strcut($str, $start, $length=null) { preg_match_all('/./us', preg_replace("/<(.*?)>/","",htmlspecialchars_decode($str)), $match); $chars = is_null($length)? array_slice($match[0], $start ) : array_slice($match[0], $start, $length); unset($str); return implode('', $chars); } ?>
<?php
function Get_Log($blogId,$type) { $sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE gid=$blogId AND hide='n'"; $res = mysql_query($sql); $row = mysql_fetch_array($res); return $row[$type]; } ?>