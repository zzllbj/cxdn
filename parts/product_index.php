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
<link rel="stylesheet" href="<?php echo $tag['path.skin']; ?>res/css/thickbox.css" type="text/css" media="screen" />
<script type="text/javascript">
var tb_pathToImage = "<?php echo $tag['path.skin'];?>res/images/loadingAnimation.gif";
</script>
<script type="text/javascript" src="<?php echo $tag['path.skin'];?>res/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo $tag['path.skin'];?>res/js/thickbox.js"></script>
<div style="margin-bottom:15px; height:25px;">
	<span class="pic_more"><a href="<?php echo sys_href($request['p'],'product_basket')?>" title="查看"><img src="<?php echo $tag['path.skin']; ?>res/images/basket/cart.jpg" width="118" height="25" /></a></span>
</div>
<?php
    
	if( !empty( $tag['data.results'] ) )
	{	
		foreach($tag['data.results'] as $k =>$data)
	    {
		  ?>
		  <div class="product_index"> 
		  <a href="<?php echo $data['originalPic']?>" title="<?php echo strip_tags($data['description']);?>" rel="chnhou" class="thickbox"><img src="<?php echo $data['smallPic']; ?>" alt="<?php echo $data['description'];?>" border=0 /></a>
		  <dl class="pro_summarytxt">
			<dt>产品名称：<a href="<?php echo sys_href($data['channelId'],'product',$data['id'])?>"><?php echo $data['title']; ?></a></dt>
			<dd>型号：  <?php echo $data['sn']; ?></dd>
			<dd>规格：  <?php echo $data['spec']; ?></dd>
			<dd>市场价：<?php echo $data['sellingPrice']; ?></dd>
			<dd>优惠价：<?php echo $data['preferPrice']; ?></dd>
			<dd>点击数：<?php echo $data['counts']; ?></dd>
		  </dl>
		  <div id="iconbottom"> 
		  <span><a href="<?php echo sys_href($data['channelId'],'product_intobasket',$data['id'])?>"><img alt="加入购物车" src="<?php echo $tag['path.skin']; ?>res/images/basket/buy.jpg" width="68" height="23"  /></a></span>
		   
		  <span><a href="<?php echo sys_href($data['channelId'],'product',$data['id'])?>"><img alt="获得详情" src="<?php echo $tag['path.skin']; ?>res/images/basket/details.jpg" width="68" height="23" style="bottom:10px; right:10px;"/></a></span> 
		  </div>
		</div>
		 <?php
        }
    }
    else
    {
        echo '<br />暂无产品列表。';
    }
?>
  <div class="clear"></div>
  <div  id="articeBottom"><?php if(!empty($tag['pager.cn'])) echo $tag['pager.cn']; ?></div>
