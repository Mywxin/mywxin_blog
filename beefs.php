<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html:charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes"
 />
<link href="beefs\include\beefs.css" rel="stylesheet" type="text/css"/>
</
<body>
<text>
<div class="news">
<?php
echo "
<br>本页面将用于分享各种干货资源！<br>请拭目以待！<br>"
?>
</div>
<div class="terminal">
<?php
$a = "
<br>
Waiting...<br>
Connecting To mwxin.com...<br>
Connection Established.<br>
Copyright (c) 2018 mwxin.com All Rights Reserved.<br>
[root@host~]Login : root<br>
[root@host~]password : ******<br>
[root@host~]Access Is Granted！<br>
//欢迎访问mwxin.com<br>
[root@host~]<br>";
$b = "
[root@host~]Waiting...<br>
[root@host~]正在查询<br>
[root@host~]查询OK<br>
[root@host~]资源类型：百度网盘<br>
[root@host~]密码：NXhgydh<br>
[root@host~]URL：www.baidu.com<br>
[root@host~]<br>";
echo $a;
//echo '<pre>';print_r($_POST);
if ((isset($_POST['input_test'])) && $_POST['input_test'] != "")
{
        echo $_POST['input_test'];
        echo"<br>";
        echo $b;
}
?>
</div>
<div class="input_t">
<form id='form' name="input_test" action="" method='post'>
<input type="text" name="input_test" value="[root@host~]" onfocus="" autocomplete="off">
</form>
</div>
</text>
</body>
</html>