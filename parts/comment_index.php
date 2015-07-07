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
$p=$request['p'];
$r=$request['r'];
$mdtp=$request['mdtp'];
$comment_mdtp=intval($request['comment_mdtp']);
?>
<style>
<!--
.alrelbtn{ border:0; width:80px; height:19px; background:url(<?php echo $tag['path.root']; ?>/inc/img/comment/alrele.png) no-repeat; cursor:pointer;}
.alrelbtnover{ border:0; width:80px; height:19px; background:url(<?php echo $tag['path.root']; ?>/inc/img/comment/alrele2.png) no-repeat; cursor:pointer;}
.info{ width:98%; height:100%; padding:3px 0 0 0;}
.info span{ float:left; display:block;}
.info .wen{ padding:0px 0 0 0px;}
.info .rele{ float:right;}
.relbtn{ border:0; width:68px; height:19px; background:url(<?php echo $tag['path.root']; ?>/inc/img/comment/rele.png) no-repeat; cursor:pointer;}
.relbtnover{ border:0; width:68px; height:19px; background:url(<?php echo $tag['path.root']; ?>/inc/img/comment/rele2.png) no-repeat; cursor:pointer;}
.cont{ width:99%; background:rgba(255,255,255,0.15);}
-->
</style>
<a name="commentPosition"></a>
<?php
if(URLREWRITE){
	if($r>0)
		$comment_url = '/'.$tag['channel.menuname'].'/comment_'.$r.'.html';
	else
		$comment_url = '/'.$tag['channel.menuname'].'/comment_0.html';
}else{
	if($r>0)
		$comment_url = './?p='.$p.'&a=view_comment'.'&r='.$r;
	else
		$comment_url = './?p='.$p.'&a=view_comment';
}
?>
<table width="97%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td style="padding:0 0 0 4px"><img src="<?php echo $tag['path.root']; ?>/inc/img/comment/comment.gif" /></td>
    <td align="right" style="padding:0 15px 0 0"><input name="button" class="alrelbtn" onmouseover="this.className='alrelbtnover'" onmouseout="this.className='alrelbtn'" type="button" onclick="window.open('<?php echo $comment_url?>','_blank');" value="" /></td>
  </tr>
</table>
<?php 
if($comment_mdtp>0 && $mdtp>0)
	$tempMdt='&mdtp='.$mdtp.'&comment_mdtp='.$comment_mdtp;
elseif($comment_mdtp>0 && $mdtp==0)
	$tempMdt='&comment_mdtp='.$comment_mdtp;
elseif($comment_mdtp==0 && $mdtp>0)
	$tempMdt='&mdtp='.$mdtp;
else
	$tempMdt='&mdtp=0&comment_mdtp=0';

if(URLREWRITE){
	$action= '/'.$tag['channel.menuname'].'/action_submitcomment_'.$r.'.html';
}else{
	$action= './?p='.$p.'&a=submitcomment&r='.$r.($r?$tempMdt:'');
}
?>
<form action="<?php echo $action;?>" method="post">
<table width="95%" border="0" cellpadding="0" cellspacing="0">
  <tr><td height="2px"></td></tr> 
  <tr><td style="padding:0 0 0 5px"><textarea name="content" style="border:1px #666 solid;" class="cont" cols="80%" rows="8"></textarea></td> </tr>
  <tr><td height="2px"></td></tr>
  <tr>
  	<td>
		<div class="info">
			<span class="wen">昵称：</span>
			<span><input style="width:90px; height:24px; border:1px #ccc solid;" name="name" type="text"></span>
			<span class="wen">email：</span>
			<span><input style="width:120px; height:24px; border:1px #ccc solid;" name="email" type="text"></span>
			<span class="wen">主页：</span>
			<span><input style="width:120px; height:24px; border:1px #ccc solid;" name="homepage" type="text"></span>
           		<span class="wen">验证码：</span>
			<span><input style="width:80px; height:24px; border:1px #ccc solid;" name="checkcode" type="text"></span>
            		<span><img src="<?php echo $tag['path.root']; ?>/inc/verifycode.php"></span>
			<span class="rele"><input name="submit" class="relbtn" value="" type="submit" onmouseover="this.className='relbtnover'" onmouseout="this.className='relbtn'" /></span>
		</div>
	</td>
  </tr>
</table>
 </form>
