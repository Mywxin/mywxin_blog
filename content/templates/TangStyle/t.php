<?php 
/*
* 碎语部分
*/
if(!defined('EMLOG_ROOT')) {exit('error!');} 
?>
<div id="main">
	<div id="comments" class="tw">  
	<ol class="comment_list">
	<?php 
		foreach($tws as $val):
		$author = $user_cache[$val['author']]['name'];
		$avatar = empty($user_cache[$val['author']]['avatar']) ? 
		BLOG_URL . 'admin/views/images/avatar.jpg' : 
		BLOG_URL . $user_cache[$val['author']]['avatar'];
		$tid = (int)$val['id'];
		$img = empty($val['img']) ? "" : '<a title="查看图片" href="'.BLOG_URL.str_replace('thum-', '', $val['img']).'" target="_blank"><img style="border: 1px solid #EFEFEF;" src="'.BLOG_URL.$val['img'].'"/></a>';
	?> 
	<li id="li-comment-22">
		<div id="twitter-<?php echo $tid; ?>">
			<div class="avatar">
			<img width="40" height="40" src="<?php echo $avatar; ?>" class="avatar avatar-40 photo">
			</div>			
			<div class="comment">
				<div class="comment_meta">
					<cite><?php echo $author; ?></cite>			
					<span class="time"><?php echo $val['date'];?></span>		
				</div>
				<?php echo $val['t'].'<br/>'.$img;?>			
				<div class="comment-reply">
				<a href="javascript:loadr('<?php echo DYNAMIC_BLOGURL; ?>?action=getr&tid=<?php echo $tid;?>','<?php echo $tid;?>');">回复(<span id="rn_<?php echo $tid;?>"><?php echo $val['replynum'];?></span>)</a>
				</div>
			</div>
		</div> 
		<ol id="r_<?php echo $tid;?>" class="r"></ol>
		<?php if ($istreply == 'y'):?>
		<div class="huifu" id="rp_<?php echo $tid;?>">
			<textarea class="mytxt" id="rtext_<?php echo $tid; ?>"></textarea>
				<div class="tbutton">
					<div class="tinfo" style="display:<?php if(ROLE == 'admin' || ROLE == 'writer'){echo 'none';}?>">
						<input class="mytxt" size="20" type="text" id="rname_<?php echo $tid; ?>" placeholder="请输入您的昵称" value="" />
						<span style="display:<?php if($reply_code == 'n'){echo 'none';}?>">
							<input class="mytxt" size="20" type="text" id="rcode_<?php echo $tid; ?>" placeholder="请输入验证码" value=""/ ><?php echo $rcode; ?>
						</span>		
					</div>
					<input id="comment_submit" style="margin-top:10px;" type="submit" onclick="reply('<?php echo DYNAMIC_BLOGURL; ?>index.php?action=reply',<?php echo $tid;?>);" value="回复" /> 
					<div style="margin-left:10px;" class="msg"><span id="rmsg_<?php echo $tid; ?>" style="color:#FF6600"></span></div>
				</div>
		</div>
		<?php endif;?>
	</li>
	<?php endforeach;?>
	</ol>
	</div>
	<div id="navigation">
		<div class="pagination">
			<?php echo $pageurl;?>
		</div>
	</div>
</div>
<?php
 include View::getView('side');
 include View::getView('footer');
?>