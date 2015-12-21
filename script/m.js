//------- popover 提示框 -------
$(function () {
  $('[data-toggle="popover"]').popover()
})

//------- hover 菜单 -------
!function($) {
    var $allDropdowns = $();
    $.fn.exDropdown = function(option) {
        return this.each(function () {
            var defaults = {
                delay: 300,
                closeOthers: true
            };
            var $this = $(this);
            var $parent = $this.parent();
            var options = $.extend({}, defaults, $this.data(), option);
            var timeout;

            $allDropdowns = $allDropdowns.add($parent);

            $parent.hover(function() {
                if(options.closeOthers === true) {
                    $allDropdowns.removeClass('open');
                }
                window.clearTimeout(timeout);
                $parent.addClass('open');
            }, function() {
                timeout = window.setTimeout(function() {
                    $parent.removeClass('open');
                }, options.delay);
            });
        });
    };

    $(document).ready(function () {
        $('[data-hover=exDropdown]').exDropdown(null);
    });
}(jQuery);




/*--- 百度分享 ---*/
window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"32"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
/*--- end 百度分享 ---*/


//--------加载外部js函数------------

$.extend({
        include: function(file) {
        var files = typeof file == "string" ? [file]:file;
        for (var i = 0; i < files.length; i++) {
            var name = files[i].replace(/^\s|\s$/g, "");
            var att = name.split('.');
            var ext = att[att.length - 1].toLowerCase();
            var isCSS = ext == "css";
            var tag = isCSS ? "link" : "script";
            var attr = isCSS ? " type='text/css' rel='stylesheet' " : " language='javascript' type='text/javascript' ";
            var link = (isCSS ? "href" : "src") + "='" + name + "'";
            if ($(tag + "[" + link + "]").length == 0) document.write("<" + tag + attr + link + "></" + tag + ">");
        }
   }
});


//使用方法
 
//$.include(['http://code.jquery.com/ui/1.9.2/jquery-ui.js']);



//-----------------sidebar-follow-jquery.js------------------------

/**
 * @author: mg12 [http://www.neoease.com/]
 * @update: 2012/12/05
 */

SidebarFollow = function() {

	this.config = {
		element: null, // 处理的节点
		distanceToTop: 0 // 节点上边到页面顶部的距离
	};

	this.cache = {
		originalToTop: 0, // 原本到页面顶部的距离
		prevElement: null, // 上一个节点
		parentToTop: 0, // 父节点的上边到顶部距离
		placeholder: jQuery('<div>') // 占位节点
	}
};

SidebarFollow.prototype = {

	init: function(config) {
		this.config = config || this.config;
		var _self = this;
		var element = jQuery(_self.config.element);

		// 如果没有找到节点, 不进行处理
		if(element.length <= 0) {
			return;
		}

		// 获取上一个节点
		var prevElement = element.prev();
		while(prevElement.is(':hidden')) {
			prevElement = prevElement.prev();
			if(prevElement.length <= 0) {
				break;
			}
		}
		_self.cache.prevElement = prevElement;

		// 计算父节点的上边到顶部距离
		var parent = element.parent();
		var parentToTop = parent.offset().top;
		var parentBorderTop = parent.css('border-top');
		var parentPaddingTop = parent.css('padding-top');
		_self.cache.parentToTop = parentToTop + parentBorderTop + parentPaddingTop;

		// 滚动屏幕
		jQuery(window).scroll(function() {
			_self._scrollScreen({element:element, _self:_self});
		});

		// 改变屏幕尺寸
		jQuery(window).resize(function() {
			_self._scrollScreen({element:element, _self:_self});
		});
	},

	/**
	 * 修改节点位置
	 */
	_scrollScreen: function(args) {
		var _self = args._self;
		var element = args.element;
		var prevElement = _self.cache.prevElement;

		// 获得到顶部的距离
		var toTop = _self.config.distanceToTop;

		// 如果 body 有 top 属性, 消除这些位移
		var bodyToTop = parseInt(jQuery('body').css('top'), 10);
		if(!isNaN(bodyToTop)) {
			toTop += bodyToTop;
		}

		// 获得到顶部的绝对距离
		var elementToTop = element.offset().top - toTop;

		// 如果存在上一个节点, 获得到上一个节点的距离; 否则计算到父节点顶部的距离
		var referenceToTop = 0;
		if(prevElement && prevElement.length === 1) {
			referenceToTop = prevElement.offset().top + prevElement.outerHeight();
		} else {
			referenceToTop = _self.cache.parentToTop - toTop;
		}

		// 当节点进入跟随区域, 跟随滚动
		if(jQuery(document).scrollTop() > elementToTop) {
			// 添加占位节点
			var elementHeight = element.outerHeight();
			_self.cache.placeholder.css('height', elementHeight).insertBefore(element);
			// 记录原位置
			_self.cache.originalToTop = elementToTop;
			// 修改样式
			element.css({
				top: toTop + 'px',
				position: 'fixed'
			});

		// 否则回到原位
		} else if(_self.cache.originalToTop > elementToTop || referenceToTop > elementToTop) {
			// 删除占位节点
			_self.cache.placeholder.remove();
			// 修改样式
			element.css({
				position: 'static'
			});
		}
	}
};


