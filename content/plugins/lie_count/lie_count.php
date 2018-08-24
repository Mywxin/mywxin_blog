<?php

/*
Plugin Name: EMLOG统计
Version: 1.2
Description: 对emlog各种内容进行统计.
Author: 小劣
ForEmlog:5.3.0
Plugin URL: http://mxsky.cn/?post=100
Author Email: 878406751@qq.com
Author URL: http://mxsky.cn
*/
!defined('EMLOG_ROOT') && exit('access deined!');
include (EMLOG_ROOT . '/content/plugins/lie_count/lie_count_config.php');

function lie_count() //写入统计导航
{
    echo '<div class="sidebar" id="lie_count"><a href="./plugin.php?plugin=lie_count">EMLOG统计</a></div>';
}
addAction('adm_sidebar_ext', 'lie_count');

function lie_count_headcss(){
echo LIE_COUNT_CSS;
}
addAction('index_head','lie_count_headcss');


 
 $db = MySql::getInstance();
 $sta_cache = array();
    //统计文章总数
if(LOG_TOTAL=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog WHERE type = 'blog'");
$log_total = $data['total'];
}
//置顶文章数
if(LOG_TOP=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog WHERE  top = 'y' or sortop = 'y' AND type = 'blog'");
$log_top = $data['total'];
}

//隐藏文章数
if(LOG_HIDE=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog WHERE hide = 'y' AND type = 'blog'");
$log_hide = $data['total'];
}
//未审核文章数
if(LOG_CHECK=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog WHERE checked = 'n' AND type = 'blog'");
$log_check = $data['total'];
}
//加密文章数
if(LOG_PASS=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog WHERE  password !='' AND type = 'blog'");
$log_pass =  $data['total'];
}
//统计页面总数
 if(LOG_PAGE=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "blog WHERE type = 'page'");
 $log_page = $data['total'];
}

//统计评论总数
if(LOG_COM=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "comment");
$log_com = $data['total'];
}
//统计友链总数
if(LOG_LINK=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "link");
$log_link = $data['total'];
}


//统计微语评论总数
if(LOG_REPLY=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "reply");
$log_reply = $data['total'];
}
//统计分类总数
if(LOG_SORT=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sort");
$log_sort = $data['total'];
}
//统计子分类数
 if(LOG_SORT_MOD=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sort WHERE pid != 0");
$log_sort_mod = $data['total'];
}
//统计父分类数
 if(LOG_SORT_BOD=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "sort WHERE pid = 0");
$log_sort_bod = $data['total'];
}
//统计标签总数
 if(LOG_TAG=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "tag");
$log_tag = $data['total'];
}
//统计微语总数
 if(LOG_TW=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "twitter");
$log_tw = $data['total'];
}

//统计用户总数
 if(COUNT_USER=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "user");
$count_user = $data['total'];

}
//统计管理员总数
 if(LOG_USER_ADMIN=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "user WHERE role = 'admin'");
$log_user_admin = $data['total'];
}

//统计作者总数
 if(LOG_USER_WRITER=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "user WHERE role = 'writer'");
