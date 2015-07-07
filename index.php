<!DOCTYPE html >
<head>
<meta http-equiv="Content-language" content="zh-cn" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="msvalidate.01"content="72D6FCECC774FE5BAB9BA611B59527D"/>
<title><?php echo $tag['seo.title']; ?></title>
<meta name="author" content="扎旗创想电脑- 扎鲁特旗电脑维修- 扎旗电脑专业组装"/> 
<meta property="qc:admins" content="143626444766572446375" />
<meta name="keywords" content="<?php echo $tag['seo.keywords']; ?>" />
<meta name="description" content="<?php echo $tag['seo.description'];  ?>" />
<meta name="Reply-to" content="grysoft" />
<link rel="stylesheet" type="text/css" href="<?php echo $tag['path.skin'];?>css/index.css" />
<!-- <link href="<?php echo $tag['path.skin'];?>parts/css/parts.css" /> -->
<!-- <link href="css/index.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="<?php echo get_skin_root(); ?>css/ad.css" rel="stylesheet" type="text/css" /> -->
<script language="javascript" src="js/led_marquee.js"></script>
<!-- <script type="text/javascript" src="js/myfocus-2.0.1.min.js"></script>
<script type="text/javascript">
//设置
myFocus.set({
	id:'myFocus',//ID
	time:12,
	pattern:'mF_kdui'//风格
});
</script> -->
<script type="text/javascript" src="<?php echo $tag['path.skin'];?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo $tag['path.skin'];?>js/focus.js"></script>
<!--[if lte IE 6]>
<script type="text/javascript" src="js/belatedPNG.js"></script>
<script type="text/javascript">
    var __IE6=true;
    DD_belatedPNG.fix('.logo img,.prev img,.next img,img');
</script>
<![endif]-->
</head>
<body>

<div id="head">
	<div class="top">
    	<div class="logo"><a href="/"><img src="<?php echo $tag['path.skin']; ?>images/logo.png" style="width:400px;" /></a></div>
        <div class="tel">购机热线：0475-7223747</div>
    </div>
	<div id="navall">
    <div id="nav">
        <ul>
            <li class="nobg"> 
            	<!--[if lte IE 6]><a href=""><table><tr><td><![endif]--> 
            	<a href="<?php echo $tag['path.root']?>/" class="selt">首&nbsp;&nbsp;&nbsp;页</a>
            	<!--[if lte IE 6]></td></tr></table></a><![endif]--> 
          	</li>
            <?php nav_main_custom() //主导航调用的标签?>
        </ul> 
    </div>
	</div>
	<div align="center">
	<div id="ledtext"><p>正在加载LED字幕……</p></div>
	</div>
	<script language="javascript" src="js/led_text.js"></script>
<!--<div id="myFocus">
<div class="loading"><img src="images/loading.gif" alt="我们正在努力加载..." /></div>
  <div class="pic">
  	<ul>
        <li><a href="#1"><img src="images/1.jpg" thumb="" alt="扎旗创想电脑广告路由器" text="新型无线广告推广路由器" /></a></li>
        <li><a href="#2"><img src="images/2.jpg" thumb="" alt="扎鲁特旗创想电脑鑫谷电源首选" text="鑫谷电源绿色节能" /></a></li>
        <li><a href="#3"><img src="images/3.jpg" thumb="" alt="鲁北镇装机主板最好" text="七彩虹主板，战旗Z77系列" /></a></li>
        <li><a href="#4"><img src="images/4.jpg" thumb="" alt="扎旗电脑组装最好显卡" text="七彩虹440灵动鲨系列D5显卡" /></a></li>
        <li><a href="#5"><img src="images/5a.jpg" thumb="" alt="扎旗电脑组装与监控安装" text="哲北监控施工现场" /></a></li>
  	</ul>
  </div>
