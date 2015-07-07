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
<script language="javascript">
<!--
function validator()
{
 	if(document.getElementById('name').value=="")
	{alert("请输入您的姓名!"); document.getElementById('name').focus(); return false;}
	if(document.getElementById('telephone').value=="")
	{alert("请输入您的联系电话!");document.getElementById('telephone').focus();return false;}
	if(document.getElementById('email').value=="")
	{alert("请输入您的Email!");document.getElementById('email').focus();return false;}
	if(!(/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/).test(document.getElementById('email').value))
	{alert("请输入正确的Email!");document.getElementById('email').focus();return false;}
	if(document.all['content'].value=="")
	{alert("请输入您的留言内容!");document.all['content'].focus();return false;}
}
-->
</script>
<div id="stuffbox">
<form id="form1" name="form1" method="post" action="<?php echo sys_href($params['id'],'form_action');?>" onsubmit="return validator()">
<table border="0" id="tbguest">
  <tr>
    <td>姓名：</td>
    <td><input name="name" type="text" id="name" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'" />*</td>
    <td><label>联系电话：</label></td>
    <td><input name="telephone" type="text" id="telephone" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'" />*</td>
  </tr>
  <tr>
    <td>Email：</td>
    <td><input name="email" type="text" id="email" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'"/>*</td>
    <td>QQ：</td>
    <td><input name="qq" type="text" id="qq" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'" /></td>
  </tr>
  <tr>
    <td>公司：</td>
    <td><input name="company" type="text" id="company" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'" /></td>
    <td>主页：</td>
    <td><input name="homepage" type="text" id="homepage" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'" /></td>
  </tr>
  <tr>
    <td>留言内容：</td>
    <td colspan="3">
	<textarea name="content" id="content" style="width:80%;height:60px; font-size:12px;" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'"></textarea>*
  </tr>
   <tr>
    <td>验证码：</td>
    <td colspan="3">
	<input name="checkcode" type="text" class="c_input" maxlength="6" size="6"/><img src="<?php echo URLREWRITE? '/':'./'; ?>inc/verifycode.php" />*
	<input type="submit" name="Submit" value="提交" onMouseOver="this.style.borderColor='#9ecc00'" onMouseOut="this.style.borderColor='#D2D9D8'" /></td>
  </tr>
</table>
 </form>
</div>
<?php
if(!empty($tag['data.results']))
{
	foreach($tag['data.results'] as $k=>$data)
	{
		?>
		<table width="95%" border="0" align="center" cellpadding="4" cellspacing="2">
    	<tr>
      	<td width="51%"><strong>留言人</strong>：<?php echo $data['name'];?></td>
      	<td width="49%">留言时间：<?php echo $data['dtTime'];?></td>
    	</tr>
   		<tr>
      	<td colspan="2">内容：<?php echo $data['content'];?></td>
    	</tr>
    	<tr>
      	<td colspan="2" bgcolor="#E1F0FF">回复：<?php echo $data['content1'];?></td>
    	</tr>	
		</table>
  		<?php
	}
	?>
	<div id="articeBottom">
		<div id="apartPage"><?php if(!empty($tag['pager.cn']))echo $tag['pager.cn'];?> </div>
	</div>
	<?php
}
?>