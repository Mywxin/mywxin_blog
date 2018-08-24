<?php  if(!defined('EMLOG_ROOT')) {exit('error!');} 
@session_start(); 
$counter = intval(file_get_contents("counter.dat"));  
    if(!$_SESSION['#'])  
    {  
     $_SESSION['#'] = true;  
     $counter++;  
     $fp = fopen("counter.dat","w");  
     fwrite($fp, $counter);  
     fclose($fp);  
    }  
?>
</div>
<div id="totop" class="totop"><i class="iconfont">&#404;</i>回顶部</div>
<script type="text/javascript">
	$(window).scroll(function () {
        var dt = $(document).scrollTop();
        var wt = $(window).height();
        if (dt <= 0) {
            $("#totop").hide();
            return;
        }
        $("#totop").show();
        if ($.browser.msie && $.browser.version == 6.0) {
            $("#totop").css("top", wt + dt - 110 + "px");
        }
    });
    $("#totop").click(function () { $("html,body").animate({ scrollTop: 0 }, 200) });
</script>
</div>
<div style="clear:both;"></div>
<div id="footer">
<p>Powered by <a href="" title="xin">xin</a> 
<?php doAction('index_footer'); ?>
<p align="center">您是到访的第<?php echo "$counter";?>位用户</p>
</div>
</div>
</body>
</html>