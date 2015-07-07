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
	<ul id="newsList">
<?php
	if( !empty( $tag['data.results'] ) )
	{
		foreach($tag['data.results'] as $k =>$data)
		{
			if($k%2==0)
			{
			?>
			<li><span><?php echo date('Y-m-d',strtotime($data['dtTime'])); ?></span><a href="<?php echo sys_href($data['channelId'],'list',$data['id'])?>" title="<?php echo $data['title']; ?>" <?php echo $data['style']; ?>><?php echo $data['title']; ?></a></li>
			<?php }else{?>
			<li class="whiteLi"><span><?php echo date('Y-m-d',strtotime($data['dtTime'])); ?></span><a href="<?php echo sys_href($data['channelId'],'list',$data['id'])?>" title="<?php echo $data['title']; ?>" <?php echo $data['style']; ?>><?php echo $data['title']; ?></a></li>
			<?php			
			}
		}
	}
	else
	{
		echo '暂无文章。';
	}
?>
	</ul>
	<div class="clear"></div>
	<div id="articeBottom"><?php if(!empty($tag['pager.cn'])) echo $tag['pager.cn']; ?></div>
</div>