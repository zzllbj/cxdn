<!DOCTYPE html >
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $tag['seo.title']; ?></title>
<meta name="author" content="扎旗创想电脑,http://www.nmgzlt.com,QQ : 914156589,tel:0475-7223747">
<title><?php echo $tag['seo.title']; ?></title>
<meta property="qc:admins" content="143626444766572446375" />
<meta name="keywords" content="<?php echo $tag['seo.keywords']; ?>" />
<meta name="description" content="<?php echo $tag['seo.description'];  ?>" />
<meta name="Reply-to" content="grysoft" />
<link rel="stylesheet" type="text/css" href="<?php echo $tag['path.skin']; ?>css/index.css" />
</head>
<body>
<div id="headcommon">
	<div class="top">
    	<div class="logo"><a href="/"><img src="<?php echo $tag['path.skin']; ?>images/logo.png" style="width:400px;" /></a></div>
        <div class="tel">购机热线：0475-7223747</div>
    </div>
	<div id="navall">
    <div id="nav">
        <ul>
            <li class="nobg"> 
            	<!--[if lte IE 6]><a href=""><table><tr><td><![endif]--> 
            	<a href="<?php echo $tag['path.root']?>/">首&nbsp;&nbsp;&nbsp;&nbsp;页</a>
            	<!--[if lte IE 6]></td></tr></table></a><![endif]--> 
          	</li>
            <?php nav_main_custom() //主导航调用的标签?>
        </ul>
    </div>
	</div>
</div>
<div id="cent">
	<div id="left">
    	<div class="news">
        	<div class="news_tit">
            	<h3>最新动态</h3>
            	<div class="more"><a href="<?php echo get_root_path() ?>/?p=1"><img src="<?php echo $tag['path.skin']; ?>images/more.gif" /></a></div>                
            </div>
            <ul id="pagelist">
                 <?php echo dt_list(2,28,12,210,1,true,'ordering')?>
            </ul>
		<ul id="pagelist">
		<?php echo dt_list(3,28,12,210,1,true,'ordering')?>
		</ul>
        </div>
<!--        <div class="contact">
        	<p>业务QQ：914156589</p>
            <p>网址：www.nmgzlt.com</p>
            <p>服务热线：0475-7223747</p>
            <p>电子邮箱：zzllbj@126.com</p>
            <p>地址：舒雅居小区北商20号创想电脑</p>
        </div>
-->
    </div>
    <div id="right">
        <div class="location"><?php nav_location('>>','首页') //当前位置调用的标签?></div>
        <div class="layout"><?php sys_layout_part() //内容调用的标签?> </div>
    </div>
</div>
<div id="foot">
	<div class="foot_all">
        <div class="foot_lft">
        	<p>Copyright © 2011-2012 nmgzlt.com</p>
            <p>All rights reserved.</p>
            <p></p>
            <p>Powered by CXDN</p>
        </div>
        <div class="foot_logo"><br>
		<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F22fefdd704c3010e472d135d19045e0a' type='text/javascript'%3E%3C/script%3E"));
</script>
		<script src="http://s20.cnzz.com/stat.php?id=3040629&web_id=3040629&show=pic2" language="JavaScript"></script>
		</div>
        <div class="foot_lft">
             <p></p>
            <p>联系电话：0475-7223747</p>
           	<p></p>
            <p>地址：内蒙古通辽市扎鲁特旗</p>
        </div>
	<div class="foot_360">
		<a href="http://webscan.360.cn/index/checkwebsite/url/www.nmgzlt.com"><img border="0" src="http://webscan.360.cn/status/pai/hash/f200f0afa7b9539b398d35cb73e884c6"/></a>
	</div>
    </div>   
</div>
</body>
</html>
