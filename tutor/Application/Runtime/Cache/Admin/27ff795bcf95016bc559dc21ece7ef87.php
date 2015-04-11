<?php if (!defined('THINK_PATH')) exit();?><div class="text-right">
	<a href="<?php echo U('Menu/toAdd');?>" class="layer btn btn-primary btn-lg active">添加</a>
	<a href="<?php echo U('Menu/toAdd');?>" class="layer btn btn-primary btn-lg active">添加</a>
</div>
<table class="table table-hover table-striped">
	<thead>
		<tr>
			<td>id</td>
			<td>名字</td>
			<td>控制器</td>
			<td>操作</td>
			<td>父Id</td>
			<td>创建时间</td>
			<td>最后一次更新时间</td>
			<td>url</td>
			<td>操作</td>
		</tr>
	</thead>
	<tbody>
		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
			<td><?php echo ($vo["id"]); ?></td>
			<td><?php echo ($vo["name"]); ?></td>
			<td><?php echo ($vo["action"]); ?></td>
			<td><?php echo ($vo["method"]); ?></td>
			<td><?php echo ($vo["parentId"]); ?></td>
			<td><?php echo ($vo["create_time"]); ?></td>
			<td><?php echo ($vo["last_update_time"]); ?></td>
			<td><?php echo ($vo["url"]); ?></td>
			<td><a href="<?php echo U('Menu/toUpdate', array('id' => $vo['id']) );?>" class="layer">编辑</a>
				<a href="<?php echo U('Menu/delete', array('id' => $vo['id']) );?>" class="ajaxDelete">删除</a></td>
		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody>
</table>
<ul class="text-right pagination">
	<?php echo ($page); ?>
</ul>
<script>
$(".ajaxDelete").click(function() {
	alert(5);
	return false;
});
</script>