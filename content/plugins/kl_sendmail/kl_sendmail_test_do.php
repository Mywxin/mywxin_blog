<?php
/**
 * kl_sendmail_test_do.php
 * design by KLLER
 */
require_once('../../../init.php');
!(ISLOGIN === true && $value['author'] == UID || ROLE == 'admin') && exit('access deined!');
include_once('kl_sendmail_config.php');
require_once(EMLOG_ROOT.'/content/plugins/kl_sendmail/class/class.smtp.php');
require_once(EMLOG_ROOT.'/content/plugins/kl_sendmail/class/class.phpmailer.php');
$blogname = Option::get('blogname');
$subject = $blogname.'测试邮件！';
$content = '<style type="text/css">.qmbox{margin:0;padding:0;font-family:微软雅黑;background-color:#fff}.qmbox a{text-decoration:none;}.qmbox .box{position:relative;width:780px;padding:0;margin:0 auto;border:1px solid #ccc;font-size:13px;color:#333;}.qmbox .header{width:100%;padding-top:50px;background:url('.BLOG_URL.'content/plugins/kl_sendmail/bian.jpg) repeat-x;}.qmbox .logo{float:right;padding-right:50px;}.qmbox .clear{clear:both;}.qmbox .content{width:585px;padding:0 50px;}
.qmbox .content p{line-height:40px;word-break:break-all;}.qmbox .content ul{padding-left:40px;}
.qmbox .xiugai{height:50px;line-height:30px;font-size:16px;}.qmbox .xiugai a{color:#0099ff;}
.qmbox .fuzhi{word-break:break-all;color:#b0b0b0;}.qmbox .table{border:1px solid #ccc;border-left:0;border-top:0;border-collapse:collapse;}
.qmbox .table td{border:1px solid #ccc;border-right:0;border-bottom:0;padding:6px;min-width:160px;}.qmbox .gray{background:#f5f5f5;}
.qmbox .no_indent{font-weight:bold;height:40px;line-height:40px;}.qmbox .no_after{height:40px;line-height:40px; text-align:right;font-weight:bold}
.qmbox .btnn{padding:50px 0 0 0;font-weight:bold}.qmbox .btnn a{padding-right:20px;text-decoration:none !important;color:#000;}.qmbox .need{background:#fa9d00;}
.qmbox .noneed{background:#3784e0;}.qmbox .footer{width:100%;height:10px;padding-top:20px;background:url('.BLOG_URL.'content/plugins/kl_sendmail/bian.jpg) repeat-x left bottom;}</style><div class="qmbox"><div class="box"><div class="header"></div><div class="content"><p class="no_indent">'.$blogname.'您好：</p><p style="line-height:25px;padding:10px;background:#5C96BE;border-radius:4px;color:#fff;">这是一封测试邮件！</p><table cellspacing="0" class="table">	</table><div class="btnn"><a href="'.BLOG_URL.'" target="_blank">查看'.$blogname.'</a><a href="'.BLOG_URL.'rss.php" target="_blank">订阅本站</a></div></div><div class="footer clear"></div></div></div>';
if(kl_sendmail_do(KL_MAIL_SMTP, KL_MAIL_PORT, KL_MAIL_SENDEMAIL, KL_MAIL_PASSWORD, KL_MAIL_TOEMAIL, $subject, $content, $blogname))
{
	echo '<font color="green">发送成功！请到相应邮箱查收！：）</font>';
}