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
<?php global $basket; ?>
<script src="<?php echo $tag['path.root']; ?>/inc/js/jquery-1.3.2.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#customer").change(function(){
		$.ajax({
			type:"POST",
			url:"<?php echo URLREWRITE?'':'.';?>/?p=<?php echo $request["p"]; ?>&a=updatebasketforcustomer",
			data:"customer="+$(this).attr('value'),
			timeout:"4000",
			dataType:"string",                                 
			success: function(html){
				//alert("操作成功");
			},
			error:function(){
				alert("超时,请重试");
			}
		});
	});
	$("#m_tel").change(function(){
		$.ajax({
			type:"POST",
			url:"<?php echo URLREWRITE?'':'.';?>/?p=<?php echo $request["p"]; ?>&a=updatebasketformtel",
			data:"m_tel="+$(this).attr('value'),
			timeout:"4000",
			dataType:"string",                                 
			success: function(html){
				//alert("操作成功");
			},
			error:function(){
				alert("超时,请重试");
			}
		});
	});
	$("#address").change(function(){
		$.ajax({
			type:"POST",
			url:"<?php echo URLREWRITE?'':'.';?>/?p=<?php echo $request["p"]; ?>&a=updatebasketforaddress",
			data:"address="+$(this).attr('value'),
			timeout:"4000",
			dataType:"string",                                 
			success: function(html){
				//alert("操作成功");
			},
			error:function(){
				alert("超时,请重试");
			}
		});
	});
	
});
</script>
<?php 
if(empty($basket['productinfo'])){
	$str.='<tr><td colspan="6">购物车为空，请继续购物！</td></tr>';
	$flag=false;
}else{
	foreach($basket['productinfo'] as $k=>$data){
		$str.='<tr align="center">
				<td height="70" class="orderborder"><img src="'.ispic($data['smallPic']).'" width="60" height="40"/></td>
				<td class="orderborder">'.$data['title'].'</td>
				<td class="orderborder">'.$data['preferPrice'].'</td>
				<td class="orderborder"><input type="text" name="buynum" id="'.$data['id'].'buynum" value="'.$data['num'].'" size="2" disabled="disabled"/></td>
				<td class="orderborder" ><span id="change_'.$data['id'].'">'.($data['preferPrice']*$data['num']).'</span></td>
			</tr>';	
		$num+=$data['num'];
		$price+=$data['preferPrice']*$data['num'];
	}
	$str.='<tr></tr>';
	$flag=true;
 } 
 ?>
<link rel="stylesheet" href="<?php echo $tag['path.skin']; ?>res/css/parts.css" type="text/css" />
<div id="mycart"> <span id="mycarttitle">我的购物车</span>
  <ol id="step2">
    <li>1.加入购物车</li>
    <li id="selected">2.确认订单</li>
    <li>3.提交订单</li>
  </ol>
  <div class="orderdetails">
    <h2>订单详情</h2>
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr align="center">
        <td class="ordertitle" width="14.9%">商品编号</td>
        <td class="ordertitle" width="41.2%">商品名称</td>
        <td class="ordertitle" width="11.4%">单价</td>
        <td class="ordertitle" width="11.4%">数量</td>
        <td class="ordertitle">小计（元）</td>
      </tr>
      <?php echo $str; ?>
    </table>
  </div>
  <?php if($flag){ ?>
  <div id="prototal"> <span>商品总数：</span><span class="totalnum" id="totalnum"><?php echo $num; ?></span><span>件，</span> <span>总价：</span><span class="totalprice" id="totalprice"><?php echo $price; ?></span><span>RMB</span> </div>
  <div class="orderdetails">
    <h2>收货人信息</h2>
    <p> <span>姓名：</span>
      <input name="customer" id="customer" class="ordertext" type="text" value="<?php echo empty($basket['customer'])?"":$basket['customer']; ?>"/>
    </p>
    <p> <span>手机号：</span>
      <input name="m_tel" id="m_tel" class="ordertext" type="text" value="<?php echo empty($basket['m_tel'])?"":$basket['m_tel']; ?>"/>
    </p>
    <p> <span>收货地址：</span>
      <input name="address" id="address" class="orderadd" type="text" value="<?php echo empty($basket['address'])?"":$basket['address']; ?>"/>
    </p>
  </div>
  <?php } ?>
  <div id="nextbutton"> <a href="<?php echo sys_href($request['p'])?>"><img src="<?php echo $tag['path.skin']; ?>res/images/basket/goonbuy.jpg" width="130" height="35" align="left" /></a>
    <?php if($flag){ ?>
    <a id="submitbasket" href="<?php echo sys_href($request['p'],'product_basket_submit')?>" ><img src="<?php echo $tag['path.skin']; ?>res/images/basket/settlement.jpg" width="130" height="35" align="right" /></a>
    <?php }?>
  </div>
</div>