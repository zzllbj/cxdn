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
<link rel="stylesheet" href="<?php echo $tag['path.skin']; ?>res/css/parts.css" type="text/css" />
<div id="stuffbox">
	<ul>
    <h2 class="jobh"><strong><?php echo $data['title']; ?></strong></h2>
	<table class="jobInfo">
  	<tr>
    	<td><strong>职位名称</strong>：<?php echo $data['title']; ?></td>
    	<td><strong>工作性质</strong>：<?php echo $data['jobKind']; ?></td>
  	</tr>
  	<tr>
   		<td><strong>招聘人数</strong>：<?php echo $data['requireNum']; ?></td>
    	<td><strong>工作经验</strong>：<?php echo $data['experience']; ?></td>
  	</tr>
  	<tr>
  		<td><strong>学历</strong>：<?php echo $data['educational']; ?></td>
    	<td><strong>工作地点</strong>：<?php echo $data['address']; ?></td>
  	</tr>
  	<tr>
    	<td><strong>提供住宿</strong>：<?php echo $data['isHouse']; ?></td>
    	<td><strong>待遇</strong>：<?php echo $data['salary']; ?></td>
  	</tr>
  	<tr>
    	<td><strong>截止日期</strong>：<?php echo $data['lastTime']; ?></td><td></td>
  	</tr>
  	<tr>
    	<td colspan="2"><strong>职位描述及要求</strong>：<?php echo $data['content']; ?></td>
  	</tr>
  	<tr>
    	<td><strong>联系电话</strong>：<?php echo $data['telphone']; ?></td>
    	<td><strong>EMail</strong>：<?php echo $data['email']; ?></td>
  	</tr>
  	<tr>
    	<td colspan="2"><strong>发布日期</strong>：<?php echo $data['dtTime']; ?></td>
  	</tr>
  	<tr>
		<?php 
		if(URLREWRITE)
		{
		?>
    	<td colspan="2" align="right"><a href="<?php echo $tag['path.root']; ?>/<?php echo $tag['channel.menuname']; ?>/jobs_send_<?php echo $data['id']; ?>.html"><strong style="color:Green;">应聘此职位</strong></a></td>
		<?php 
		}
		else
		{
		?>
    	<td colspan="2" align="right"><a href="./?a=send&p=<?php echo $data['channelId']; ?>&r=<?php echo $data['id']; ?>"><strong style="color:Green;">应聘此职位</strong></a></td>
		<?php 
		}
		?>
  	</tr>
	</table>
	</ul>
</div>