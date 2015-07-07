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
<div id="stuffbox">
	<div class="linkers">				
		<?php
		if( !empty( $tag['data.results'] ) )
		{
			foreach( $tag['data.results'] as $k=>$data)
			{
			?>
			<a href="<?php echo './?p='.$data['channelId'].'&a=view&r='.$data['id'].'&link='.$data['linkAddress']; ?>"target="_blank"><?php echo $data['linkerName'];?></a>
			<?php
			}
		}else{
			echo'暂无友情链接';
		}
		?>	
	</div>
</div>