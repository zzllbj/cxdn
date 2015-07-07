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
<style type="text/css">
.downquerytitle{padding-left:20px;}
.list{BACKGROUND-COLOR: expression((this.sectionRowIndex%2==0)?'#f5f5f5':'#ffffff');font-size:14px;}
.downquerytime{color:#555555;font-size:12px;}
.downquery{color:#777777;line-height:150%;font-size:12px;text-decoration;padding-left:10px;}
.downquery:hover{color:#ff6611;border-left:4px solid #e69111;}
#articeBottom{ width:100%; text-align:right; margin:6px 0 15px 0; padding-top:5px;}
</style>
<div id="stuffbox">
	<?php
	if(!empty($tag['data.results']))
	{
	?>
	<table width="100%" cellspacing="0"  cellpadding="3" style="margin-top:10px;">
		<tr height=25 class="downquerytitle"> 
		<td>名称</td>
		<td>大小</td>
		<td>更新</td>
		</tr>
	<?php foreach($tag['data.results'] as $k =>$data){	?>
		<tr class="list">
		<td class="downquery"><a href="<?php echo sys_href($data['channelId'],'download',$data['id'])?>"><?php echo $data['title']; ?></a></td>
		<td class="downquerytime"><?php echo $data['fileSize']; ?></td>
		<td class="downquerytime"><?php echo $data['dtTime']; ?></td>
		</tr>
	<?php } ?>
	</table>
	<div class="clear"></div>
	<div id="articeBottom"><?php if(!empty($tag['pager.cn']))echo $tag['pager.cn']; ?> </div>
	<?php
	}else{
		echo '暂无软件下载。';
	}
	?>
</div>
