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
<?php $data=$tag['data.row']; ?>
<style type="text/css">
<!--
.downpropname{color:#000000;font-size:16px;text-indent:15px;}
.downprop{color:#000000;font-size:16px;padding-left:10px;}
.downprop a:hover{border-bottom:4px solid #00b2c5;}
-->
</style>
<table width="100%" border="0" cellspacing="1" cellpadding="2" style="margin-top:5px;">
  <tr><td class="downpropname">名称:</td><td class="downprop"><?php echo $data['title'];?></td></tr>
  <tr><td class="downpropname">大小:</td><td class="downprop"><?php echo $data['fileSize'];?></td></tr>
  <tr><td class="downpropname">更新:</td><td class="downprop"><?php echo $data['dtTime'];?></td></tr>  
  <tr><td class="downpropname">下载:</td><td class="downprop"><a href="<?php echo $data['filePath'];?>" style="color:#07d6d6;">点击下载</a></td></tr> 
  <tr><td class="downpropname">详细:</td><td class="downprop"><?php echo $data['content'];?></td></tr> 
</table>
