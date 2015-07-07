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
<?php $data=$tag['data.row'];?>
<style>
#preview { width:594px; }
#preview_wrap { padding:22px; width:550px; height:400px; background:url('<?php echo $tag['path.skin']; ?>res/images/bg_preview.gif') top left no-repeat;
}
#preview_outer { overflow: hidden; width: 550px; height: 400px; position: relative; }
#preview_inner { text-align: left; height: 100%; position: relative; }
#preview_inner div { float: left; width: 550px; height: 400px; position: relative; }
#preview_inner div a { position: absolute; bottom: 0; left: 0; display: block; width: 100%;);
text-decoration: none; font-size: 18px; }
#thumbs { padding:15px 22px 0 22px; position: relative; width:550px; text-align: center; }
#thumbs img { width:50px; height:50px; }
#thumbs span { padding: 12px; width: 50px; height: 50px; cursor: pointer; background: url('<?php echo $tag['path.skin']; ?>res/images/bg_thumb.gif') top left no-repeat;
display: inline-block; }
#arrow { position: absolute; top: -13px; background: url('<?php echo $tag['path.skin']; ?>res/images/bg_arrow.gif') top center no-repeat;
width: 74px; height: 39px; display: none; }
</style>
<link rel="stylesheet" href="<?php echo $tag['path.skin']; ?>res/css/parts.css" type="text/css"/>
<script type="text/javascript" src="<?php echo $tag['path.skin']; ?>res/js/jquery.min.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
			// Save  the jQuery objects for later use.
			var outer		= $("#preview_outer");
			var arrow		= $("#arrow");
			var thumbs		= $("#thumbs span");

			var preview_pos;
			var preview_els	= $("#preview_inner div");
			var image_width	= preview_els.eq(0).width(); // Get width of imaages
			
			// Hook up the click event
			thumbs.click(function() {
				// Get position of current image
				preview_pos = preview_els.eq( thumbs.index( this) ).position();

				// Animate them!
				outer.stop().animate( {'scrollLeft' : preview_pos.left},	500 );
				arrow.stop().animate( {'left' : $(this).position().left },	500 );
			});

			// Reset positions on load
			arrow.css( {'left' : thumbs.eq(0).position().left } ).show();
			outer.animate( {'scrollLeft' : 0}, 0 );

			// Set initial width
			$("#preview_inner").css('width', preview_els.length * image_width);
		});
</script>
<div id="preview">
  <div id="preview_wrap">
    <div id="preview_outer">
      <div id="preview_inner">
        <?php 
			$originalPic = explode('|',$data['originalPic']);
			$middlePic   = explode('|',$data['middlePic']);
			$smallPic    = explode('|',$data['smallPic']);
			for($i=0;$i<count($originalPic);$i++)
			{
		  ?>
        <div><a href="<?php echo ispic($originalPic[$i])?>"><img src="<?php echo ispic($middlePic[$i])?>"/></a></div>
        <?php
		    }?>
      </div>
    </div>
  </div>
  <div id="thumbs">
    <div id="arrow"></div>
    <?php 
	for($i=0;$i<count($smallPic);$i++)
	{
	?>
    <span><img src="<?php echo  ispic($smallPic[$i])?>"/></span>
    <?php
	}?>
  </div>
  <p><?php echo $data['content']; ?></p>
  <div class="endPageNum">
    <table align="center">
      <tr>
        <td><?php echo $data['navbar'];?></td>
      </tr>
    </table>
  </div>
</div>