$log_user_writer = $data['total'];
}
//统计附件总数
 if(LOG_ATT=='y'){
 $data = $db->once_fetch_array("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "attachment");
$log_att = $data['total'];
}
//获取第一篇文章时间为建站时间
if(BLOG_BUILD=='y'){
     $sql = "SELECT date FROM " . DB_PREFIX . "blog WHERE type='blog' ORDER BY date ASC LIMIT 0,1";
     $res = $db->query($sql);
		$row = $db->fetch_array($res);
		$build_date_time = $row['date'];
		$build_date = date('Y-n-j H:i',$build_date_time);
}
//最后发表文章时间
if(LOG_PTIME=='y'){
$sql = "SELECT * FROM " . DB_PREFIX . "blog WHERE type='blog' ORDER BY date DESC LIMIT 0,1";
		$res = $db->query($sql);
		$row = $db->fetch_array($res);
		$date = date('Y-n-j H:i',$row['date']);
	}
//网站最后运行时间
if(BLOG_RUN=='y'){
$blog_run_time = floor((time() - $build_date_time)/86400);
}

$sta_cache =array('log_total'=>$log_total,
              'log_top'=>$log_top,
			  'log_hide'=>$log_hide,
			  'log_check'=>$log_check,
			  'log_att'=>$log_att,
			  'log_com'=>$log_com,
			  'log_link'=>$log_link,
			  'log_page'=>$log_page,
			  'log_pass'=>$log_pass,
			  'log_reply'=>$log_reply,
			  'log_sort'=>$log_sort,
			  'log_sort_mod'=>$log_sort_mod,
			  'log_tag'=>$log_tag,
			  'log_tw'=>$log_tw,
			  'count_user'=>$count_user,
			  'log_user_admin'=>$log_user_admin,
			  'log_user_writer'=>$log_user_writer,
			  'log_ptime'=>$date,
			  'log_sort_bod'=>$log_sort_bod,
			  'build_date'=>$build_date,
			  'blog_run_time'=>$blog_run_time,
			  );
			global $CACHE;
    $cacheData = serialize($sta_cache);
		$CACHE->cacheWrite($cacheData, 'count');
	
function lie_count_do()
{
global $CACHE;
$lie_count_cache = $CACHE->readCache('count');		
echo '<div class="lie_count"><div class = "lie_count_title"><span><b>站点统计</b></span><div><ul class ="lie_count_ul">';
if(BLOG_BUILD=='y'){
echo '<li class="lie_count_li">建站日期: '.$lie_count_cache['build_date'].'</li>';
}
if(BLOG_RUN=='y'){
echo '<li class="lie_count_li">运行时间:  '.$lie_count_cache['blog_run_time'].' 天</li>';
}
if(LOG_TOTAL=='y'){			  
echo '<li class="lie_count_li">日志总数: '.$lie_count_cache['log_total'].' 篇</li>';
}
if(LOG_TOP=='y'){			  
echo '<li class="lie_count_li">置顶日志: '.$lie_count_cache['log_top'].' 篇</li>';
}
if(LOG_HIDE=='y'){			  
echo '<li class="lie_count_li">草稿数目: '.$lie_count_cache['log_hide'].' 篇</li>';
}
if(LOG_CHECK=='y'){			  
echo '<li class="lie_count_li">待审文章: '.$lie_count_cache['log_check'].' 篇</li>';
}
if(LOG_PAGE=='y'){			  
echo '<li class="lie_count_li">页面数量: '.$lie_count_cache['log_page'].' 个</li>';
}
if(LOG_COM=='y'){			  
echo '<li class="lie_count_li">评论数量: '.$lie_count_cache['log_com'].' 条</li>';
}
if(LOG_TW=='y'){			  
echo '<li class="lie_count_li">微语数量: '.$lie_count_cache['log_tw'].' 条</li>';
}
if(LOG_REPLY=='y'){			  
echo '<li class="lie_count_li">微语评论: '.$lie_count_cache['log_reply'].' 条</li>';
}
if(LOG_LINK=='y'){			  
echo '<li class="lie_count_li">友链数量: '.$lie_count_cache['log_link'].' 个</li>';
}
if(LOG_PASS=='y'){			  
echo '<li class="lie_count_li">加密文章: '.$lie_count_cache['log_pass'].' 篇</li>';
}
if(LOG_SORT=='y'){			  
echo '<li class="lie_count_li">分类总量: '.$lie_count_cache['log_sort'].' 个</li>';
}
if(LOG_SORT_BOD=='y'){			  
echo '<li class="lie_count_li">父分类数: '.$lie_count_cache['log_sort_bod'].' 个</li>';
}
if(LOG_SORT_MOD=='y'){			  
echo '<li class="lie_count_li">子分类数: '.$lie_count_cache['log_sort_mod'].' 个</li>';
}
if(COUNT_USER=='y'){			  
echo '<li class="lie_count_li">用户数量: '.$lie_count_cache['count_user'].' 人</li>';
}
if(LOG_USER_ADMIN=='y'){			  
echo '<li class="lie_count_li">管理员数: '.$lie_count_cache['log_user_admin'].' 人</li>';
}
if(LOG_USER_WRITER=='y'){			  
echo '<li class="lie_count_li">驻站作者: '.$lie_count_cache['log_user_writer'].' 位</li>';
}
if(LOG_TAG=='y'){			  
echo '<li class="lie_count_li">标签数量: '.$lie_count_cache['log_tag'].' 个</li>';
}
if(LOG_ATT=='y'){			  
echo '<li class="lie_count_li">附件总量: '.$lie_count_cache['log_att'].' 件</li>';
}
if(LOG_PTIME=='y'){			  
echo '<li class="lie_count_li">最后发表: '.$lie_count_cache['log_ptime'].'</li>';
}
echo'</ul></div>';
unset($CACHE);
}
addAction('diff_side', 'lie_count_do');
