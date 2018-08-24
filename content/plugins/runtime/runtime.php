<?php
/**
 * Plugin Name: 响应时间
 * Version: 1.0
 * Description: 显示网页响应耗时
 */

!defined('EMLOG_ROOT') && exit('Access Deined!');

if (!isset($_SERVER['REQUEST_TIME_FLOAT'])) {
	$_SERVER['REQUEST_TIME_FLOAT'] = microtime(TRUE);
}
 
function runtime_display() {
	echo sprintf('&nbsp;&nbsp;&nbsp;&nbsp;%.2fms', (microtime(TRUE) - $_SERVER["REQUEST_TIME_FLOAT"]) * 1000);
}

addAction('index_footer', 'runtime_display');
