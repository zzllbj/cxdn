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
	$("input[name=buynum]").change(function(){
		var id=parseInt($(this).attr('id'));
		var value=parseInt($(this).attr('value'))
			$.ajax({
				type:"POST",
				url:"<?php echo URLREWRITE?'':'.';?>/?p=<?php echo $request["p"]; ?>&a=updatebasketfornum",
				data:"r="+id+"&num="+value,
				timeout:"4000",
				dataType:"json",                                 
				success: function(html){
					$("#change_"+id).html(html.curprice);
					$("#totalnum").html(html.num);
					$("#totalprice").html(html.price);
					alert("操作成功");
				},
				error:function(){
					alert("超时,请重试");
				}
			});
	});
	$("a.del").click(function(){
		var del=$(this).parent().parent();
		$.ajax({
			type:"POST",
			url:"<?php echo URLREWRITE?'':'.';?>/?p=<?php echo $request["p"]; ?>&a=updatebasketfordel",
			data:"r="+parseInt($(this).attr('id')),
			timeout:"4000",
			dataType:"json",                                 
			success: function(html){
				switch (html.flag){
					case "0": $("#submitbasket").remove();$("#totalnum").html('0'); $("#totalprice").html('0');del.next().append('<td colspan="6">购物车为空，请继续购物！</td>');break;
					case "1": $("#totalnum").html(html.num); $("#totalprice").html(html.price); break;
					default:;
				}
				del.remove();
				alert("操作成功");
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
				<td class="orderborder"><input type="text" name="buynum" id="'.$data['id'].'buynum" value="'.$data['num'].'" size="2"/></td>
				<td class="orderborder" ><span id="change_'.$data['id'].'">'.($data['preferPrice']*$data['num']).'</span></td>
				<td class="orderborder"><a href="#" id="'.$data['id'].'" class="del">删除</a></td>
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
  <ol id="step1">
    <li id="selected">1.加入购物车</li>
    <li>2.确认订单</li>
    <li>3.提交订单</li>
  </ol>
  <div class="ordercontents">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr align="center">
        <td width="15%" height="30" class="titleborder">商品编号</td>
        <td width="35%" class="titleborder">商品名称</td>
        <td width="10%" class="titleborder">单价</td>
        <td width="12%" class="titleborder">数量</td>
        <td width="13%" class="titleborder">小计</td>
        <td class="titleborder">操作</td>
      </tr>
      <?php echo $str; ?>
    </table>
  </div>
  <?php if($flag){ ?>
  <div id="prototal"> <span>商品总数：</span><span class="totalnum" id="totalnum"><?php echo $num; ?></span><span>件，</span> <span>总价：</span><span class="totalprice" id="totalprice"><?php echo $price; ?></span><span>RMB</span> </div>
  <?php } ?>
  <div id="nextbutton"> 
    <a href="<?php echo sys_href($request['p'])?>"><div class="jiesuan">继续购物</div></a>
    <?php if($flag){ ?>
    <a id="submitbasket" href="<?php echo sys_href($request['p'],'product_basketqr')?>" ><div class="jiesuan">去结算</div></a>
    <?php } ?>
  </div>
</div>