/*(new SidebarFollow()).init({
	element: jQuery('#sidefollow'),
	distanceToTop: 15
});
*/

//---------------------End sidebar-follow-jquery.js--------------------

 //------返回顶部代码-----
function gotop() {
    var $backToTopEle = $('<div class="backtotop" style="opacity: 1;"><a data-action="backtotop" href="javascript:;" class="btn-backtotop btn-action"><div class="arrow"></div><div class="stick"></div></a></div>').appendTo($("body"))
        .attr("title", "返回顶部")
		
		//$backToTopEle.css({"display": "none"});
		$backToTopEle.click(function() {
            $("html, body").animate({ scrollTop: 0 }, 500);
    }), $backToTopFun = function() {
        var st = $(document).scrollTop(), winh = $(window).height();
        (st > 500)? $backToTopEle.show(): $backToTopEle.hide();    
        //IE6下的定位
        if (!window.XMLHttpRequest) {
            $backToTopEle.css("top", st + winh - 166);    
        }
    };
    $(window).bind("scroll", $backToTopFun);
    $(function() { $backToTopFun(); });
}
//--------end 返回顶部代码-----------


//-------居中------
(function($){
   $.fn.center = function(){
   var top = ($(window).height() - this.height())/2;
   var left = ($(window).width() - this.width())/2;
   var scrollTop = $(document).scrollTop();
   var scrollLeft = $(document).scrollLeft();
   return this.css( { position : 'absolute', 'top' : top + scrollTop, left : left + scrollLeft } ).show();
   }
  })(jQuery)

  //使用：$(".cimg").center();
//-------居中------



window.onload=function(){

}







/*----------打开网页加载代码-----------------*/

$(document).ready(function(){
/*-- 动态插入html --*/
var system ={   
    win : false,  
    mac : false,  
    xll : false 
 };  
//检测平台   
 var pt = navigator.platform;  

 system.win = pt.indexOf("Win") == 0;  
 system.mac = pt.indexOf("Mac") == 0;  
 system.x11 = (pt == "X11") || (pt.indexOf("Linux") == 0);  
 
 if(system.win||system.mac||system.xll){
     
	 $(".sidebar").prepend('<div style="background:#FFFFE1;border: 1px solid #CCCCCC;margin: 0 0 3% 0;padding: 5px;"><p>手机也能访问哦: http://blog.codeinto.com</p></div>');
	$(".article_tools_share").prepend('<div class="bdsharebuttonbox"><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_more" data-cmd="more"></a></div>');

	 
	 
 }

//返回顶部	 
gotop();

//外部链接打开方式
$(".txt_content a").each(function() {
    if(this.href.indexOf(location.hostname) == -1) {
	    if($(this).attr("class")!=="download_link" && $(this).attr("href")!==undefined){
		$(this).attr("class", "external");
        $(this).attr("target", "_blank");}
        else{
	         $(this).attr("target", "_blank");
        }
    }
});



});

/*----------end 打开网页加载代码-----------------*/


 
