<script type="text/javascript" src="<?php echo $myfocus_js;?>"></script><!--引入myFocus库--> 
<script type="text/javascript" src="<?php echo $pattern_js;?>"></script><!--引入风格应用js--> 
<link id="mf-css" rel="stylesheet" href="<?php echo $pattern_css;?>" /><!--引入风格应用css--> 
<script type="text/javascript">
myFocus.set({
    id:'<?php echo $data['boxId'];?>',//焦点图盒子ID
    pattern:'<?php echo $data['pattern'];?>',//风格应用的名称
    time:<?php echo $data['times'];?>,//切换时间间隔(秒)，省略设置即不自动切换
    trigger:'<?php echo $data['adTrigger'];?>',//触发切换模式:'click'(点击)/'mouseover'(悬停)，默认'click'
    width:<?php echo $data['width'];?>,//设置宽度(主图区)
    height:<?php echo $data['height'];?>,//设置高度(主图区)
    txtHeight:'<?php echo $data['txtHeight'];?>'//文字层高度设置,'default'为默认高度，0为隐藏，默认'default'
});
</script>
  <div id="<?php echo $data['boxId'];?>" class="<?php echo $data['pattern'];?>"><!--焦点图盒子--> 
		<div class="loading"><span>请稍候... </span></div>
		<!--载入画面--> 
		<ul class="pic">
      <!--内容列表--> 
      <?php
      foreach($flash['results'] as $data)
	  {
	 ?>
       <li><a href="<?php echo $data['url'];?>" target="_blank"><img src="<?php echo $data['picpath'];?>" thumb="" alt="<?php echo $data['title'];?>" text="<?php echo $data['summary'];?>" /></a></li>
     <?php 
	  }
	  ?> 
      </ul>
  </div>

