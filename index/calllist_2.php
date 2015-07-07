<tr>
	<td width="100%">
	<table width="100%">
		<tr>
			<td height="1" colspan="2" background="<?php echo $tag['path.skin']; ?>images/line_bg01.gif"></td>
		</tr>
		<tr>   
			<td height="23" align="left" width="80%">
				<img src="<?php echo $tag['path.skin']; ?>images/icon_dot01.gif" />
			    <a href="<?php echo sys_href($data['channelId'],'list',$data['id'])?>">
					<?php echo $data['channelName']; ?>&nbsp;&nbsp;<?php echo $data['title'];?>
				</a>
			</td> 
			<td width="20%"> <?php echo date('[Y-m-d]',strtotime($data['dtTime'])); ?></td> 
		</tr>
	</table>
	</td>  
</tr>