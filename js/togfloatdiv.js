/* 代码整理：懒人之家 lanrenzhijia.com */
$(function(){
			$('#tog').toggle(function(){
				$(this).animate({top:'433px'},320).addClass("togclose").removeClass("tog").html('<span>close</span>');
				$('.tog_contact').slideDown(320);
			},function(){
				$(this).animate({top:'0px'},320).addClass("tog").removeClass("togclose").html('<span>创想电脑在线客服</span>');
				$('.tog_contact').slideUp(320);
			})
	$(".menu_l_list li:last").css({"background":"none"}); 
	$(".crumbNav em:last").css({"color":"#B10000","padding":"0"}); 
	$(".brea_tab th:last").css({"border-right":"none"}); 
	$(".serice_content .serice_list:last").css({"border-bottom":"none"}); 
})