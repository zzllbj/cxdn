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
<style>
.probox { padding-left:400px; position:relative; height:332px;}
.pro_img { width:0px; display:inline-table; text-align:center; position:absolute; left:0; top:17px; }
.pro_txt { padding:30px 0 0 0; }
.pro_txt p { height:30px; line-height:25px; }
.pro_txt h2 { font-weight:bold; line-height:20px; }
.pro_txt div { line-height:20px; border:1px solid #ddd; padding:6px; background:#e69111;width:80px; }
.main1box { margin-bottom:10px; }
#main1 ul { display:none; }
#main1 ul li { display:inline-block; _display:inline; position:relative; margin:0 auto; }
#main1 ul.block { display:block; }
.menu1box { }
#menu1 li { display:inline; cursor:pointer; }
#menu1 li img { border:1px solid #ccc; width:50px; height:50px;}
#menu1 li.hover img { border:1px solid #669900; }
.jqzoom { border:1px solid black; float:left; position:relative; padding:0px; cursor:pointer; }
.jqzoom img { float:left; }
div.zoomdiv { z-index:100; position:absolute; top:0px; left:355px; width:200px; height:200px; background:#ffffff; border:1px solid #CCCCCC; display:none; text-align:center; overflow:hidden; }
div.jqZoomPup { z-index:10; visibility:hidden; position:absolute; top:0px; left:0px; width:50px; height:50px; border:1px solid #aaa; background:#ffffff url(<?php echo $tag['path.skin'];?>res/images/zoom.gif) 50% top no-repeat; opacity:0.5; -moz-opacity:0.5; -khtml-opacity:0.5; filter:alpha(Opacity=50); }
/*分页*/
.endPageNum { clear:both; font-size:12px; text-align:center; font-family:"微软雅黑","宋体"; }
.endPageNum table { margin:auto; }
.endPageNum .s1 { width:52px; }
.endPageNum .s2 { background:#1f3a87; border:1px solid #ccc; color:#fff; font-weight:bold; }
.endPageNum a.s2:visited { color:#fff; }
.endPageNum a { padding:2px 5px; margin:5px 4px 0 0; color:#1F3A87; background:#fff; display:inline-table; border:1px solid #ccc; float:left; }
.endPageNum a:visited { color:#1f3a87; }
.endPageNum a:hover { color:#fff; background:#1f3a87; border:1px solid #1f3a87; float:left; text-decoration:underline; }
.endPageNum .s3 { cursor:default; padding:2px 5px; margin:5px 4px 0 0; color:#ccc; background:#fff; display:inline-table; border:1px solid #ccc; float:left; }
</style>
<script type="text/javascript" src="<?php echo $tag['path.skin'];?>res/js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="<?php echo $tag['path.skin'];?>res/js/jquery.jqprint-0.3.js"></script>
<script type="text/javascript" src="<?php echo $tag['path.skin'];?>res/js/jquery.jqzoom.js"></script>
<script>
$(document).ready(function(){
$(".main li").jqueryzoom({
	xzoom: 300,
	yzoom: 300,
	offset: 10,
	position: "right",
	preload:1,
	lens:1
});
});
function setTab(m,n){
var tli=document.getElementById("menu"+m).getElementsByTagName("li");
var mli=document.getElementById("main"+m).getElementsByTagName("ul");
for(i=0;i<tli.length;i++){
   tli[i].className=i==n?"hover":"";
   mli[i].style.display=i==n?"block":"none";
}
}
</script>
<script language="javascript">
function printing(tb)
{
 var nw = window.open('','','width=800,height=600')
 nw.document.open("text/html","utf-8")
 nw.document.write("<object classid='CLSID:8856F961-340A-11D0-A96B-00C04FD705A2' id='wb' height='0' width='0'></object>")
 nw.document.write(document.getElementById(tb).outerHTML)
 nw.document.write("<scrip"+"t>document.all.wb.ExecWB(7,1)</sc"+"ript>")
}
</script>
<script language="javascript">
function  phpprint(){
$("#prt").jqprint();
}
</script>
<div id=prt>
<?php 
//2011-09-10
$data=$tag['data.row'];
?>

<div class="probox">
  <div class="pro_img">
    <div class="main1box">
      <div class="main" id="main1">
        <?php 
			$originalPic = explode('|',$data['originalPic']);
			$middlePic   = explode('|',$data['middlePic']);
			$smallPic    = explode('|',$data['smallPic']);
			for($i=0;$i<count($originalPic);$i++)
			{
		  ?>
        <ul<?php echo !$i?' class="block"':''?>>
          <li><img src="<?php echo ispic($middlePic[$i])?>" jqimg="<?php echo ispic($originalPic[$i])?>" width="360" height="270"/></li>
        </ul>
        <?php
		    }?>
      </div>
    </div>
    <div class="menu1box">
      <ul id="menu1">
        <?php 
		for($i=0;$i<count($smallPic);$i++)
		{
		?>
        <li onmouseover="setTab(1,<?php echo $i;?>)"><img src="<?php echo  ispic($smallPic[$i])?>" /></li>
        <?php
		}?>
      </ul>
    </div>
  </div>
  <div class="pro_txt">
    <h2><?php echo $data['title']; ?></h2>
    <p>型号：<?php echo $data['sn']; ?></p>
    <p>规格：<?php echo $data['spec']; ?></p>
    <p>市场价：<?php echo $data['sellingPrice']; ?></p>
    <p>优惠价：<?php echo $data['preferPrice']; ?></p>
    <div>产品简介: <?php echo $data['description']; ?></div>
  </div>
</div>
 <div class="clear" style="height:10px;"></div>
<div style="margin:20px;"> 
  <p class="prodetails"><?php echo $data['content']; ?></p>
  <div class="endPageNum">
    <table align="center">
      <tr>
        <td><?php echo $data['navbar'];?>
          </td>
      </tr>
    </table>
</div>
</div>
</div>
  <p class="prodetails">点击数：<?php echo $data['counts']; ?> 录入时间：<?php echo $data['dtTime']; ?>【<a href="javascript:phpprint()">打印此页</a>】【<a href="javascript:history.back(1)">返回</a>】</p>
<?php unset($data);?>
