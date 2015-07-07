<?php 
if(URLREWRITE) 
	$url="/".$tag['channel.menuName']."/poll_".$r.".html";
else
	$url="./?p=".$channelId."&a=view&r=".$r."&vtype=".$poll_cateaory['choice'];
?>
<form name="vote" method="post" action="<?php echo $url; ?>">
<table cellSpacing=0 cellPadding=0 width="100%" border=0>
<tbody>
<tr>
	<td align=left colSpan=2 height=20>&nbsp;<img src="<?php echo $tag['path.skin'];?>images/votemenu.gif">&nbsp;<?php echo $poll_cateaory['title']; ?></td>
</tr>
<?php
if($results)
{
	if($poll_cateaory['choice']=='a')
	{
		foreach($results as $data)
		{
		?>
		<tr><td align=left colSpan=2 height=20><input type="radio" name="choice" value="<?php echo $data['id']; ?>" <?php echo $data['isdefault']=='a'?checked:'';?>><?php echo $data['choice']; ?></td></tr>
		<?php
		}
	}
	else if($poll_cateaory['choice']=='b')
	{
		foreach($results as $data)
		{
		?>
		<tr><td align=left colSpan=2 height=20><input type="checkbox" name="choice[]" value="<?php echo $data['id']; ?>" <?php echo $data['isdefault']==a?checked:'';?>><?php echo $data['choice']; ?></td></tr>
		<?php
		}
	}
}
else
{
	echo '您的投票标题没有任何选项';
}
?>
<tr>
	<td align=middle height=30><input type="submit" value="投票"></td>
	<td align=middle><a href="<?php echo $url;?>" target="_blank">查看投票</a></td>
</tr>
</tbody>
</table>
</form>