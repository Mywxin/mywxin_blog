<?php if(!defined('EMLOG_ROOT')) {exit('error!');} ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Language" content="zh-CN" />
<meta name="author" content="emlog" />
<meta name="robots" content="noindex, nofollow">
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<title>管理中心 - <?php echo Option::get('blogname'); ?></title>
<link href="./views/style/<?php echo Option::get('admin_style');?>/style.css?v=<?php echo Option::EMLOG_VERSION; ?>" type=text/css rel=stylesheet>
<link href="./views/css/css-main.css?v=<?php echo Option::EMLOG_VERSION; ?>" type=text/css rel=stylesheet>
<script type="text/javascript" src="../include/lib/js/jquery/jquery-1.7.1.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script type="text/javascript" src="../include/lib/js/jquery/plugin-cookie.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<script type="text/javascript" src="./views/js/common.js?v=<?php echo Option::EMLOG_VERSION; ?>"></script>
<?php doAction('adm_head');?>
</head>
<body>
<div id="mainpage">
<div id="header">
    <div id="header_left"></div>
    <div id="header_logo"><a href="./" title="返回管理首页">emlog</a></div>
    <div id="header_title">
    <a href="../" target="_blank" title="在新窗口浏站点">
    <?php 
    $blog_name = Option::get('blogname');
    echo empty($blog_name) ? '查看我的站点' : subString($blog_name, 0, 24);
    ?>
    </a>
    </div>
    <div id="header_right"></div>
    <div id="header_menu">
    <a href="./blogger.php" title="<?php echo subString($user_cache[UID]['name'], 0, 12) ?>">
        <img src="<?php echo empty($user_cache[UID]['avatar']) ? './views/images/avatar.jpg' : '../' . $user_cache[UID]['avatar'] ?>" align="top" width="20" height="20" />
    </a><span>|</span>
    <?php if (ROLE == ROLE_ADMIN):?>
    <a href="configure.php"> 设置</a><span>|</span>
	<?php endif;?>
	<a href="./?action=logout">退出</a>
    </div>
</div>
<div id="side">
	<div id="sidebartop"></div>
    <div id="log_mg">
		<li class="sidebarsubmenu" id="menu_wt"><a href="write_log.php"><span class="ico16"></span>写文章</a></li>
		<li class="sidebarsubmenu" id="menu_draft">
    	<a href="admin_log.php?pid=draft">草稿<span id="dfnum">
		<?php 
		if (ROLE == ROLE_ADMIN){
			echo $sta_cache['draftnum'] == 0 ? '' : '('.$sta_cache['draftnum'].')'; 
		}else{
			echo $sta_cache[UID]['draftnum'] == 0 ? '' : '('.$sta_cache[UID]['draftnum'].')';
		}
		?>
		</span></a></li>
		<li class="sidebarsubmenu" id="menu_log"><a href="admin_log.php">文章</a></li>
        <?php
        $checknum = $sta_cache['checknum'];
		if (ROLE == ROLE_ADMIN && $checknum > 0):
		$n = $checknum > 999 ? '...' : $checknum;
		?>
		<div class="notice_number"><a href="./admin_log.php?checked=n" title="<?php echo $checknum; ?>篇文章待审"><?php echo $n; ?></a></div>
		<?php endif; ?>
		<?php if (ROLE == ROLE_ADMIN):?>
        <li class="sidebarsubmenu" id="menu_tag"><a href="tag.php">标签</a></li>
        <li class="sidebarsubmenu" id="menu_sort"><a href="sort.php">分类</a></li>
    	<?php endif;?>
        <li class="sidebarsubmenu" id="menu_cm"><a href="comment.php">评论</a> </li>
   		<?php
		$hidecmnum = ROLE == ROLE_ADMIN ? $sta_cache['hidecomnum'] : $sta_cache[UID]['hidecommentnum'];
		if ($hidecmnum > 0):
		$n = $hidecmnum > 999 ? '...' : $hidecmnum;
		?>
		<div class="notice_number"><a href="./comment.php?hide=y" title="<?php echo $hidecmnum; ?>条评论待审"><?php echo $n; ?></a></div>
		<?php endif; ?>
		<?php if (ROLE == ROLE_ADMIN):?>
        <li class="sidebarsubmenu" id="menu_tw"><a href="twitter.php">微语</a></li>
    	<li class="sidebarsubmenu" id="menu_widget"><a href="widgets.php" >侧边栏</a></li>
   	 	<li class="sidebarsubmenu" id="menu_navbar"><a href="navbar.php" >导航</a></li>
    	<li class="sidebarsubmenu" id="menu_page"><a href="page.php" >页面</a></li>
    	<li class="sidebarsubmenu" id="menu_link"><a href="link.php">链接</a></li>
    	<li class="sidebarsubmenu" id="menu_user"><a href="user.php" >用户</a></li>
    	<li class="sidebarsubmenu" id="menu_data"><a href="data.php">数据</a></li>
    	<li class="sidebarsubmenu" id="menu_plug"><a href="plugin.php">插件</a></li>
        <li class="sidebarsubmenu" id="menu_tpl"><a href="template.php">模板</a></li>
        <li class="sidebarsubmenu" id="menu_store"><a href="store.php">应用</a></li>
        <?php if (!empty($emHooks['adm_sidebar_ext'])): ?>
        <li class="sidebarsubmenu" id="menu_ext"><a class="menu_ext_minus">扩展功能</a></li>
        <?php endif;?>
		<?php endif;?>
    </div>
    <?php if (ROLE == ROLE_ADMIN):?>
    <div id="extend_mg">
		<?php doAction('adm_sidebar_ext'); ?>
    </div>
    <?php endif;?>
	<div id="sidebarBottom"></div>
</div>
<div id="container">
<?php doAction('adm_main_top'); ?>
<script>
<!--边栏折叠-->
$("#extend_mg").css('display', $.cookie('em_extend_mg') ? $.cookie('em_extend_mg') : '');
if ($.cookie('em_extend_ext')) {
	$("#menu_ext a").removeClass().addClass($.cookie('em_extend_ext'));
}
$("#menu_ext").toggle(
	  function () {
		displayToggle('extend_mg', 1)
		exClass = $(this).find("a").attr("class") == "menu_ext_plus" ? "menu_ext_minus" : "menu_ext_plus";
		$(this).find("a").removeClass().addClass(exClass);
		$.cookie('em_extend_ext', exClass, {expires:365});
	  },
	  function () {
		displayToggle('extend_mg', 1)
		exClass = $(this).find("a").attr("class") == "menu_ext_plus" ? "menu_ext_minus" : "menu_ext_plus";
		$(this).find("a").removeClass().addClass(exClass);
		$.cookie('em_extend_ext', exClass, {expires:365});
	  }
);
</script>