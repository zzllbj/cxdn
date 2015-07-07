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
.clear { clear:both; }
.picmain { padding:12px; }
.picmain li h5 { height:30px; line-height:30px; font-weight:normal; }
.picmain li h5 a:hover { text-decoration:underline; }
.piclist li { float:left; display:inline-table; text-align:center; height:150px; width:33%;padding:5px 0 0 0; }
.piclist li img { width:140px; height:105px; }
</style>
<link rel="stylesheet" href="<?php echo $tag['path.skin']; ?>res/css/thickbox.css" type="text/css" media="screen" />
<script type="text/javascript">
var tb_pathToImage = "<?php echo $tag['path.skin'];?>res/images/loadingAnimation.gif";
</script>
<script type="text/javascript" src="<?php echo $tag['path.skin'];?>res/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $tag['path.skin'];?>res/js/thickbox.js"></script>
<div class="picmain">
  <div class="piclist" id="pic_list">
    <ul>
<?php
if( !empty( $tag['data.results'] ) )
{
	foreach($tag['data.results'] as $k =>$data)
	{
	?>
      <li> 
	  <a href="<?php echo $data['originalPic']?>" title="<?php echo $data['description'];?>" class="thickbox" rel="chnhou"><img src="<?php echo $data['smallPic']; ?>" alt="<?php echo $data['description'];?>"/></a>
      <h5><a href="<?php echo sys_href($data['channelId'],'picture',$data['id'])?>"><?php echo $data['title']; ?></a></h5>
      </li>
      <?php
	}
}
else
{
	echo '暂无图片。';
}
?>
    </ul>
    <div class="clear"></div>
    <div id="articeBottom">
      <?php if($tag['pager.cn']) echo $tag['pager.cn']; ?>
    </div>
  </div>
</div>
