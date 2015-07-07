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
<script language="javascript" type="text/javascript" src="<?php echo $tag['path.root'];?>/inc/js/date/WdatePicker.js"></script>
<script language="javascript">
function validator()
{
 	if(document.getElementById('productName').value=="")
	{alert("请填写您的产品名称!"); document.getElementById('productName').focus(); return false;}
	if(document.getElementById('deliveryTime').value=="")
	{alert("请填写您的交货日期!");document.getElementById('deliveryTime').focus();return false;}
	if(document.getElementById('linkman').value=="")
	{alert("请填写联系人姓名!");document.getElementById('linkman').focus();return false;}
	if(document.getElementById('phone').value=="")
	{alert("请填写您的联系电话!");document.getElementById('phone').focus();return false;}
}
</script>
<br />
<div id="stuffbox">
<form id="form1" name="form1" method="post" action="<?php echo sys_href($params['id'],'form_action')?>" onsubmit="return validator()">
  <table width="95%" border="0" id="tbguest">
	<tr>
      <td width="120">产品名称</td><td><input name="productName" type="text" id="productName" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'" />*(* 选项为必填)</td>
    </tr>
    <tr>
      <td>产品型号</td><td><input name="productSN" type="text" id="productSN" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'" /></td>
    </tr>
    <tr>
      <td>交货日期</td><td><input name="deliveryTime" type="text" id="deliveryTime" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'" style="font-size:9pt;width:152px; border:#6CF 2px solid;" onClick="WdatePicker()" />*</td>
    </tr>
    <tr>
      <td>交货方式</td>
      <td>
        <select name="transports" id="transports">
          <option value="快递">快递</option>
          <option value="平邮">平邮</option>
          <option value="物流">物流</option>
          <option value="其他">其他</option>
        </select>
   		</td>
    </tr>
    <tr>
      <td>联系人</td><td><input name="linkman" type="text" id="linkman" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'" />*</td>
    </tr>
    <tr>
      <td>单位</td><td><input name="unit" type="text" id="unit" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'" /></td>
    </tr>
    <tr>
      <td>地址</td><td><input name="address" type="text" id="address" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'" /></td>
    </tr>
    <tr>
      <td>电话</td><td><input name="phone" type="text" id="phone" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'" />*</td>
    </tr>
    <tr>
      <td>Email</td><td><input name="email" type="text" id="email" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'" />*</td>
    </tr>
    <tr>
      <td>备注</td><td><textarea name="remark" rows="3" id="remark" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'"></textarea></td>
    </tr>
    <tr>
      <td>&nbsp;</td><td><label><input type="submit" name="Submit" value="提交" /></label></td>
    </tr>
  </table>
  </form>
</div>