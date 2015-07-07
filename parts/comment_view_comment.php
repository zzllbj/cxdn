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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="description" content="扎鲁特旗鲁北镇创想电脑销售部" />
<meta name="keywords" content="扎鲁特旗鲁北镇创想电脑销售部" />
<title><?php echo $moduleTitle ?></title>
<style>
<!--
body{ font-size:12px;}
.alrelbtn{ border:0; width:80px; height:19px; background:url(<?php echo $tag['path.root']; ?>/inc/img/comment/alrele.png) no-repeat; cursor:pointer;}
.alrelbtnover{ border:0; width:80px; height:19px; background:url(<?php echo $tag['path.root']; ?>/inc/img/comment/alrele2.png) no-repeat; cursor:pointer;}
.info{ width:98%; padding:3px 0 0 0;}
.info span{ float:left; display:block;}
.info .wen{ padding:5px 0 0 8px;}
.info .rele{ float:right;}
.relbtn{ border:0; width:68px; height:19px; background:url(<?php echo $tag['path.root']; ?>/inc/img/comment/rele.png) no-repeat; cursor:pointer;}
.relbtnover{ border:0; width:68px; height:19px; background:url(<?php echo $tag['path.root']; ?>/inc/img/comment/rele2.png) no-repeat; cursor:pointer;}
.cont{ width:99%; background:rgba(255,255,255,0.15);}
#cont{ width:100%; color:#00FF00;}
.titles{ font-size:16px; font-weight:bold;}
/*-----头部-----*/
#alrtop{ width:812px; margin:0 auto; border:1px solid #ccc; border-bottom:none; height:80px; padding:0 0 0 15px; background:#F8FCFF;}
#alrtop div{ width:780px; height:62px; border-bottom:1px dashed #ccc; padding:8px 0 0 0;}
/*-----底部-----*/
#alrbot{ width:812px; margin:0 auto; border:1px solid #ccc; border-top:none; height:100px; font-family:Arial; background:#F8FCFF;}
#alrbot a{ color:#2487CA; text-decoration:none;}
#alrbot a:hover{ text-decoration:underline;}
#alrbot p{ background:#f4f4f4; padding:0; margin:0; width:100%; height:45px;}
#alrbot p img{ margin:3px 0 0 10px;}
#alrbot .alrt{ margin-top:10px; padding:25px 0 0 0; height:20px;}
-->
</style>
</head>
<body>
<?php
$sourceUrl = null;
if($r>0)
{
	$sourceUrl = './?p='.$p.'&a=view&r='.$r;
}else{
	$sourceUrl = './?p='.$p;
}
?>
<table border="0" align="center" cellpadding="0" cellspacing="0" id="alrtop">
<tr>
<td>
<div></div>
</td>
</tr>
</table>
<table width="800px" border="0" align="center" cellpadding="0" cellspacing="0" style="font-size:12px; border-left:1px solid #ccc; border-right:1px solid #ccc; padding:0 5px">
<tr>
<td>
	<table width="800px" border="0" align="center" cellpadding="0" cellspacing="0">
	  <tr>
	    <td><img src="<?php echo $tag['path.root']; ?>/inc/img/comment/comment.gif" /></td>
	    <td align="left" class="titles">话题：<?php echo $moduleTitle; ?></td>
		<td align="right"><a target="_blank" href="<?php echo $sourceUrl; ?>">查看原文</a></td>
	  </tr>
	</table>
	<?php
	if(!empty($tag['data.results']))
	{
		?>
	<table width="800px" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#F8FCFF;">
		<?php
		foreach($tag['data.results'] as $data)
		{
			?>
  			<tr bgcolor="#e2e2e2" height="26">
   			<td>&nbsp;
			<?php 
			if(intval($data['memberId'])==0)
				echo '昵称:游客  '.$data['name'];
			else
				echo '昵称:会员  '.$data['nickname'];
			?>
			</td>
			<td>IP:<?php $ipArr=explode('.',$data['ip']);$ipArrLen=count($ipArr); for($i=0;$i<$ipArrLen;$i++){if($i<2)echo $ipArr[$i].'.';else echo '*.';} ?></td>
    		<td align="right"><?php echo $data['dtTime']  ?>发表&nbsp;&nbsp;</td>
  			</tr>
  			<tr>
    		<td colspan="3" style="padding:6px">&nbsp;&nbsp;<?php echo $data['content']; ?></td>
  			</tr>
  			<tr height="24" style="padding:5px 8px 3px 8px; background:url(<?php echo $tag['path.root']; ?>/inc/img/comment/trbg.png) repeat-x top">
  			<?php 
			if(!empty($tag['data.other']['username']) || $tag['data.other']['userlevel']>=8)
			{
				if(!empty($comment_mdtp) && !empty($mdtp))
					$tempMdt='&mdtp='.$mdtp.'&comment_mdtp='.$comment_mdtp;
				if(!empty($comment_mdtp))
					$tempMdt='&comment_mdtp='.$comment_mdtp;
				
				if($data['auditing'] == '1')
				{
					if($r==0)
					{
					?>
					<td colspan="2">&nbsp;&nbsp;<a href="./?p=<?php echo $p; ?>&a=destroycomment&comment=<?php echo $data['id'].$tempMdt; ?>">删除</a>&nbsp;|&nbsp;<font color="Blue">已审核</font></td><td align="right"><a href="mailto:<?php echo $data['email']; ?>">邮件回复</a></td>
					<?php
					}else{
					?>
					<td colspan="2">&nbsp;&nbsp;<a href="./?p=<?php echo $p; ?>&a=destroycomment&r=<?php echo $r; ?>&comment=<?php echo $data['id'].$tempMdt; ?>">删除</a>&nbsp;|&nbsp;<font color="Blue">已审核</font></td><td align="right"><a href="mailto:<?php echo $data['email'];  ?>">邮件回复</a></td>
					<?php
					}
				}
				else 
				{
					if($r==0)
					{
					?>
					<td colspan="2">&nbsp;&nbsp;<a href="./?p=<?php echo $p; ?>&a=destroycomment&comment=<?php echo $data['id'].$tempMdt; ?>">删除</a>&nbsp;|&nbsp;<a href="./?p=<?php echo $p; ?>&a=auditingcomment&comment=<?php echo $data['id'].$tempMdt; ?>">审核</a></td><td align="right"><a href="mailto:<?php echo $data['email'];  ?>">邮件回复</a></td>
					<?php
					}else{
					?>
					<td colspan="2">&nbsp;&nbsp;<a href="./?p=<?php echo $p; ?>&a=destroycomment&r=<?php echo $r; ?>&comment=<?php echo $data['id'].$tempMdt; ?>">删除</a>&nbsp;|&nbsp;<a href="./?p=<?php echo $p; ?>&a=auditingcomment&r=<?php echo $r; ?>&comment=<?php echo $data['id'].$tempMdt; ?>">审核</a></td><td align="right"><a href="mailto:<?php echo $data['email'];?>">邮件回复</a></td>
					<?php	
					}
				}		 
			}
			else
			{
				?>
				<td align="right" colspan="3"><a href="mailto:<?php echo $data['email']; ?>">邮件回复</a>&nbsp;&nbsp;</td>
				<?php
			}
  			?>
  			</tr>
			<?php
		}
		?>
	</table>
	<div class="pager"><?php if(!empty($tag['pager.cn'])) echo $tag['pager.cn'];?></div>
		<?php
	}

	if(URLREWRITE){
		$action= '/'.$tag['channel.menuname'].'/action_submitcomment_'.$r.'.html';
	}else{
		$action= './?p='.$p.'&a=submitcomment&r='.$r;
	}
	?>
	<form action="<?php echo $action;?>" method="post">
	<table width="800px" border="0" align="center" cellpadding="0" cellspacing="0" style="background:#F8FCFF;">
	  <tr>
	    <td colspan="8" height="2px"></td>
	  </tr>
	  <tr>
	    <td colspan="8"><textarea name="content" style="border:1px #ccc solid;" class="cont" cols="80%" rows="8"></textarea></td>
	  </tr>
	  <tr>
	    <td colspan="8" height="2px"></td>
	  </tr>
	  <tr>
	    <td>
			<div class="info">
				<span class="wen">昵称：</span>
				<span><input style="width:60px; height:19px; border:1px #ccc solid;" name="name" type="text"></span>
				<span class="wen">email：</span>
				<span><input style="width:60px; height:19px; border:1px #ccc solid;" name="email" type="text"></span>
				<span class="wen">主页：</span>
				<span><input style="width:60px; height:19px; border:1px #ccc solid;" name="homepage" type="text"></span>
                <span class="wen">验证码：</span>
                <span><input style="width:60px; height:19px; border:1px #ccc solid;" name="checkcode" type="text"></span>
                <span><img src="<?php echo $tag['path.root']; ?>/inc/verifycode.php"></span>
				<span class="rele"><input name="submit" class="relbtn" value="" type="submit" onmouseover="this.className='relbtnover'" onmouseout="this.className='relbtn'" /></span>
			</div>
		</td>
	  </tr>
	</table>
	</form>
</td>
</tr>
</table>
<table border="0" align="center" cellpadding="0" cellspacing="0" id="alrbot"><tr><td>
	<p align="center" class="alrt">扎鲁特旗创想电脑</p>
</td></tr></table>
</body>
</html>
