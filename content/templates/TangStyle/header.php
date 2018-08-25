<?php
/*
Template Name:TangStyle
Description:响应式Web设计，自适应电脑、平板电脑、移动设备。
Version:2.0
Author:留日记
Author Url:http://www.liudiary.com
ForEmlog:5.1.2
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="generator" content="emlog" />
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="<?php echo TEMPLATE_URL; ?>style.css" rel="stylesheet" type="text/css" />
<link href="<?php echo TEMPLATE_URL; ?>prism.css" rel="stylesheet" type="text/css" />
<script src="<?php echo TEMPLATE_URL; ?>jquery.min.js"></script>
<script src="<?php echo TEMPLATE_URL; ?>theme.js"></script>
<script src="<?php echo TEMPLATE_URL; ?>prism.js"></script>

<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js"></script>
<?php doAction('index_head'); ?>
</head>

<body>
<div id="wrap">
	
<div id="header">
    <div class="logo"><a href="<?php echo BLOG_URL; ?>"><?php echo $blogname; ?></a><p><?php echo $bloginfo; ?></p></div>
    <div id="navigation">
	
	<?php blog_navi();?>
	
    <ul class="my">
        <li><a href="#"><i class="iconfont">&#260;</i>关注我</a>
            <ul>
                <li><a href="<?php echo BLOG_URL; ?>rss.php" rel="external nofollow" target="_blank"><i class="iconfont">&#483;</i>RSS订阅</a>
                    <ul>
                    <li><a href="<?php echo BLOG_URL; ?>rss.php" rel="external nofollow" target="_blank">RSS Feed</a></li>
                    <li><a href="http://mail.qq.com/cgi-bin/feed?u=<?php echo BLOG_URL; ?>rss.php" rel="external nofollow" target="_blank">订阅到 QQ邮箱</a></li>
                    <li><a href="http://reader.youdao.com/b.do?keyfrom=bookmarklet&url=<?php echo BLOG_URL; ?>rss.php" rel="external nofollow" target="_blank">订阅到 有道阅读</a></li>
                    <li><a href="http://xianguo.com/subscribe?url=<?php echo BLOG_URL; ?>rss.php" rel="external nofollow" target="_blank">订阅到 鲜果</a></li>
                    <li><a href="http://www.zhuaxia.com/add_channel.php?sourceid=102&url=<?php echo BLOG_URL; ?>rss.php" rel="external nofollow" target="_blank">订阅到 抓虾</a></li>
                    <li><a href="http://www.google.com/ig/add?feedurl=<?php echo BLOG_URL; ?>rss.php" rel="external nofollow" target="_blank">订阅到 iGoogle</a></li>
                    </ul>
                </li>
                <li><a href="http://weibo.com/mywxin" rel="external nofollow" target="_blank"><i class="iconfont">&#468;</i>新浪微博</a></li>
                <li><a href="http://t.qq.com/wangxin7440" rel="external nofollow" target="_blank"><i class="iconfont">&#469;</i>腾讯微博</a></li>
            </ul>
        </li>
    </ul>
    </div>
</div>
<div id="content">