/*
* myFocus JavaScript Library v2.0.0 beta
* Open source under the BSD & GPL License.
* 
* @Author  koen_lee@qq.com
* @Blog    http://cosmissy.com/blog/
* 
* @Date    2012/04/28
*/
(function(){
	var Base={
		defConfig:{//全局默认设置
			pattern:'mF_fscreen_tb',//风格样式
			trigger:'click',//触发切换模式['click'(鼠标点击)|'mouseover'(鼠标悬停)]
			txtHeight:'default',//文字层高度设置[num(数字,单位像素,0表示隐藏文字层,省略设置即为默认高度)]
			wrap:true,//是否保留边框(有的话)[true|false]
			auto:true,//是否自动播放(切换)[true|false]
			time:4,//每次停留时间[num(数字,单位秒)]
			index:0,//开始显示的图片序号(从0算起)[num(数字)]
			loadIMGTimeout:5,//载入图片的最长等待时间(Loading画面时间)[num(数字,单位秒,0表示不等待直接播放)]
			delay:100,//触发切换模式中'mouseover'模式下的切换延迟[num(数字,单位毫秒)]
			autoZoom:false,//是否允许图片自动缩放居中[true|false]
			__focusConstr__:true//程序构造参数
		},
		constr:function(settings){//构造函数
			var e=settings.__focusConstr__?$id(settings.id):settings;
			if(e instanceof myFocus.constr) return e;//myFocus::[]
			if(!e||(e.sort&&!e.length)||(e.item&&!e.length)){//null/array/nodeList
				Array.prototype.push.call(this);
				return this;
			}
			var len=e.length;
			this.length = 0;
		  	if(len){//包括字符串
				for(var i=0;i<len;i++) Array.prototype.push.call(this,e[i]);
			}else{//myFocus
				Array.prototype.push.call(this,e);
				this.settings=settings;
				this.HTMLUList=$tag('li',$tag('ul',e)[0]);
				this.HTMLUListLength=this.HTMLUList.length;
			}
			return this;
		},
		fn:{splice:[].splice},//原形
		pattern:{}//风格集
	};
	Base.fn.__DOM__={
		find:function(selector){//选择器只应用基本查找,暂不考虑用querySelectorAll
			var parent=this,isChild=false,$=myFocus;
			var arr=this.parseSelector(selector);
			if(this.length) for(var i=0,len=arr.length;i<len;i++){
				var dom=[],s=arr[i];
				switch(s.charAt(0)){
					case '>'://children
						isChild=true;
						break;
					case '.'://class
						var cls=s.slice(1);
						var fn=isChild?$class_:$class;
						$(parent).each(function(){
							dom=dom.concat(fn(cls,this));
						});
						isChild=false;
						break;
					case '#'://id
						var id=s.slice(1),e=$id(id);
						if(e) dom.push($id(id));
						isChild=false;
						break;
					default://tag(支持'tag.class'寻找,不支持也不建议用'tag#id'寻找,请用'#id')
						var fn=isChild?$tag_:$tag,sArr=s.split('.');
						var tag=sArr[0],cls=sArr[1];
						$(parent).each(function(){
							var arr=fn(tag,this);
							for(var i=0,len=arr.length;i<len;i++){
								if(cls&&!eval('/(^|\\s)'+cls+'(\\s|$)/').test(arr[i].className)) continue;
								dom.push(arr[i]);
							}
						});
						isChild=false;
				}
				if(!isChild) parent=dom;//循环赋值父元素
			}
			return $(parent);
		},
		parent:function(){
			return myFocus(this[0].parentNode);
		},
		html:function(s){
			if(typeof s!=='undefined'){this[0].innerHTML=s;return this;}
			else return this[0].innerHTML;
		},
		each:function(fn){
			var doms=this;
			for(var i=0,len=doms.length;i<len;i++){
				var flag=fn.call(doms[i],i);
				if(flag===false) break;
				if(flag===true) continue;
			}
			return this;
		},
		eq:function(n){
			return myFocus(this[n]);
		},
		parseSelector:function(selector){
			var chunker=/(([^[\]'"]+)+\]|\\.|([^ >+~,(\[\\]+)+|[>+~])(\s*,\s*)?/g;
			var parts=[],m;
			while((m = chunker.exec(selector)) !== null ) {
				parts.push( m[1] );//存储匹配的字符串信息
			}
			return parts;
		},
		wrap:function(html){//每次只wrap一个元素,多个请用each
			var o=this[0],e=document.createElement('div');
			e.innerHTML=html;
			var wrap=e.firstChild;
			o.parentNode.replaceChild(wrap,o);
			wrap.appendChild(o);
			return this;
		},
		addHtml:function(html){
			var parent=this[0];
			var e=document.createElement('div');
			e.innerHTML=html;
			var dom=e.childNodes[0];
			parent.appendChild(dom);
			return myFocus(dom);
		},
		addList:function(className,type){
			var li=this.HTMLUList,n=this.HTMLUListLength;
			var strArr=['<div class="'+className+'"><ul>'];
			for(var i=0;i<n;i++){
				var img=$tag('img',li[i])[0],html;
				switch(type){
					case 'num'  :html='<a>'+(i+1)+'</a><b></b>';break;//b标签主要是为了做透明背景,下同
					case 'txt'  :html=img?li[i].innerHTML.replace(/\<img(.|\n|\r)*?\>/i,img.alt)+'<p>'+img.getAttribute("text")+'</p><b></b>':'';break;
					case 'thumb':html=img?'<a><img src='+(img.getAttribute("thumb")||img.src)+' /></a><b></b>':'';break;
					default     :html='<a></a><b></b>';
				}
				strArr.push('<li>'+html+'</li>');
			}
			strArr.push('</ul></div>');
			return this.addHtml(strArr.join(''));
		},
		addListNum:function(className){
			return this.addList(className||'num','num');//默认class=num
		},
		addListTxt:function(className){
			return this.addList(className||'txt','txt');//默认class=txt
		},
		addListThumb:function(className){
			return this.addList(className||'thumb','thumb');//默认class=thumb
		},
		remove:function(){
			var o=this[0];
			if(o) o.parentNode.removeChild(o);
		}
	};
	Base.fn.__CSS__={
		css:function(css){//可获值或设值
			var o=this[0],value,arr=[';'],isIE=myFocus.isIE;
			if(typeof css==='string'){//获得css属性值,返回值不带单位
				if(css==='float') css=isIE?'styleFloat':'cssFloat';
				if(!(value=o.style[css])) value=(isIE?o.currentStyle:getComputedStyle(o,''))[css];
				if(css==='opacity'&&value===undefined) value=1;//仅为在IE中得到默认值1
				if(value==='auto'&&(css==='width'||css==='height')) value=o['offset'+css.replace(/\w/i,function(a){return a.toUpperCase()})];
				var numVal=parseFloat(value);
				return isNaN(numVal)?value:numVal;
			}else{//设置css属性值,不支持('height','300px')形式,请变成-->({height:'300px'}),可以不带单位px
				for(var p in css){
					if(typeof css[p]==='number'&&!this.cssNumber[p]) css[p]+='px';
					arr.push(p.replace(/([A-Z])/g,'-$1')+':'+css[p]+';');
					if(p==='opacity') arr.push('filter:alpha(opacity='+css[p]*100+')');
				}
				o.style.cssText+=arr.join('');
				return this;
			}
		},
		setOpacity:function(value){//仅用于animate要求高效的核心算法中,其它情况可用css()代替
			this[0].style.opacity=value,this[0].style.filter='alpha(opacity='+value*100+')';
		},
		setAnimateStyle:function(value,prop,m){//仅用于animate要求高效的核心算法中,其它情况可用css()代替
			this[0].style[prop]=Math[m](value)+'px';
		},
		addClass:function(className){
			this[0].className+=' '+className;
			return this;
		},
		removeClass:function(className){
			var o=this[0],cls=className&&o.className,reg="/\\s*\\b"+className+"\\b/g";
			o.className=cls?cls.replace(eval(reg),''):'';
			return this;
		},
		cssNumber:{fillOpacity:true,fontWeight:true,lineHeight:true,opacity:true,orphans:true,widows:true,zIndex:true,zoom:true}//不加px的css,参考jQuery
	};
	Base.fn.__Anim__={
		animate:function(attr,value,time,type,funcBefore,funcAfter){//value支持相对增值'+=100',相对减值'-=100'形式
			var $o=this,o=$o[0],isOpacity=attr==='opacity',diffValue=false;
			funcBefore&&funcBefore.call(o);
			if(typeof value==='string'){
				if(/^[+-]=\d+/.test(value)) value=value.replace('=',''),diffValue=true;
				value=parseFloat(value);
			}
			var	oriVal=$o.css(attr),//原始属性值
				b=isNaN(oriVal)?0:oriVal,//开始值,无值时为0
				c=diffValue?value:value-b,//差值
				d=time,//总运行时间
				e=this.easing[type],//缓动类型
				m=c>0?'ceil':'floor',//取最大绝对值
				timerId='__myFocusTimer__'+attr,//计数器id
				setProperty=$o[isOpacity?'setOpacity':'setAnimateStyle'],//属性设置方法
				origTime=(new Date)*1;//原始时间值
			o[timerId]&&clearInterval(o[timerId]);
			o[timerId]=setInterval(function(){
				var t=(new Date)-origTime;//已运行时间
				if(t<=d){
					setProperty.call($o,e(t,b,c,d),attr,m);
				}else{
					setProperty.call($o,b+c,attr,m);//设置最终值
					clearInterval(o[timerId]),o[timerId]=null;
					funcAfter&&funcAfter.call(o);
				}
			},13);
			return this;
		},
		fadeIn:function(time,type,fn){
			if(typeof time!=='number') fn=time,time=400;//默认400毫秒
			if(typeof type==='function') fn=type,type='';
			this.animate('opacity',1,time,type||'linear',function(){
				myFocus(this).css({display:'block',opacity:0});
			},fn);
			return this;
		},
		fadeOut:function(time,type,fn){
			if(typeof time!=='number') fn=time,time=400;//默认400毫秒
			if(typeof type==='function') fn=type,type='';
			this.animate('opacity',0,time,type||'linear',null,function(){
				this.style.display='none';
				fn&&fn.call(this);
			});
			return this;
		},
		slide:function(params,time,type,fn){
			if(typeof time!=='number') fn=time,time=800;//默认800毫秒
			if(typeof type==='function') fn=type,type='';
			for(var p in params) this.animate(p,params[p],time,type||'easeOut',null,fn);
			return this;
		},
		stop:function(){//停止所有运动
			var o=this[0];
			for(var p in o) if(p.indexOf('__myFocusTimer__')!==-1) o[p]&&clearInterval(o[p]);
			return this;
		},
		easing:{
			linear:function(t,b,c,d){return c*t/d + b;},
			swing:function(t,b,c,d) {return -c/2 * (Math.cos(Math.PI*t/d) - 1) + b;},
			easeIn:function(t,b,c,d){return c*(t/=d)*t*t*t + b;},
			easeOut:function(t,b,c,d){return -c*((t=t/d-1)*t*t*t - 1) + b;},
			easeInOut:function(t,b,c,d){return ((t/=d/2) < 1)?(c/2*t*t*t*t + b):(-c/2*((t-=2)*t*t*t - 2) + b);}
		}
	};
	Base.fn.__Method__={
		bind:function(type,fn){
			myFocus.addEvent(this[0],type,fn);
			return this;
		},
		play:function(funcLastFrame,funcCurrentFrame,seamless){
			var	this_=this,p=this_.settings,n=this_.HTMLUListLength,t=p.time*1000,seamless=seamless||false,//是否无缝
				float=myFocus(this_.HTMLUList).css('float'),isLevel=float==='left',//仅支持'left'方向和'top'方向
				direction=isLevel?'left':'top',distance=isLevel?p.width:p.height,//运动距离
				indexLast=0,indexCurrent=p.index;//帧索引值,默认0
			this_.find('.loading').remove();//删除loading...
			this_.run=function(value){//循环运动函数,支持+-=value
				funcLastFrame&&funcLastFrame(indexLast,n);//运行前一帧
				indexCurrent=typeof value==='string'?indexLast+parseInt(value.replace('=','')):value;//fixed index
				if(indexCurrent<=-1){//prev run
					indexCurrent=n-1;//转到最后一帧
					if(seamless) this_.HTMLUList[0].parentNode.style[direction]=-n*distance+'px';//无缝的UL定位
				}
				if(indexCurrent>=n){//next run
					if(!seamless) indexCurrent=0;//非无缝时转到第一帧
					if(indexCurrent>=2*n){//无缝
						this_.HTMLUList[0].parentNode.style[direction]=-(n-1)*distance+'px';//无缝的UL定位
						indexCurrent=n;
					}
				}
				if(seamless&&indexLast>=n&&indexCurrent<n) indexCurrent+=n;//无缝时的按钮点击(保持同一方向)
				funcCurrentFrame&&funcCurrentFrame(indexCurrent,n,indexLast);//运行当前帧
				this_.runIndex=indexLast=indexCurrent;//保存已运行的帧索引
			};
			try{this_.run(indexCurrent)}catch(e){setTimeout(function(){this_.run(indexCurrent)},0)};//运行...
			if(p.auto){//自动切换
				this_.runTimer=setInterval(function(){this_.run('+=1')},t);//默认递增运行每帧
				this_.bind('mouseover',function(){//绑定事件
					clearInterval(this_.runTimer);
				}).bind('mouseout',function(){
					if(!this_.isStop) this_.runTimer=setInterval(function(){this_.run('+=1')},t);
				});
			}
			this_.find('a').each(function(){//去除IE链接虚线
				this.onfocus=function(){this.blur();}
			});
		},
		bindControl:function($btnList,type,delay,showNum){
			var this_=this,p=this_.settings,type=type||p.trigger,delay=delay||p.delay;
			var run=function(){
				if(this.index!==this_.runIndex){
					this_.run(this.index);
					return false;//阻止冒泡&默认事件
				}
			};
			$btnList.each(function(i){
				this.index=i;//记录自身索引
				var o=this,$o=myFocus(o);
				if(type==='click'){
					$o.bind('mouseover',function(){
						$o.addClass('hover');
					}).bind('mouseout',function(){
						$o.removeClass('hover');
					}).bind('click',run);
				}else if(type==='mouseover'){
					$o.bind('mouseover',function(){
						if(delay===0) run.call(o);
						else $btnList.mouseoverTimer=setTimeout(function(){run.call(o)},delay);
					}).bind('mouseout',function(){
						$btnList.mouseoverTimer&&clearTimeout($btnList.mouseoverTimer);
					});
				}else{
					alert('myFocus Error Setting(trigger) : \"'+type+'\"');
					return false;
				};
			});
			if(showNum){//thumb
				var float=$btnList.css('float'),isLevel=float==='left'||float==='right';
				$btnList.dir=isLevel?'left':'top';//方向
				$btnList.n=this_.HTMLUListLength;//总数
				$btnList.showNum=showNum;//显示数目
				$btnList.showStart=p.index;//显示的开始索引
				$btnList.showEnd=$btnList.showStart+showNum-1;//显示的结尾索引
				$btnList.distance=$btnList.css(isLevel?'width':'height');//运动距离
				$btnList.slideBody=$btnList.parent();//运动对象(ul)
			}
		},
		scrollTo:function(i,time){
			var n=this.n,dir=this.dir,$ul=this.slideBody,css={};//总数/方向/滑动body(ul)/样式
			if(i>=this.showEnd){//next
				this.showEnd=i<n-1?i+1:i;

				this.showStart=this.showEnd-this.showNum+1;
			}else if(i<=this.showStart){//prev
				this.showStart=i>0?i-1:0;
				this.showEnd=this.showStart+this.showNum-1;
			}
			css[dir]=-this.showStart*this.distance;
			$ul.slide(css,500,'easeOut');
			return this;
		}
	};
	Base.__Init__={
		set:function(p,runNow,callback){//runNow是针对DOM加载而言,默认false
			var F=this,id=p.id,oStyle=F.initBaseCSS(id);
			if(typeof runNow!=='boolean') callback=runNow,runNow=false;
			p.pattern=p.pattern||F.defConfig.pattern;
			p.__runNow=runNow;
			p.__clsName=p.pattern+'_'+id;
			F.addEvent(window,'load',function(){F.onloadWindow=true});
			F.loadPattern(p,function(){
				p=F.extend({},F.defConfig,p);//收集完整参数
				F.getBoxReady(p,function(){
					var $o=F(p);
					p.width=p.width||$o.css('width'),p.height=p.height||$o.css('height');//获得box高/宽
					F.initCSS(p,$o,oStyle);//css
					F.initHTML($o);//html
					$o.addClass(p.pattern+' '+p.__clsName);//+className
					F.getIMGReady(p,function(){
						//if(p.autoZoom) this.fixIMG(p.id,p.width,p.height);
						F.pattern[p.pattern](p,F);//运行pattern代码
						callback&&callback();
					});
				});
			});
		},
		onloadWindow:false,
		loadPattern:function(p,callback){
			if(this.pattern[p.pattern]){callback();return;}//如果已加载pattern
			var path=this.getFilePath()+'mf-pattern/'+p.pattern;
			var js= document.createElement("script"),css=document.createElement("link"),src=path+'.js',href=path+'.css'; 
    		js.type = "text/javascript",js.src=src;
			css.rel = "stylesheet",css.href=href;
			var head=$tag('head')[0],isSuccess=0,timeout=3000;//超时3秒
			head.appendChild(css);
			head.appendChild(js);
			js.onload=js.onreadystatechange=function(){
				if(!js.readyState||js.readyState=="loaded"||js.readyState=="complete") callback(),isSuccess=1;
			};
			setTimeout(function(){if(!isSuccess) alert('Failed to load: '+src);},timeout);
		},
		getFilePath:function(){
			var path = '';
			var scripts = $tag("script");
			var reg = /myfocus-.*?\.js/i;
			for(var i = 0 , len = scripts.length ; i <len ; i++){
				var src = scripts[i].src;
				if(src && reg.test(src)){
					path = src;
					break;
				}
			};
			return path.slice( 0, path.lastIndexOf('/') + 1 );
		},
		getBoxReady:function(p,fn){
			var F=this;
			if(p.__runNow){fn();return;}
			(function(){
				var e=$id(p.id);
				if(!e){if(!F.onloadWindow) setTimeout(arguments.callee,0);}
				else fn();
			})();
		},
		getIMGReady:function(p,callback){
			var t=p.loadIMGTimeout;
			var box=$id(p.id),img=$tag('img',box),len=img.length,count=0,done=false;
			if(!t||!len){callback();return;}//无延迟
			for(var i=0;i<len;i++){
				img[i].onload=function(){
					count+=1;
					if(count==len&&!done){done=true,callback();}
				};
				if(this.isIE) img[i].src=img[i].src;//修复IE BUG
			};
			var t=t*1000;
			setTimeout(function(){
				if(!done){done=true,callback();}
			},t);
		},
		initCSS:function(p,$o,oStyle){
			var css=[],w=p.width||'',h=p.height||'';
			if(p.wrap) $o.wrap('<div class="'+p.pattern+'_wrap"></div>');
			css.push('.'+p.__clsName+' *{margin:0;padding:0;border:0;list-style:none;}.'+p.__clsName+'{position:relative;width:'+w+'px;height:'+h+'px;overflow:hidden;font:12px/1.5 Verdana;text-align:left;background:#fff;visibility:visible!important;}.'+p.__clsName+' .loading{position:absolute;z-index:9999;width:100%;height:100%;color:#666;text-align:center;padding-top:'+0.26*h+'px;background:#fff;}.'+p.__clsName+' .pic{position:relative;width:'+w+'px;height:'+h+'px;overflow:hidden;}.'+p.__clsName+' .txt li{width:'+w+'px;height:'+p.txtHeight+'px!important;overflow:hidden;}');
			if(p.autoZoom) css.push('.'+p.__clsName+' .pic li{text-align:center;width:'+w+'px;height:'+h+'px;}');//缩放图片居中
			try{oStyle.styleSheet.cssText=css.join('')}catch(e){oStyle.innerHTML=css.join('')}
		},
		initBaseCSS:function(id){
			var s='#'+id+' *{display:none}',oStyle=document.createElement('style');
			oStyle.type='text/css';
			try{oStyle.styleSheet.cssText=s}catch(e){oStyle.innerHTML=s}
			var oHead = $tag('head',document)[0];
			oHead.insertBefore(oStyle,oHead.firstChild);
			return oStyle;
		},
		initHTML:function($o){
			var $load=$o.find('.loading'),$img=$load.find('img'),img=$img[0];
			if($img.length){
				$load.addHtml('<p>'+img.alt+'</p>');
				if(!img.getAttribute('src')) img.style.display='none';
			}
		}
	},
	Base.__Method__={
		isIE:!!(document.all&&navigator.userAgent.indexOf('Opera')===-1),//!(+[1,]) BUG IN IE9+?
		alterSRC:function(o,suffix,del){
			var img=$tag('img',o)[0];
			img.src=del?img.src.replace(eval("/"+suffix+"\\.(?=[^\\.]+$)/g"),'.'):img.src.replace(/\.(?=[^\.]+$)/g,suffix+'.');
		},
		/*fixIMG:function(box,boxWidth,boxHeight){
			var imgs=this.$$('img',box),len=imgs.length,IMG = new Image();
			for(var i=0;i<len;i++){
				IMG.src = imgs[i].src;
				if(IMG.width / IMG.height >= boxWidth / boxHeight){
					imgs[i].style.width=boxWidth+'px';
					imgs[i].style.marginTop=(boxHeight-boxWidth/IMG.width*IMG.height)/2+'px';//垂直居中
				}else{
					imgs[i].style.height=boxHeight+'px';
				}
			};
		},*/
		addEvent:function(o,type,fn){
			var ie=this.isIE,e=ie?'attachEvent':'addEventListener',t=(ie?'on':'')+type;
			o[e](t,function(e){
				var e=e||window.event,flag=fn.call(o,e);
				if(flag===false){
					if(ie) e.cancelBubble=true,e.returnValue=false;
					else e.stopPropagation(),e.preventDefault();
				}
			},false);
		}
	};
	myFocus=function(settings){
		return new myFocus.constr(settings);
	};
	myFocus.extend=function(){//扩展
		var arg=arguments,len=arg.length;
		if(this===myFocus){//作为方法扩展，如果只有一个参数扩展本身
			if(len===1) dest=myFocus,i=0;//扩展myFocus类
			else dest=arg[0],i=1;
		}else{//扩展引用对象本身
			dest=this,i=0;
		}
		for(i;i<len;i++){
			for(var p in arg[i]){
				dest[p]=arg[i][p];//dest属性最低
			}
		}
		return dest;
	};
	myFocus.extend(Base,Base.__Init__,Base.__Method__);
	delete Base.__Init__;
	delete Base.__Method__;
	myFocus.extend(Base);
	//console.debug(Base);
	myFocus.constr.prototype=myFocus.fn;
	myFocus.fn.extend=myFocus.pattern.extend=myFocus.defConfig.extend=myFocus.extend;
	myFocus.fn.extend(Base.fn.__DOM__,Base.fn.__CSS__,Base.fn.__Anim__,Base.fn.__Method__);
	delete Base.fn.__DOM__;
	delete Base.fn.__CSS__;
	delete Base.fn.__Anim__;
	delete Base.fn.__Method__;
	//支持JQ
	if(typeof jQuery!=='undefined'){
		jQuery.fn.extend({
			myFocus:function(p,fn){
				if(!p) p={};
				p.id=this[0].id;
				if(!p.id) p.id=this[0].id='mF__NAME__';
				myFocus.set(p,true,fn);
			}
		});
	}
	//获取DOM基础函数
	var $id=function(id){return typeof id==='string'?document.getElementById(id):id;};
	var $tag=function(tag,parentNode){return ($id(parentNode)||document).getElementsByTagName(tag);};
	var $tag_=function(tag,parentNode){
		return $getChild(tag,parentNode,'tag');
	};
	var $class=function(className,parentNode){
		var doms=$tag('*',parentNode),className=className.replace(/\-/g,'\\-'),reg=new RegExp('(^|\\s)'+className+'(\\s|$)'),arr=[];
		for(var i=0,l=doms.length;i<l;i++){
			if(reg.test(doms[i].className)){
				arr.push(doms[i]);
			}
		}
		return arr;
	};
	var $class_=function(className,parentNode){
		return $getChild(className,parentNode);
	};
	var $getChild=function(selector,parentNode,type){
		var arr=[],fn=type==='tag'?$tag:$class,doms=fn(selector,parentNode),len=doms.length;
		for(var i=0;i<len;i++){
			if(doms[i].parentNode===parentNode) arr.push(doms[i]);
			i+=fn(selector,doms[i]).length;
		}
		return arr;
	};
})();