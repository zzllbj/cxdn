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
<ul>
<?php
if(!empty($tag['data.results']))
{
	foreach($tag['data.results'] as $k=>$data)
	{
		?>
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
	    <td><strong>工作地点</strong>：<?php echo $data['address']; ?></td>
	    <td><strong>待遇</strong>：<?php echo $data['salary']; ?></td>
	  	</tr>
	  	<tr>
	    <td><strong>联系电话</strong>：<?php echo $data['telphone']; ?></td>
	    <td><strong>EMail</strong>：<?php echo $data['email']; ?></td>
	  	</tr>
	  	<tr>
	    <td ><strong>发布日期</strong>：<?php echo $data['dtTime']; ?></td>
	    <td><strong>截止日期</strong>：<?php echo $data['lastTime']; ?></td>
	  	</tr>
	  	<tr>
        <td colspan="2" align="right">
        <a href="<?php echo sys_href($data['channelId'],'view',$data['id'])?>"><strong style="color:Green;">详情</strong></a> 
        <a href="<?php echo sys_href($data['channelId'],'job_send',$data['id'])?>"><strong style="color:Green;">应聘此职位</strong></a></td>
      </tr>
		</table>
		<?php
	}
	?>
	<div id="articeBottom">
		<div id="apartPage"><?php if(!empty($tag['pager.cn']))echo $tag['pager.cn']; ?></div>
	</div>
	<?php
}
else
{
	echo '暂无招聘。';
}
?>
</ul>
</div>