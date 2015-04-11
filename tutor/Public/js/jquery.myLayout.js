;
(function($) {
	$.extend({
		/* 给头部菜单注册点击事件，点击头部列表异步刷新内容 */
		onHeaderClick : function() {
			$("#header ul li a").click(
					function() {
						$(this).addClass("active").siblings().removeClass(
								"active");
						$.get($(this).attr("href"), {}, function(
								data, textStatus) {
							$.updateSideBar(data);
						});
						return false;
					});
		},
		updatePageContent : function(data) {
			$("#page-content").html(data);
			/* 回调函数 */
			$("#page-content a[class*=layer]").click(function() {
				$.get($(this).attr("href"), {}, function(data, textStatus) {
					/* $.updatePageContent(data); */
					$.layer({
						type : 1,
						title : false, // 不显示默认标题栏
						shade : [ 0.5, "#aaa" ], // 不显示遮罩
						area : [ '400px', '360px' ],
						page : {
							html : data
						}
					});
				});
				return false;
			});
		},
		updateSideBar : function(data) {
			$("#sidebar").html(data);
			/* 点击左侧列表异步刷新右侧内容 */
			$("#sidebar ul li").click(
					function() {

						$(this).addClass("active").siblings().removeClass(
								"active");
						$.get($(this).children("a").attr("href"), {}, function(
								data, textStatus) {
							$.updatePageContent(data);
						});
						return false;
					});
		},
		myLayout : function() {
			$.onHeaderClick();
			$.updateSideBar();
			$.updatePageContent();
		}
	})
})(jQuery);