</div>-->
<div class="slide-main" id="touchMain">
	<a class="prev" href="javascript:;" stat="prev1001"><img src="<?php echo $tag['path.skin'];?>images/l-btn.png" /></a>
	<div class="slide-box" id="slideContent">
		<div class="slide" id="bgstylec">
			<a stat="sslink-3" href="http://www.nmgzlt.com" target="_blank">
				<div class="obj-e"><img src="<?php echo $tag['path.skin'];?>images/baomi-t-1.png" /></div>
				<div class="obj-f"><img src="<?php echo $tag['path.skin'];?>images/igame.png" /></div>
			</a>
		</div>
		<div class="slide" id="bgstylea">
			<a stat="sslink-1" href="http://www.nmgzlt.com/" target="_blank">
				<div class="obj-a"><img src="<?php echo $tag['path.skin'];?>images/bao.png" /></div>
				<div class="obj-b"><img src="<?php echo $tag['path.skin'];?>images/nt-1.png" /></div>
			</a>
		</div>
		<div class="slide" id="bgstyleb">
			<a stat="sslink-2" href="http://www.nmgzlt.com/" target="_blank">
				<div class="obj-c"><img src="<?php echo $tag['path.skin'];?>images/bao-2.png" /></div>
				<div class="obj-d"><img src="<?php echo $tag['path.skin'];?>images/st-2.png" /><p>扎鲁特旗装机价格最低 -装机最实惠！</p></div>
			</a>
		</div>
	</div>
	<a class="next" href="javascript:;" stat="next1002"><img src="<?php echo $tag['path.skin'];?>images/r-btn.png" /></a>
	<div class="item">
		<a class="cur" stat="item1001" href="javascript:;"></a><a href="javascript:;" stat="item1002"></a><a href="javascript:;" stat="item1003"></a>
	</div>
</div>
</div>
<div id="cent">
	<div style="display:inline" id="left">
    	<div class="news">
        	<div class="news_tit">
            	<h3>最新动态</h3>
            	<div class="more"><a href="<?php echo get_root_path() ?>/?p=2"><img src="<?php echo $tag['path.skin']; ?>images/more.gif" /></a></div>                
            </div>
            <ul id="pagelist">
                <?php echo dt_list(2,28,14,200,1,true,'ordering')?>
            </ul>
		<ul id="pagelist">
		<?php echo dt_list(3,28,14,200,1,true,'ordering')?>
		</ul>
        </div>
<!--       <div align="left" class="contact">
	<p></p>
	<p>网址：www.nmgzlt.com</p>
        <p>服务热线：0475-7223747</p>
        <p>电子邮箱：zzllbj@126.com</p>
        <p>地址：舒雅居小区北商20号创想电脑</p>
	<p><a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=914156589&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:914156589:41" alt="点击这里给我发消息" title="点击这里给我发消息"></a></p>
        </div>
-->
</div>
    <div style="display:inline" align="right" id="right">
    	<div class="about">
        	<div class="about_tit">
            	<h3>关于我们</h3>
                <div class="more"><a href="<?php echo get_root_path() ?>/?p=4"><img src="<?php echo $tag['path.skin']; ?>images/more.gif" /></a></div>
            </div>
            <div class="about_cont">
            	<?php echo dt_article(4,400)?>...
           </div>
        </div>
        <div class="pro">
        	<div class="pro_tit">
            	<h3>产品展示</h3>
                <div class="more"><a href="<?php echo get_root_path() ?>/?p=8"><img src="<?php echo $tag['path.skin']; ?>images/more.gif" /></a></div>
            </div>
            <div class="pro_cont">
            	<ul>
                	<?php echo dt_product(8,14,10,0,0,false,null,'id')?>
                </ul>
            </div>
        </div>
    </div>
</div>
<div id="foot">
	<div class="foot_all">
        <div align="left" class="foot_lft">
        	<p>Copyright © 2011-2012 nmgzlt.com</p>
            <p>All rights reserved.</p>
            <p>Powered by CXDN</p>
        </div>
        <div class="foot_logo">
          <div align="center"><br>
		  <script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3F22fefdd704c3010e472d135d19045e0a' type='text/javascript'%3E%3C/script%3E"));
</script>
		  <script src="http://s20.cnzz.com/stat.php?id=3040629&web_id=3040629&show=pic2" language="JavaScript"></script>
		  </div>
        </div>
        <div class="foot_lft">
            <p align="right"></p>
            <p align="right">联系电话：0475-7223747</p>
           	<p align="right"></p>
            <p align="right">地址：内蒙古通辽市扎鲁特旗</p>
        </div>
	<div class="foot_360">
	<a href="http://webscan.360.cn/index/checkwebsite/url/www.nmgzlt.com"><img border="0" src="http://webscan.360.cn/status/pai/hash/f200f0afa7b9539b398d35cb73e884c6"/></a>
	</div>    
</div>   
</div>
</body>
</html>
