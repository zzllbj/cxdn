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
<link href="<?php echo $tag['path.skin']; ?>res/css/parts.css" rel="stylesheet" />
<style type="text/css">
<!--
form{ padding-bottom:20px; border-bottom:#666666 dashed 1px; }
-->
</style>
<table border="0" cellpadding="0" cellspacing="0" width="650px">
<tr>
<td valign="top" style=" padding-top:20px; padding-left:50px;">
<?php
if( !empty( $tag['data.results'] ) )
{
	foreach($tag['data.results'] as $k =>$data)
	{
		$url_a = URLREWRITE?'/'.$tag['channel.menuname'].'/single/poll_send_'.$data['id'].'.html':'./?p='.$params['id'].'&a=index&r='.$data['id'].'&vtype=a';
		$url_b = URLREWRITE?'/'.$tag['channel.menuname'].'/complex/poll_send_'.$data['id'].'.html':'./?p='.$params['id'].'&a=index&r='.$data['id'].'&vtype=b';
		if($data['choice']=='a')
		{
			?>
      <form method="post" action="<?php echo $url_a;?>">
      <span style=" font-weight:bold;"><?php echo $data['title']; ?></span> （<?php echo date('Y年m月d日',strtotime($data['dtTime'])); ?>开始投票）
      <?php
			if( !empty( $data['children'] ) )
			{
				foreach($data['children'] as $children_data)
				{
				?>
      <br/>
      <input type="radio" name="choice" value="<?php echo $children_data['id']; ?>" <?php echo $children_data['isdefault']=='a'?checked:'';?>>
      <?php echo $children_data['choice'] ?>
      <?php 
				}
			}
		}
		else if($data['choice']=='b')
		{					
			?>
      <form method="post" action="<?php echo $url_b;?>">
        <span style=" font-weight:bold;"><?php echo $data['title']; ?></span> （<?php echo date('Y年m月d日',strtotime($data['dtTime'])) ?>开始投票）
        <?php
			if( !empty( $data['children'] ) )
			{
				foreach($data['children'] as $children_data)
				{
				?>
        <br/>
        <input type="checkbox" name="choice[]" value="<?php echo $children_data['id'] ?>" <?php echo $children_data['isdefault']==a?checked:'';?>>
        <?php echo $children_data['choice'] ?>
        <?php 
				}
			}
		}
		if(URLREWRITE) 
			$url="/".$tag['channel.menuname']."/poll_".$data['id'].".html";
		else
			$url="./?p=".$children_data['channelId']."&a=view&r=".$data['id'];
		?>
        <br/>
        <center>
          <input type="submit" value="投票">
          &nbsp;&nbsp;&nbsp;
          <input type="button" value="查看" onclick="window.location.href='<?php echo $url; ?>'">
        </center>
      </form>
      <?php
	}
}
else
{
	echo '暂无投票列表。';
}
?></td>
  </tr>
</table>
<div id="articeBottom">
  <?php if(!empty($tag['pager.cn'])) echo $tag['pager.cn']; ?>
</div>
