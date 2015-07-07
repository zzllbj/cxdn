<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="<?php echo $tag['keywords']; ?>" />
<meta name="description" content="<?php echo $tag['description'];  ?>" />
<link rel="stylesheet" href="<?php echo get_skin_root(); ?>css/css.css" type="text/css" />
<link href="<?php echo get_skin_root();?>css/css.css" rel="stylesheet" type="text/css" />
<!-- css多级菜单的样式 start-->			
<link href="<?php echo get_skin_root();?>css/menu.css" type="text/css" rel="stylesheet" />
<!-- css多级菜单的样式 end -->
</head>
<body>
<div id="main">
	<div id="head">
		<a href="<?php echo get_root_path(); ?>/"><img src="<?php echo get_skin_root(); ?>images/logo.png" align="left" /></a>
		<ul id="navmenu-h">
			<li><a href="<?php echo get_root_path(); ?>/index.php">首页</a></li>
			<?php main_menu_extend('<ul>||</ul>','<li>||</li>','<li>||</li>');  ?>
		</ul>
	</div>
	<div id="wrap">
		<div id="banners">
			<img src="<?php echo get_skin_root(); ?>images/banner2.jpg" />
		</div>
		<div id="cleft">
			<img src="<?php echo get_skin_root(); ?>images/cleft_top.jpg" align="top" />
			<ul id="navmenu-v">
				<?php sub_menu_extend('<ul>||</ul>','<li>||</li>','<li>||</li>'); //id="subnav" ?>
			</ul>
		</div>
		<div id="cright">
			<span id="crtitle"><?php echo get_location(); ?></span>
			<div id="crs">				
			</div>
		</div>
	</div>
	<div id="bottom">
		<ul>
			<li><a href="<?php echo get_root_path(); ?>/">首页</a></li>
			<?php main_menu('<li>||</li>','<li>||</li>'); ?>
			<?php echo dt_rss(20,2,20); ?>
		</ul>
		<p>
			Copyright © 2010-2012 www.nmgzlt.com, All rights reserved.
			<a href="http://www.nmgzlt.com/"><img src="http://www.nmgzlt.com" width="80" height="15" alt="技术支持：扎鲁特创想电脑" style="border:0;" /></a>
		</p>
	</div>
</div>
</body>
</html>
