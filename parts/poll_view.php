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
<table cellpadding="5" cellspacing="4" border="0"  style="padding-top:20px; padding-left:40px;">
<tr>
<td colspan="4"><span style="font-size:28px; color:#925402; font-weight:bold;"><?php $data=$tag['data.row']; echo $data['title']; ?></span></td>
</tr>
<?php
$nums=0;
if(!empty($tag['data.results']))
{
	$nums=$sb->sum->nums;
	foreach($tag['data.results'] as $k=>$data)
	{
		$nums+=$data['num'];
	}
	foreach($tag['data.results'] as $k=>$data)
	{
	?>
	<tr>
	<td height="30" width="100"><?php echo $data['choice']; ?></td>
	<td width="300"><img src="<?php echo $tag['path.root']; ?>/inc/img/poll/dot1.gif" width="<?php echo number_format((($data['num']/$nums)*100),2);?>%" height="15"></td>
	<td width="80"><B><?php echo number_format((($data['num']/$nums)*100),2);?>%</B></td>
	<td width="80"><?php echo $data['num'];?>人</td>
	</tr>
	<?php 
	}
}
?>
<tr>
<td colspan="4">投票总数（Total）：<B><?php if($nums)echo $nums;else echo '暂无投票'; ?></B></td>
</tr>
</table>
