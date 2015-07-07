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
<!--
@import"<?php echo $tag['path.skin']; ?>res/css/parts.css";
-->
</style>
<div id="stuffbox">
	<ul id="videoList">
<?php
if(!empty($tag['data.results']))
{
	foreach($tag['data.results'] as $k =>$data)
	{
		?>		
		<li><a href="<?php echo sys_href($params['id'],'view',$data['id'])?>"><img src="<?php echo ispic($data['picture']); ?>" /></a><p><a href="<?php echo sys_href($params['id'],'view',$data['id'])?>"><?php echo $data['title']; ?></a></p></li>
		<?php
	}
}
else
{
	echo '暂无视频。';
}
?>
	</ul>
	<div class="clear"></div>
	<div  id="articeBottom"><?php if(!empty($tag['pager.cn'])) echo $tag['pager.cn']; ?></div>
</div>