<?php
/*
Template Name:拼图响应式前端框架模板
Description:拼图模板，简洁优雅
Version:1.0
Author:pintuer
Author Url:http://www.pintuer.com
Sidebar Amount:1
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
	<!DOCTYPE html>
	<html lang="zh-CN">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="renderer" content="webkit">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="keywords" content="<?php echo $site_key; ?>" />
		<meta name="description" content="<?php echo $site_description; ?>" />
		<meta name="generator" content="pintuer" />
		<title><?php echo $site_title; ?></title>
		
		<link rel="stylesheet" href="http://www.pintuer.com/css/pintuer.css">
		<link href="http://www.pintuer.com/css/style.css" rel="stylesheet">
		<link href="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.css" rel="stylesheet" type="text/css" />			
		<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
		<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
		<link rel="alternate" type="application/rss+xml" title="RSS" href="<?php echo BLOG_URL; ?>rss.php" />

		<script src="http://www.pintuer.com/js/jquery.js"></script>
		<script src="http://www.pintuer.com/js/pintuer.js"></script>
		<script src="http://www.pintuer.com/plugins/respond.js"></script>
		<script src="http://www.pintuer.com/plugins/layer/layer.js"></script>
		<script src="<?php echo BLOG_URL; ?>admin/editor/plugins/code/prettify.js" type="text/javascript"></script>
		<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
		<!--[if IE 6]>
		<script src="<?php echo TEMPLATE_URL; ?>iefix.js" type="text/javascript"></script>
		<![endif]-->
		<link type="image/x-icon" href="http://www.pintuer.com/favicon.ico" rel="shortcut icon" />
		<link href="http://www.pintuer.com/favicon.ico" rel="bookmark icon" />
		<style type="text/css">
		#calendar .calendartop{width:50%;}
		#calendar .calendar{width:100%;}
		#pagenavi {list-style: none;margin: 0;padding: 0;display: inline-block;vertical-align: bottom;}
		#pagenavi span {display: inline-block;border: solid 1px #0a8;border-radius: 4px;padding: 8px 12px;line-height: 18px;transition: all 1s cubic-bezier(0.175, 0.885, 0.32, 1) 0s;background-color: #0a8;}
		#pagenavi a {display: inline-block;border: solid 1px #0a8;border-radius: 4px;color: #333;padding: 8px 12px;line-height: 18px;transition: all 1s cubic-bezier(0.175, 0.885, 0.32, 1) 0s;}
		.popo .popo-left {width: 100%;}
		.popo .popo-body.left {width: 100%;max-width: 100%;}
		.input-group {border-collapse: separate;display: block;position: relative;}
		.cuttitle{ display: block; width: 220px; height:24px; overflow:  hidden; white-space: nowrap; -o-text-overflow: ellipsis; text-overflow:  ellipsis; }
		.hr {height: 2px;border-bottom: 1px dashed #dedede;padding-top: 5px;padding-bottom: 5px;}
		</style>
		<?php doAction('index_head'); ?>
	</head>
	<body>
		<div class="layout doc-header fixed">
			<div class="layout doc-toper">
				<div class="container">
					<div class="line">
						<div class="x8">
							欢迎使用拼图响应式前端框架</div>
						<div class="x4 text-right">
							<div class="button-group-little nav-navicon ">
								<div class="button-group text-left">
									<button type="button" class="button bg-blue dropdown-hover">
										加QQ群<span class="downward"></span>
									</button>
									<ul class="drop-menu">
										<li><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=776a44708f3b4f749eceb3976397e240340021b7ad671d744b24b274636bb6d0" title="点击链接加入群【拼图:响应式前端框架1】">群1:201916085(已满员)</a></li>
										<li><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=4c2cc45c6ce3b6e94302743ad669fb652515fcc99489fa14ecee01466c0dbc5b" title="点击链接加入群【拼图:响应式前端框架2】">群2:254208418(已满员)</a></li>
										<li><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=be8d8ae1cb2356955de4cefe3fcfa0af721fd857f045f33214891d1eb00b22b4" title="点击链接加入群【拼图:响应式前端框架3】">群3:342193679(已满员)</a></li>
										<li><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=cff8198a7c16afd27a3155dbd4beb191b04df05d911155e02533fabf5ca8707e" title="点击链接加入群【拼图:响应式前端框架4】">群4:371502017(已满员)</a></li>
										<li><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=277658fb5842e5a79a041081bb77ce89296034f9e808b8e0f7f4d7fafdf52d30" title="点击链接加入群【拼图:响应式前端框架5】">群5:459319412(已满员)</a></li>
										<li><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=2c4b93e9eeaf3bdd34dca9c1ecafa6dca4c4a169fbba5c328d7f123f28814855" title="点击链接加入群【拼图:响应式前端框架6】">群6:451822187(已满员)</a></li>
										<li><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=1a0a505fb9f65dafcfe1f250722bc9ae50d86a23c5ff25c79d0849ff6619432c" title="点击链接加入群【拼图:响应式前端框架7】">群7:471290734(已满员)</a></li>
											<li><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=86c50dfe62280970f1941bbea101f1bdbfd74d9ac53983b14463a8e0933afa0a" title="点击链接加入群【拼图:响应式前端框架8】">群8:462886831(已满员)</a></li>
										<li><a target="_blank" href="http://shang.qq.com/wpa/qunwpa?idkey=dc2997233a6453b02b8f3643a266e75a0ea77c4bd0ef06a242080cbdfa1b5e8f" title="点击链接加入群【拼图:响应式前端框架9】">群9:450036540(新群)</a></li>
								
									</ul>
								</div>
								<div class="button-group text-left">
									<button type="button" class="button bg-yellow dropdown-hover">
										拼图工具<span class="downward"></span>
									</button>
									<ul class="drop-menu">
										<li><a href="http://www.pintuer.com/tools/test.html">响应式测试工具</a> </li>
										<li><a href="http://www.pintuer.com/tools/form.html">表单设计生成</a> </li>
										<li><a href="http://www.pintuer.com/tools/animation.html">CSS3动画生成</a> </li>
										<li><a href="http://www.pintuer.com/tools/viewcode.html">代码预览工具</a> </li>
									</ul>
								</div>
								<div class="button-group text-left">
									<button type="button" class="button bg-green dropdown-hover">
										合作洽谈<span class="downward"></span>
									</button>
									<ul class="drop-menu">
										<li><a href="http://wpa.qq.com/msgrd?v=3&uin=106967808&site=Pintuer&menu=yes">在线交流</a>
										</li>
										<li><a href="http://wpa.qq.com/msgrd?v=3&uin=1979788761&site=Pintuer&menu=yes">功能反馈</a>
										</li>
										<li><a href="http://www.pintuer.com/talk.html">合作须知</a> </li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container doc-naver">
				<div class="line">
					<div class="xs3 xm3 xb3 doc-logo">
						<button class="button icon-navicon margin-top float-right" data-target="#doc-header-pintuer">
						</button>
						<a href="/">
							<img src="http://www.pintuer.com/images/logo.png" width="180" height="40" alt="拼图" class="ring-hover" />
						</a>
					</div>
					<div class="xl12 xs9 xm9 xb9 doc-nav">
						<ul class="nav nav-inline nav-navicon nav-menu padding-small-top nav-menu" id="doc-header-pintuer">
							<li><a href="http://www.pintuer.com/">首页</a> </li>
							<li><a href="http://www.pintuer.com/start.html">起步</a> </li>
							<li><a href="http://www.pintuer.com/css.html">CSS</a> </li>
							<li><a href="http://www.pintuer.com/widgets.html">元件</a> </li>
							<li><a href="http://www.pintuer.com/javascript.html">JS组件</a> </li>
							<li>
								<a href="http://www.pintuer.com/react.html">模块<span class="arrow"></span></a>
								<ul class="drop-menu">
									<li><a href="http://www.pintuer.com/react.html">常用</a></li>
									<li><a href="http://www.pintuer.com/weixin/index.html">微信</a></li>
									<li><a href="javascript:alert('敬请期待...');">APP</a></li>
									<li><a href="javascript:alert('敬请期待...');">付费</a></li>
								</ul>
							</li>
							<li>
								<a href="javascript:;">发现<span class="arrow"></span></a>
								<ul class="drop-menu">
									<li><a href="http://www.pintuer.com/demo/index.html">演示</a></li>
									<li><a href="http://www.pintuer.com/case/index.html">案例</a></li>
									<li><a href="http://www.pintuer.com/jsplugins/index.html">插件</a></li>
									<li><a href="http://www.pintuer.com/tools/index.html">工具</a></li>
								</ul>
							</li>
							<li class="active"><a href="http://blog.pintuer.com/">动态<span class="arrow"></span></a>
				                <ul class="drop-menu">
				                	<li><a href="http://blog.pintuer.com/?sort=1">拼图动态</a></li>
				                    <li><a href="http://blog.pintuer.com/?sort=2">功能反馈</a></li>
				                    <li><a href="http://blog.pintuer.com/?sort=3">案例收录</a></li>
				                    <li><a href="http://blog.pintuer.com/?sort=4">行业新闻</a></li>
									<li><a href="http://blog.pintuer.com/?sort=5">拼图特效</a></li>
									<li><a href="http://blog.pintuer.com/t/">开发笔记</a></li>
					            </ul>
				            </li>
						</ul>
					</div>
				</div>
			</div>
			<div class="bg-main doc-intro">
				<div class="container">
					<h1 class="fadein-top">
                    拼图博客
                </h1>
					<p class="fadein-bottom">拼图更新进度、开发动态、Bug反馈，问题探讨。</p>
				</div>
			</div>
		</div>