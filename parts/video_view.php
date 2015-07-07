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
<?php
	//2011-09-11
	$data=$tag['data.row'];
?>
<link rel="stylesheet" href="<?php echo $tag['path.skin']; ?>res/css/parts.css" type="text/css" />
<h3><?php echo $data['title'];?></h3>
<div id="stuffbox">
<ul id="playerDIV" >
	<br><li>关键字：<?php echo $data['keywords'];?></li>
	<li>视频大小：<?php echo $data['fileSize'];?></li>
	<li>
	<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8" width="400" height="320" id="theMediaPlayer">
		<param name=movie value="<?php $tag['path.root']; ?>/inc/img/video/player.swf">
		<param name=quality value="high">
		<param name=bgcolor value="#FFFFFF">
		<param name=allowFullScreen value="false">
		<param name=swLiveConnect value="true">
		<param name=allowScriptAccess value="sameDomain">
		<param name="FlashVars" value="file=<?php echo $data['filePath'];?>&width=400&height=320&displaywidth=396&displayheight=300&autostart=true&backcolor=0xFFFFFF">
	<embed type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" width="400" height="320" bgcolor="#FFFFFF" name="theMediaPlayer" src="<?php $tag['path.root']; ?>/inc/img/video/player.swf" flashvars="file=<?php echo $data['filePath'];?>&width=400&height=320&displaywidth=396&displayheight=300&autostart=true&backcolor=0xFFFFFF"></embed>
	</object>
</li>
	<li>视频详请：<?php echo $data['content'];?></li>
</ul>	
</div>
<?php unset($data); ?>
