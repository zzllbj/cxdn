<?php
/*初始化参数
*  by grysoft (狗头巫师)
*  QQ:767912290
*  nav_main_custom 调用频道导航的样式标签
*
*  样式文件存于 index文件夹下 nav_main_custom_style.php 中。
*  第一参数：指定所调用样式文件 nav_main_custom_style.php 中style 的数值。
* 
*  如需要显示频道导航，在模板中加入 <?php nav_main_custom()?> 标签即可。
*  此标签内置一递增变量 $i ,以方便制作各种样式的菜单, 此变量可在此文件中任意地方调用。;
* 
*/
$select ='class="selt"';  //选中状态的样式，若无选中状态，可不添加。
$target ='target="_blank"'; //外链则弹出新窗口，如不需要弹出新窗口可清空此变量。

if($params['id']!=$data['id'])if(get_menu_info('id',true) != $data['id'])$select = '';
$target = $data['isExternalLinks']?$target:'';

/************** 样式正文 ************/
?>

<li> 
  <!--[if lte IE 6]><a href=""><table><tr><td><![endif]--> 
  <a href="<?=$url?>" <?=$target?> <?=$select?>><?=$data['title'];?></a>
  <ul class="second">
    <?php 
    /* 
    *  如需要频道导航显示子栏目菜单，将以下标签代码前的注释取消即可。 
    */
     nav_sub_custom($data['id'],0,0);
    ?>
  </ul>
  <!--[if lte IE 6]></td></tr></table></a><![endif]--> 
</li>