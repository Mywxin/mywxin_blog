<!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html:charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes"
 />
<link href="beefs\include\beefs.css" rel="stylesheet" type="text/css"/>
<script type="text/javascript">
	创建ajax引擎
	function getXmlHttpObject(){
	var xmlhttp = null;
	
	if (window.XMLHttpRequest) 
	  {// code for IE7+, Firefox, Chrome, Opera, Safari 
	  xmlhttp=new XMLHttpRequest();
	  //alert('IE7+, Firefox, Chrome, Opera, Safari！');
	  } 
	else 
	  {// code for IE6, IE5 
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP"); 
	 //alert('IE6, IE5！');
	  }

	  return xmlhttp;
	}
	var myXMLHttpRequest="";
	function refresh(){
		myXMLHttpRequest = getXmlHttpObject();
		var code = event.keyCode;
		if(code == 13){
			if(myXMLHttpRequest)
			{
				
				//alert('创建OK！');
				//发送请求到服务器页面
				//第一个参数表示请求的方式
				//第二个参数指定URL，对哪个页面发出ajax请求
				var url = "userlog.php?input_test="+$("input_test").value;
				//alert(url);
				myXMLHttpRequest.open("get",url, true);
				//指定回调函数
				myXMLHttpRequest.onreadystatechange=chuli;
				myXMLHttpRequest.send();
			}else
			{
				alert('创建失败！');
			}
		}
	}
	function chuli(){
		//alert('yichuli！'+myXMLHttpRequest.readyState);
		if (myXMLHttpRequest.readyState==4 && myXMLHttpRequest.status==200)
	    {
	    	//alert('已处理'+myXMLHttpRequest.responseText);
	    	document.getElementById("terminal").innerHTML=myXMLHttpRequest.responseText;
	    	$('input_test').value="";
	    }
	}

	function $(id){
		return document.getElementById(id);
	}
</script>
<body>
<text>
<div class="news">
<?php
echo "
<br>本页面将用于分享各种干货资源！<br>请拭目以待！<br>"
?>
</div>
<div id = "terminal" class="terminal">
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
//echo '<pre>';print_r($_POS}
//if ((isset($_POST['input_test'])) && $_POST['input_test'] != "")
//{
//        echo $_POST['input_test'];
//       echo"<br>";
//        echo $b;
//}
?>
</div>
<div class="input_dolat_t">
<input class = "input_dolar" type="text" value="[root@host~]" readonly="readonly">
</div>
<div class="input_t">
<input id='input_test' type="text" name="input_test" value="" autocomplete="off" onkeyup="refresh()">
</div>

</text>
</body>
</html>