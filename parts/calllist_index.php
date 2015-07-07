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
/*<!--
#pagelist { padding:0;width:95%; font-size:12px; list-style-type:none; margin-left:20px; margin-bottom:10px;}
#pagelist li {width:95%; height:30px; }
#pagelist li a .lbt {display:block; width:72%; float:left; text-indent:20px; text-decoration:none; white-space:nowrap; text-overflow:ellipsis; overflow: hidden; display:inline;}
#pagelist li a .ldt { font:12px Arial;display:block; width:125px; float:right; text-align:center; color:#069; text-decoration:none; display:inline; margin-top:7px;}
#pagelist li a {width:95%; height:30px; display:block; line-height:30px; color:#000000; text-decoration:none; cursor:hand;  border-bottom:1px #ccc dashed; overflow:hidden;}
#pagelist li a:hover{ color:#3ac3cf; text-decoration:none; border-bottom:1px #96f dashed;}
#pagelist li a:hover .ldt {color:#03c;}
#pagelist h2{ font: bold 20px Arial;font-family:"微软雅黑","宋体"; padding-bottom: 6px;border-bottom: 1px solid #999;margin-top:10px; text-decoration: none;color: #369;zoom:1;} 
#pagelist a:hover h2{ font: bold 20px Arial;padding-bottom: 4px; margin-top:10px; text-decoration: none;zoom:1;}
.clear{ clear:both;}
-->
*/
</style>
<ul id="pagelist">
<?php 
if(!empty($tag['data.results']))
{
	foreach($tag['data.results'] as $kk=>$vv)
	{
		$channelId	= $vv['channelId']; //栏目id 
		$channel	= $vv['channel'];   //栏目中文名
		$results	= $vv['results'];   //列表数据
		if(!empty($results))
		{
		?>
			<a href="<?php echo sys_href($channelId)?>"><h2><?php echo $channel; ?></h2></a>
			<?php 
			foreach ($results as $k=>$data)
			{
			?>
			 <div>
				<li><a href="<?php echo sys_href($data['channelId'],'list',$data['id'])?>" title="<?php echo $v['title']; ?>">
					 <span class ="lbt"><?php echo $data['title']; ?></span>
					 <span class= "ldt"><?php echo date('Y-m-d',strtotime($data['dtTime'])); ?></span>
					</a>
				</li>
			 </div>      
			<?php	
			}
		}
	}
}			
?>
</ul>
<div class="clear"></div>
