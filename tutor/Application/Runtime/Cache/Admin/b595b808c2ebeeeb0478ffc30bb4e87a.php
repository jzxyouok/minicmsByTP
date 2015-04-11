<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link href="http://apps.bdimg.com/libs/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="http://apps.bdimg.com/libs/jquery/2.0.0/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="http://apps.bdimg.com/libs/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<!-- 自定义的jquery布局插件 -->
<script src="/tutor/Public/js/jquery.myLayout.js"></script>
<!-- 弹出层插件 -->
<script src="/tutor/Public/plugins/layer/layer.min.js"></script>
<script>
	
</script>
</head>
<body style="background-color: #fff;">
	<div class="container-fluid">
		<!-- 头部导航 -->
		<div class="row" id="header">
				<!-- Brand and toggle get grouped for better mobile display -->
				<ul class="nav nav-tabs">
					<?php if(is_array($topMenus)): $i = 0; $__LIST__ = $topMenus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="navbar-brand" href="<?php echo U($vo['url'], array('id'=>$vo['id']));?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
		</div>

		<div class="row">
			<div class="container-fluid" id="page-main">
				<!-- 左侧导航 -->
				<div class="col-md-2" id="sidebar">
						<ul class="nav nav-pills nav-stacked">
							<?php if(is_array($leftMenus)): $i = 0; $__LIST__ = $leftMenus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li><a class="navbar-brand" href="<?php echo U($vo['url']);?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
						</ul>
				</div>

				<!-- 右侧内容 -->
				<div class="col-md-10">
					<ol class="breadcrumb">
						<li><a href="#">Home</a></li>
						<li><a href="#">Library</a></li>
						<li class="active">Data</li>
					</ol>
					<div style="background: #eee;" id="page-content"></div>
				</div>
			</div>
		</div>
	</div>
	s
</body>
<div id="test2">sfsd</div>
<script>
	/* 点击头部列表异步刷新内容 */
	$.myLayout();
	/* layer.msg('Hello layer', 2, -1); //2秒后自动关闭，-1代表不显示图标 */
	$('#test2')
			.on(
					'click',
					function() {
						$
								.layer({
									type : 1,
									title : false, //不显示默认标题栏
									shade : [ 0 ], //不显示遮罩
									area : [ '600px', '360px' ],
									page : {
										html : '<img src="http://static.oschina.net/uploads/space/2014/0516/012728_nAh8_1168184.jpg" alt="layer">'
									}
								});
					});
</script>
</html>