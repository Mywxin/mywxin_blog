<?php

/**
 * lie_count_setting.php
 * Plugin Name: EMLOG统计
 * Version: 1.2
 * Description:对emlog各内容进行统计.
 * Author: 小劣
 * ForEmlog:5.3.0
 * Plugin URL: http://mxsky.cn/?post=100
 * Author Email:  878406751@qq.com
 * Author URL: http://mxsky.cn
 */
!defined('EMLOG_ROOT') && exit('access deined!');

function plugin_setting_view()
{
    include (EMLOG_ROOT . '/content/plugins/lie_count/lie_count_config.php');

?>
<script type="text/javascript">
$("#lie_count").addClass('sidebar');
function myKeyDown(e){
	if(window.event){//IE
		var k = e.keyCode;
		if ((k == 13)||(k == 9) || (k == 35) || (k == 36) || (k == 8) || (k == 46) || (k >= 48 && k <=57 )||( k >= 96 && k <= 105)||(k >= 37 && k <= 40)){
		}else{
			window.event.returnValue = false;
		}
	}else{//火狐
		var k = e.which;
		if ((k == 13)||(k == 9) || (k == 35) || (k == 36) || (k == 8) || (k == 46) || ( k>= 48 && k <= 57)||(k >= 96 && k <= 105)||(k >= 37 && k <= 40)){
		}else{
			e.preventDefault();
		}
	}
}
setTimeout(hideActived,2600);
</script>
<div class=containertitle><b>选项设置</b><?php

    if (isset($_GET['setting'])):

?><span class="actived">操作成功</span><?php

    endif;

?></div>
<div class=line></div>
<form action="./plugin.php?plugin=lie_count&action=setting" method="POST">
<table cellspacing="8" cellpadding="4" width="95%" align="center" border="0">
	<tbody>
<tr nowrap="nowrap">
		<td width="33%" align="left">设置文章统计</td><td width="67%">
	<SELECT name="log_total">	
    <OPTION value="<?php echo LOG_TOTAL;?>"><?php echo LOG_TOTAL;?></OPTION>
	<?php if(LOG_TOTAL=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">设置置顶文章统计</td><td width="67%">
	<SELECT name="log_top">	
    <OPTION value="<?php echo LOG_TOP;?>"><?php echo LOG_TOP;?></OPTION>
	<?php if(LOG_TOP=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
       <tr nowrap="nowrap">
		<td width="33%" align="left">隐藏文章统计</td><td width="67%">
	<SELECT name="log_hide">	
    <OPTION value="<?php echo LOG_HIDE;?>"><?php echo LOG_HIDE;?></OPTION>
	<?php if(LOG_HIDE=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
       <tr nowrap="nowrap">
		<td width="33%" align="left">未审核文章统计</td><td width="67%">
	<SELECT name="log_check">	
    <OPTION value="<?php echo LOG_CHECK;?>"><?php echo LOG_CHECK;?></OPTION>
	<?php if(LOG_CHECK=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
       <tr nowrap="nowrap">
		<td width="33%" align="left">加密文章统计</td><td width="67%">
	<SELECT name="log_pass">	
    <OPTION value="<?php echo LOG_PASS;?>"><?php echo LOG_PASS;?></OPTION>
	<?php if(LOG_PASS=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">设置页面统计</td><td width="67%">
	<SELECT name="log_page">	
    <OPTION value="<?php echo LOG_PAGE;?>"><?php echo LOG_PAGE;?></OPTION>
	<?php if(LOG_PAGE=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">评论总数统计</td><td width="67%">
	<SELECT name="log_com">	
    <OPTION value="<?php echo LOG_COM;?>"><?php echo LOG_COM;?></OPTION>
	<?php if(LOG_COM=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">友链总数统计</td><td width="67%">
	<SELECT name="log_link">	
    <OPTION value="<?php echo LOG_LINK;?>"><?php echo LOG_LINK;?></OPTION>
	<?php if(LOG_LINK=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">微语评论统计</td><td width="67%">
	<SELECT name="log_reply">	
    <OPTION value="<?php echo LOG_REPLY;?>"><?php echo LOG_REPLY;?></OPTION>
	<?php if(LOG_REPLY=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">微语总数统计</td><td width="67%">
	<SELECT name="log_tw">	
    <OPTION value="<?php echo LOG_TW;?>"><?php echo LOG_TW;?></OPTION>
	<?php if(LOG_TW=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">分类总数统计</td><td width="67%">
	<SELECT name="log_sort">	
    <OPTION value="<?php echo LOG_SORT;?>"><?php echo LOG_SORT;?></OPTION>
	<?php if(LOG_SORT=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">父分类统计</td><td width="67%">
	<SELECT name="log_sort_bod">	
    <OPTION value="<?php echo LOG_SORT_BOD;?>"><?php echo LOG_SORT_BOD;?></OPTION>
	<?php if(LOG_SORT_MOD=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">子分类统计</td><td width="67%">
	<SELECT name="log_sort_mod">	
    <OPTION value="<?php echo LOG_SORT_MOD;?>"><?php echo LOG_SORT_MOD;?></OPTION>
	<?php if(LOG_SORT_MOD=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">标签总数统计</td><td width="67%">
	<SELECT name="log_tag">	
    <OPTION value="<?php echo LOG_TAG;?>"><?php echo LOG_TAG;?></OPTION>
	<?php if(LOG_TAG=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">用户总数统计</td><td width="67%">
	<SELECT name="log_user">	
    <OPTION value="<?php echo COUNT_USER;?>"><?php echo COUNT_USER;?></OPTION>
	<?php if(COUNT_USER=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">管理员统计</td><td width="67%">
	<SELECT name="log_user_admin">	
    <OPTION value="<?php echo LOG_USER_ADMIN;?>"><?php echo LOG_USER_ADMIN;?></OPTION>
	<?php if(LOG_SORT_MOD=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">作者统计</td><td width="67%">
	<SELECT name="log_user_writer">	
    <OPTION value="<?php echo LOG_USER_WRITER;?>"><?php echo LOG_USER_WRITER;?></OPTION>
	<?php if(LOG_USER_WRITER=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">附件总数统计</td><td width="67%">
	<SELECT name="log_att">	
    <OPTION value="<?php echo LOG_ATT;?>"><?php echo LOG_ATT;?></OPTION>
	<?php if(LOG_ATT=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">最后发表</td><td width="67%">
	<SELECT name="log_ptime">	
    <OPTION value="<?php echo LOG_PTIME;?>"><?php echo LOG_PTIME;?></OPTION>
	<?php if(LOG_PTIME=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">建站时间</td><td width="67%">
	<SELECT name="blog_build">	
    <OPTION value="<?php echo BLOG_BUILD;?>"><?php echo BLOG_BUILD;?></OPTION>
	<?php if(BLOG_BUILD=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="33%" align="left">运行时间</td><td width="67%">
	<SELECT name="blog_run">	
    <OPTION value="<?php echo BLOG_RUN;?>"><?php echo BLOG_RUN;?></OPTION>
	<?php if(BLOG_RUN=='y'):?>
	<OPTION value="n">n</OPTION>
	<?php else:?>
	<OPTION value="y">y</OPTION>
	<?php endif;?>
	</SELECT>
</td>
		</tr>
		<tr nowrap="nowrap">
		<td width="10%" align="left">样式设计：</td>
		<td width="80%"><p><textarea name="lie_count_css" id="comment" cols="30" rows="10" tabindex="4"><?php

    echo LIE_COUNT_CSS;

?></textarea></p></td>
		</tr>
		<tr>
		<td align="center" colspan="2"><input type="submit" value="保存设置" /></td>
		</tr>
	</tbody>
</table>
</form>
<?php

}
function plugin_setting()
{
    $log_total = isset($_POST['log_total']) ? addslashes($_POST['log_total']) : 'y';
    $log_top   = isset($_POST['log_top']) ? addslashes($_POST['log_top']) : 'y';
    $log_hide = isset($_POST['log_hide']) ? addslashes($_POST['log_hide']) : 'y';
    $log_check = isset($_POST['log_check']) ? addslashes($_POST['log_check']) : 'y';
    $log_pass = isset($_POST['log_pass']) ? addslashes($_POST['log_pass']) : 'y';
	 $log_page = isset($_POST['log_page']) ? addslashes($_POST['log_page']) : 'y';
    $log_com = isset($_POST['log_com']) ? addslashes($_POST['log_com']) : 'y';
	$log_tw = isset($_POST['log_tw']) ? addslashes($_POST['log_tw']) : 'y';
	$log_reply = isset($_POST['log_reply']) ? addslashes($_POST['log_reply']) : 'y';
	$log_link = isset($_POST['log_link']) ? addslashes($_POST['log_link']) : 'y';
	$log_sort = isset($_POST['log_sort']) ? addslashes($_POST['log_sort']) : 'y';
	$log_sort_bod = isset($_POST['log_sort_bod']) ? addslashes($_POST['log_sort_bod']) : 'y';
	$log_sort_mod = isset($_POST['log_sort_mod']) ? addslashes($_POST['log_sort_mod']) : 'y';
	$log_tag = isset($_POST['log_tag']) ? addslashes($_POST['log_tag']) : 'y';
	$log_user = isset($_POST['log_user']) ? addslashes($_POST['log_user']) : 'y';
	$log_user_admin = isset($_POST['log_user_admin']) ? addslashes($_POST['log_user_admin']) : 'y';
	$log_user_writer = isset($_POST['log_user_writer']) ? addslashes($_POST['log_user_writer']) : 'y';
	$log_att = isset($_POST['log_att']) ? addslashes($_POST['log_att']) : 'y';
	$log_ptime = isset($_POST['log_ptime']) ? addslashes($_POST['log_ptime']) : 'y';
	$blog_build = isset($_POST['blog_build']) ? addslashes($_POST['blog_build']) : 'y';
	$blog_run = isset($_POST['blog_run']) ? addslashes($_POST['blog_run']) : 'y';
	$lie_count_css = $_POST['lie_count_css'];
	

    $output = "<?php\ndefine('LOG_TOTAL','" . $log_total . "');\n";
    $output .= "define('LOG_TOP','" . $log_top . "');\n";
    $output .= "define('LOG_HIDE','" . $log_hide . "');\n";
    $output .= "define('LOG_CHECK','" . $log_check . "');\n";
    $output .= "define('LOG_PASS','" . $log_pass . "');\n";
	$output .= "define('LOG_PAGE','" . $log_page . "');\n";
	$output .= "define('LOG_COM','" . $log_com . "');\n";
	$output .= "define('LOG_TW','" . $log_tw . "');\n";
	$output .= "define('LOG_REPLY','" . $log_reply . "');\n";
	$output .= "define('LOG_LINK','" . $log_link . "');\n";
	$output .= "define('LOG_SORT','" . $log_sort . "');\n";
	$output .= "define('LOG_SORT_MOD','" . $log_sort_mod . "');\n";
	$output .= "define('LOG_SORT_BOD','" . $log_sort_bod . "');\n";
	$output .= "define('LOG_TAG','" . $log_tag . "');\n";
	$output .= "define('COUNT_USER','" . $log_user . "');\n";
	$output .= "define('LOG_USER_ADMIN','" . $log_user_admin . "');\n";
	$output .= "define('LOG_USER_WRITER','" . $log_user_writer . "');\n";
	$output .= "define('LOG_ATT','" . $log_att . "');\n";
	$output .= "define('BLOG_BUILD','" . $blog_build . "');\n";
	$output .= "define('LOG_PTIME','" . $log_ptime . "');\n";
	$output .= "define('BLOG_RUN','" . $blog_run . "');\n";
    $output .= "define('LIE_COUNT_CSS','" . $lie_count_css . "');\n?>";

    $fso = fopen(EMLOG_ROOT . '/content/plugins/lie_count/lie_count_config.php', 'w');
    fwrite($fso, $output);
    fclose($fso);
}

?>