<?php 
if(!empty($tag['data.results']))
{
	?>
	<table width="97%" border="0" cellpadding="0" cellspacing="0" style="margin:0 0 0 6px">
	<?php
	foreach($tag['data.results'] as $data)
	{
		?>			
  		<tr height="26" style=" background:rgba(230,230,230,0.40);">
   		<td style=" width:35%;">&nbsp;
		<?php 
		if(intval($data['memberId'])==0)
			echo '昵称:游客  '.$data['name'];
		else
			echo '昵称:会员  '.$data['nickname'];
		?>
		</td>
		<td style=" width:25%;">IP:<?php $ipArr=explode('.',$data['ip']);$ipArrLen=count($ipArr); for($i=0;$i<$ipArrLen;$i++){if($i<2)echo $ipArr[$i].'.';else echo '*.';} ?></td>
    	<td align="left" width="50%" ><?php echo $data['dtTime']  ?>发表&nbsp;&nbsp;</td>
  		</tr>
		<hr style="margin:2px 0 2px 0; height:2px; border:none; border-top:2px dashed #ffffff;" />
  		<tr style=" background:rgba(230,230,230,0.40)">
    	<td colspan="3" style="padding:6px">&nbsp;&nbsp;<?php echo $data['content']; ?></td>
  		</tr>
  		<tr height="24" style="padding:0 8px 3px 8px; background:url(<?php echo $tag['path.root']; ?>/inc/img/comment/trbg.png) repeat-x top">
  		<?php
		if(!empty($tag['data.other']['username']) || $tag['data.other']['userlevel']>=8)
		{
			if($comment_mdtp>0 && $mdtp>0)
				$tempMdt='&mdtp='.$mdtp.'&comment_mdtp='.$comment_mdtp;
			else
				$tempMdt='&comment_mdtp='.$comment_mdtp;
				
			if($data['auditing'] == '1')
			{
				if($r==0)
				{
				?>
				<td colspan="2">&nbsp;&nbsp;<a href="./?p=<?php echo $p; ?>&a=destroycomment&comment=<?php echo $data['id'].$tempMdt; ?>">删除</a>&nbsp;|&nbsp;<font color="Blue">已审核</font></td><td align="right"><a href="mailto:<?php echo $data['email'];  ?>">邮件回复</a></td>
				<?php
				}else{
				?>
				<td colspan="2">&nbsp;&nbsp;<a href="./?p=<?php echo $p; ?>&a=destroycomment&r=<?php echo $r; ?>&comment=<?php echo $data['id'].$tempMdt; ?>">删除</a>&nbsp;|&nbsp;<font color="Blue">已审核</font></td><td align="right"><a href="mailto:<?php echo $data['email']; ?>">邮件回复</a></td>
				<?php
				}
			}
			else 
			{
				if($r==0)
				{
				?>
				<td colspan="2">&nbsp;&nbsp;<a href="./?p=<?php echo $p; ?>&a=destroycomment&comment=<?php echo $data['id'].$tempMdt; ?>">删除</a>&nbsp;|&nbsp;<a href="./?p=<?php echo $p ?>&a=auditingcomment&comment=<?php echo $data['id'].$tempMdt; ?>">审核</a></td><td align="right"><a href="mailto:<?php echo $data['email'];?>">邮件回复</a></td>
				<?php
				}else {
				?>
				<td colspan="2">&nbsp;&nbsp;<a href="./?p=<?php echo $p; ?>&a=destroycomment&r=<?php echo $r; ?>&comment=<?php echo $data['id'].$tempMdt; ?>">删除</a>&nbsp;|&nbsp;<a href="./?p=<?php echo $p; ?>&a=auditingcomment&r=<?php echo $r; ?>&comment=<?php echo $data['id'].$tempMdt;?>">审核</a></td><td align="right"><a href="mailto:<?php echo $data['email'];?>">邮件回复</a></td>
				<?php	
				}
			}		 
		}
		else
		{
			?>
			<td align="right" colspan="3"><a href="mailto:<?php echo $data['email'];?>">邮件回复</a>&nbsp;&nbsp;</td>
			<?php
		}
  		?>
  		</tr>
		<?php
	}
	?>
	</table>
	<div class="pager"><?php if(!empty($tag['pager.cn'])) echo $tag['pager.cn']; ?></div>
	<?php
}
?>
