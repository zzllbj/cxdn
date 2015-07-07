<?php
    // 为方便并保证您以后的快速升级 请使用SHL提供的如下全局数组
	
	// 数组定义/config/dt-global.php
	
	// 如有需要， 请去掉注释，输出数据。
	/*
	echo '<pre>';
		print_r($tag);
	echo '</pre>';
	*/
?>
<link rel="stylesheet" href="<?php echo $tag['path.skin']; ?>res/css/parts.css" type="text/css" />
<div id="crs">
   <div id="mycart">
       <span id="mycarttitle">我的购物车</span>
       <ol id="step3">
         <li>1.加入购物车</li>
         <li>2.确认订单</li>
         <li id="selected">3.提交订单</li>
       </ol>
       <div class="orderdetails">
          <img src="<?php echo $tag['path.skin']; ?>res/images/basket/cart3_bg.jpg" width="81" height="95" style="margin:30px 15px 0 150px" align="left" />
          <h5>您的订单已提交，请耐心等待。</h5>
       </div>
       <div id="nextbutton">
            <a href="<?php echo sys_href($request['p'])?>"><img src="<?php echo $tag['path.skin']; ?>res/images/basket/goonbuy.jpg" width="130" height="35" align="left" /></a>
       </div>
   </div>
</div>