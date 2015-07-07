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
/*Add on 2007-07-05*/
.webSearch1 a{font-size: 12px; color: #0000FF; text-decoration: underline;}
.webSearch2 a{font-size: 12px; color: #009900; text-decoration: underline;}
.webContent {font-size: 12px; text-decoration: none;}
<!--
@import"<?php echo $tag['path.skin'];?>res/css/parts.css";
-->
</style>
<div id="stuffbox">
<?php
	if(!empty($tag['data.results']))
	{
		$keyword=urldecode($request['keyword']);
		$request['i'] = $request['i'] ? $request['i'] : 1;
		$temResult = array_slice($tag['data.results'],($request['i']-1)*10,10,true);
		foreach($temResult as $data)
		{
			if(!empty($data['title'])){
				$data['title']=get_keyword_str($data['title'],$keyword,30);
			}else{
				$data['title']=get_keyword_str($data['content'],$keyword,30);
			}
			if(!empty($data['content'])){
				$data['content']=get_keyword_str($data['content'],$keyword,100);
			}
			?>
			<table border="0" cellpadding="0" cellspacing="0">
			<tr>
			<?php
			$tempTypeArr=array('jobs','article','tour');
			if(in_array($data['type'],$tempTypeArr))
			{
					?>
					<td><span class="webSearch1"><a target="_blank" href="<?php echo sys_href($data['p'])?>"><?php echo $data['title']; ?></a></span></td>
					<?php
			}
			elseif($data['type'] == 'linkers')
			{
					?>
					<td><span class="webSearch1"><a target="_blank" href="<?php echo './?p='.$data['p'].'&r='.$data['id']; ?>"><?php echo $data['title']; ?></a></span></td>
					<?php 
			}
			else
			{
			    	?>
					<td><span class="webSearch1"><a target="_blank" href="<?php echo sys_href($data['p'],'search',$data['id'])?>"><?php echo $data['title']; ?></a></span></td>
					<?php
			}
			?>
			</tr>
			<tr>
			<td class="webContent"><?php echo $data['content']; ?></td>
			</tr>
			<tr>
			<?php 
			if(in_array($data['type'],$tempTypeArr))
			{
				?>
				<td><?php echo $data['dtTime']; ?>&nbsp;&nbsp;<span class="webSearch2"><a target="_blank" href="<?php echo sys_href($data['menuName'])?>">快速链接</a></span></td>
				<?php 
			}elseif($data['type'] == 'linkers'){
				?>
				<td><?php echo $data['dtTime']; ?>&nbsp;&nbsp;<span class="webSearch2"><a target="_blank" href="<?php echo '/?p='.$data['p'].'&r='.$data['id']; ?>">快速链接</a></span></td>
				<?php 
			}else{
				?>
				<td><?php echo $data['dtTime']; ?>&nbsp;&nbsp;<span class="webSearch2"><a target="_blank" href="<?php echo sys_href($data['p'],'search',$data['id'])?>">快速链接</a></span></td>
				<?php 
			}
			?>
			</tr>			
			</table>
			<br />
			<?php
		}
		echo $tag['pager.cn']	;
	}
	else
	{
		echo '对不起！没有找到相关内容！';
	}

?>
</div>