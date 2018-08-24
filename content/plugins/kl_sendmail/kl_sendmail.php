<?php
/*
Plugin Name: Sendmail
Version: 3.8
Plugin URL: http://kller.cn/?post=61
Description: 发送博客留言至E-mail。
Author: 作者：KLLER 美化：蓝叶
Author Email: kller@foxmail.com
Author URL: http://kller.cn
*/

!defined('EMLOG_ROOT') && exit('access deined!');
require_once(EMLOG_ROOT.'/content/plugins/kl_sendmail/class/class.smtp.php');
require_once(EMLOG_ROOT.'/content/plugins/kl_sendmail/class/class.phpmailer.php');
function kl_sendmail_do($mailserver, $port, $mailuser, $mailpass, $mailto, $subject,  $content, $fromname)
{
	$mail = new KL_SENDMAIL_PHPMailer();
	$mail->CharSet = "UTF-8";
	$mail->Encoding = "base64";
	$mail->Port = $port;

	if(KL_MAIL_SENDTYPE == 1)
	{
		$mail->IsSMTP();
	}else{
		$mail->IsMail();
	}
	$mail->Host = $mailserver;
	$mail->SMTPAuth = true;
	$mail->Username = $mailuser;
	$mail->Password = $mailpass;

	$mail->From = $mailuser;
	$mail->FromName = $fromname;

	$mail->AddAddress($mailto);
	$mail->WordWrap = 500;
	$mail->IsHTML(true);
	$mail->Subject = $subject;
	$mail->Body = $content;
	$mail->AltBody = "This is the body in plain text for non-HTML mail clients";
	if($mail->Host == 'smtp.gmail.com') $mail->SMTPSecure = "ssl";
	if(!$mail->Send())
	{
		echo $mail->ErrorInfo;
		return false;
	}else{
		return true;
	}
}
function kl_sendmail_get_comment_mail()
{
	include(EMLOG_ROOT.'/content/plugins/kl_sendmail/kl_sendmail_config.php');
	if(KL_IS_SEND_MAIL == 'Y' || KL_IS_REPLY_MAIL == 'Y')
	{
		$comname = isset($_POST['comname']) ? addslashes(trim($_POST['comname'])) : '';
		$comment = isset($_POST['comment']) ? addslashes(trim($_POST['comment'])) : '';
		$commail = isset($_POST['commail']) ? addslashes(trim($_POST['commail'])) : '';
		$comurl = isset($_POST['comurl']) ? addslashes(trim($_POST['comurl'])) : '';
		$gid = isset($_POST['gid']) ? intval($_POST['gid']) : (isset($_GET['gid']) ? intval($_GET['gid']) : -1);
		$pid = isset($_POST['pid']) ? intval($_POST['pid']) : 0;
		$http_referer = empty($_SERVER['HTTP_REFERER']) ? BLOG_URL : $_SERVER['HTTP_REFERER'];

		$blogname = Option::get('blogname');
		$Log_Model = new Log_Model();
		$logData = $Log_Model->getOneLogForHome($gid);
		$log_title = $logData['log_title'];
		$subject = "文章《{$log_title}》收到了新的评论";
  if(!empty($commail)){$commail = $commail;}else{$commail = '未填写';};
  if(!empty($comurl)){$comurl = $comurl;}else{$comurl = '未填写';};
		if(strpos(KL_MAIL_TOEMAIL, '@139.com') === false)
		{
			$content = '<style type="text/css">.qmbox{margin:0;padding:0;font-family:微软雅黑;background-color:#fff}.qmbox a{text-decoration:none;}.qmbox .box{position:relative;width:780px;padding:0;margin:0 auto;border:1px solid #ccc;font-size:13px;color:#333;}.qmbox .header{width:100%;padding-top:50px;background:url('.BLOG_URL.'content/plugins/kl_sendmail/bian.jpg) repeat-x;}.qmbox .logo{float:right;padding-right:50px;}.qmbox .clear{clear:both;}.qmbox .content{width:585px;padding:0 50px;}
.qmbox .content p{line-height:40px;word-break:break-all;}.qmbox .content ul{padding-left:40px;}
.qmbox .xiugai{height:50px;line-height:30px;font-size:16px;}.qmbox .xiugai a{color:#0099ff;}
.qmbox .fuzhi{word-break:break-all;color:#b0b0b0;}.qmbox .table{border:1px solid #ccc;border-left:0;border-top:0;border-collapse:collapse;}
.qmbox .table td{border:1px solid #ccc;border-right:0;border-bottom:0;padding:6px;min-width:160px;}.qmbox .gray{background:#f5f5f5;}
.qmbox .no_indent{font-weight:bold;height:40px;line-height:40px;color:#737171}.qmbox .no_indent a{text-decoration:none !important;color:#737171}.qmbox .no_indent span{padding-right:20px;}.qmbox .no_after{height:40px;line-height:40px; text-align:right;font-weight:bold}
.qmbox .btnn{padding:50px 0 0 0;font-weight:bold}.qmbox .btnn a{padding-right:20px;text-decoration:none !important;color:#000;}.qmbox .need{background:#fa9d00;}
.qmbox .noneed{background:#3784e0;}.qmbox .footer{width:100%;height:10px;padding-top:20px;background:url('.BLOG_URL.'content/plugins/kl_sendmail/bian.jpg) repeat-x left bottom;}</style><div class="qmbox"><div class="box"><div class="header"></div><div class="content"><p class="no_indent" style="color:#383838">文章《'.$log_title.'》最新评论内容：</p><p style="line-height:25px;padding:10px;background:#5C96BE;border-radius:4px;color:#fff;">'.$comment.'</p><p class="no_indent"><span>评论作者：'.$comname.'</span><span>邮件地址：'.$commail.'</span><span>网址地址：'.$comurl.'</span></p><table cellspacing="0" class="table">	</table><div class="btnn"><a href="'.Url::log($gid).'" target="_blank">查看该文章</a><a href="'.BLOG_URL.'" target="_blank">查看'.$blogname.'</a><a href="'.BLOG_URL.'rss.php" target="_blank">订阅本站</a></div></div><div class="footer clear"></div></div></div>';
		}else{
			$content = $comment;
		}
		if(KL_IS_SEND_MAIL == 'Y')
		{
			if(ROLE == 'visitor') kl_sendmail_do(KL_MAIL_SMTP, KL_MAIL_PORT, KL_MAIL_SENDEMAIL, KL_MAIL_PASSWORD, KL_MAIL_TOEMAIL, $subject, $content, $blogname);
		}
		if(KL_IS_REPLY_MAIL == 'Y')
		{
			if($pid > 0)
			{
				$DB = Option::EMLOG_VERSION >= '5.3.0' ? Database::getInstance() : MySql::getInstance();
				$Comment_Model = new Comment_Model();
				$pinfo = $Comment_Model->getOneComment($pid);
				if(!empty($pinfo['mail']))
				{
					$subject = "您在【{$blogname}】发表的评论收到了回复";
					$content = '<style type="text/css">.qmbox{margin:0;padding:0;font-family:微软雅黑;background-color:#fff}.qmbox a{text-decoration:none;}.qmbox .box{position:relative;width:780px;padding:0;margin:0 auto;border:1px solid #ccc;font-size:13px;color:#333;}.qmbox .header{width:100%;padding-top:50px;background:url('.BLOG_URL.'content/plugins/kl_sendmail/bian.jpg) repeat-x;}.qmbox .logo{float:right;padding-right:50px;}.qmbox .clear{clear:both;}.qmbox .content{width:585px;padding:0 50px;}
.qmbox .content p{line-height:40px;word-break:break-all;}.qmbox .content ul{padding-left:40px;}
.qmbox .xiugai{height:50px;line-height:30px;font-size:16px;}.qmbox .xiugai a{color:#0099ff;}
.qmbox .fuzhi{word-break:break-all;color:#b0b0b0;}.qmbox .table{border:1px solid #ccc;border-left:0;border-top:0;border-collapse:collapse;}
.qmbox .table td{border:1px solid #ccc;border-right:0;border-bottom:0;padding:6px;min-width:160px;}.qmbox .gray{background:#f5f5f5;}
.qmbox .no_indent{font-weight:bold;height:40px;line-height:40px;}.qmbox .no_after{height:40px;line-height:40px; text-align:right;font-weight:bold}
.qmbox .btnn{padding:50px 0 0 0;font-weight:bold}.qmbox .btnn a{padding-right:20px;text-decoration:none !important;color:#000;}.qmbox .need{background:#fa9d00;}
.qmbox .noneed{background:#3784e0;}.qmbox .footer{width:100%;height:10px;padding-top:20px;background:url('.BLOG_URL.'content/plugins/kl_sendmail/bian.jpg) repeat-x left bottom;}</style><div class="qmbox"><div class="box"><div class="header"></div><div class="content"><p class="no_indent">'.$pinfo['poster'].'您好，您之前在《'.$log_title.'》发表的的评论：</p><p style="line-height:25px;padding:10px;background:#EDECF2;border-radius:4px;">'.$pinfo['comment'].'</p><p class="no_indent">'.$comname.'给您的回复：</p><p style="line-height:25px;padding:10px;background:#5C96BE;border-radius:4px;color:#fff;">'.$comment.'</p><table cellspacing="0" class="table">	</table><div class="btnn"><a href="'.Url::log($gid).'#'.$pid.'" target="_blank">查看该文章</a><a href="'.BLOG_URL.'" target="_blank">查看'.$blogname.'</a><a href="'.BLOG_URL.'rss.php" target="_blank">订阅本站</a></div></div><div class="footer clear"></div></div></div>';
					kl_sendmail_do(KL_MAIL_SMTP, KL_MAIL_PORT, KL_MAIL_SENDEMAIL, KL_MAIL_PASSWORD, $pinfo['mail'], $subject, $content, $blogname);
				}
			}
		}
	}else{
		return;
	}
}
addAction('comment_saved', 'kl_sendmail_get_comment_mail');

function kl_sendmail_get_twitter_mail($r, $name, $date, $tid)
{
	include(EMLOG_ROOT.'/content/plugins/kl_sendmail/kl_sendmail_config.php');
	if(KL_IS_TWITTER_MAIL == 'Y')
	{
		$DB = Option::EMLOG_VERSION >= '5.3.0' ? Database::getInstance() : MySql::getInstance();
		$blogname = Option::get('blogname');
		$sql = "select a.content, b.username from ".DB_PREFIX."twitter a left join ".DB_PREFIX."user b on b.uid=a.author where a.id={$tid}";
		$res = $DB->query($sql);
		$row = $DB->fetch_array($res);
		$author = $row['username'];
		$twitter = $row['content'];
		$subject = "{$author}发布的碎语收到了新的回复";
		if(strpos(KL_MAIL_TOEMAIL, '@139.com') === false)
		{
			$content = "{$author}发布的碎语：{$twitter}<br /><br />{$name}对碎语的回复：{$r}<br /><br /><strong>=> 现在就前往<a href=\"{$_SERVER['HTTP_REFERER']}\" target=\"_blank\">碎语页面</a>进行查看</strong><br />";
		}else{
			$content = $r;
		}
		if(ROLE == 'visitor') kl_sendmail_do(KL_MAIL_SMTP, KL_MAIL_PORT, KL_MAIL_SENDEMAIL, KL_MAIL_PASSWORD, KL_MAIL_TOEMAIL, $subject, $content, $blogname);
	}
}
addAction('reply_twitter', 'kl_sendmail_get_twitter_mail');

function kl_sendmail_put_reply_mail($commentId, $reply)
{
	global $userData;
	include(EMLOG_ROOT.'/content/plugins/kl_sendmail/kl_sendmail_config.php');
	if(KL_IS_REPLY_MAIL == 'Y')
	{
		$DB = Option::EMLOG_VERSION >= '5.3.0' ? Database::getInstance() : MySql::getInstance();
		$blogname = Option::get('blogname');
		$Comment_Model = new Comment_Model();
		$commentArray = $Comment_Model->getOneComment($commentId);
		extract($commentArray);
		$subject="您在【{$blogname}】发表的评论收到了回复";
		if(strpos($mail, '@139.com') === false)
		{
			$emBlog = new Log_Model();
			$logData = $emBlog->getOneLogForHome($gid);
			$log_title = $logData['log_title'];
			$content =  '<style type="text/css">.qmbox{margin:0;padding:0;font-family:微软雅黑;background-color:#fff}.qmbox a{text-decoration:none;}.qmbox .box{position:relative;width:780px;padding:0;margin:0 auto;border:1px solid #ccc;font-size:13px;color:#333;}.qmbox .header{width:100%;padding-top:50px;background:url('.BLOG_URL.'content/plugins/kl_sendmail/bian.jpg) repeat-x;}.qmbox .logo{float:right;padding-right:50px;}.qmbox .clear{clear:both;}.qmbox .content{width:585px;padding:0 50px;}
.qmbox .content p{line-height:40px;word-break:break-all;}.qmbox .content ul{padding-left:40px;}
.qmbox .xiugai{height:50px;line-height:30px;font-size:16px;}.qmbox .xiugai a{color:#0099ff;}
.qmbox .fuzhi{word-break:break-all;color:#b0b0b0;}.qmbox .table{border:1px solid #ccc;border-left:0;border-top:0;border-collapse:collapse;}
.qmbox .table td{border:1px solid #ccc;border-right:0;border-bottom:0;padding:6px;min-width:160px;}.qmbox .gray{background:#f5f5f5;}
.qmbox .no_indent{font-weight:bold;height:40px;line-height:40px;}.qmbox .no_after{height:40px;line-height:40px; text-align:right;font-weight:bold}
.qmbox .btnn{padding:50px 0 0 0;font-weight:bold}.qmbox .btnn a{padding-right:20px;text-decoration:none !important;color:#000;}.qmbox .need{background:#fa9d00;}
.qmbox .noneed{background:#3784e0;}.qmbox .footer{width:100%;height:10px;padding-top:20px;background:url('.BLOG_URL.'content/plugins/kl_sendmail/bian.jpg) repeat-x left bottom;}</style><div class="qmbox"><div class="box"><div class="header"></div><div class="content"><p class="no_indent">'.$poster.'您好，您之前在《'.$log_title.'》发表的的评论：</p><p style="line-height:25px;padding:10px;background:#EDECF2;border-radius:4px;">'.$comment.'</p><p class="no_indent">'.$userData['username'].'给您的回复：</p><p style="line-height:25px;padding:10px;background:#5C96BE;border-radius:4px;color:#fff;">'.$reply.'</p><table cellspacing="0" class="table">	</table><div class="btnn"><a href="'.Url::log($gid).'#'.$cid.'" target="_blank">查看该文章</a><a href="'.BLOG_URL.'" target="_blank">查看'.$blogname.'</a><a href="'.BLOG_URL.'rss.php" target="_blank">订阅本站</a></div></div><div class="footer clear"></div></div></div>';
		}else{
			$content = $reply;
		}
		if($mail != '')	kl_sendmail_do(KL_MAIL_SMTP, KL_MAIL_PORT, KL_MAIL_SENDEMAIL, KL_MAIL_PASSWORD, $mail, $subject, $content, $blogname);
	}else{
		return;
	}
}
addAction('comment_reply', 'kl_sendmail_put_reply_mail');

function kl_sendmail_menu()
{
	echo '<div class="sidebarsubmenu" id="kl_sendmail"><a href="./plugin.php?plugin=kl_sendmail">邮件设置</a></div>';
}
addAction('adm_sidebar_ext', 'kl_sendmail_menu');
?>