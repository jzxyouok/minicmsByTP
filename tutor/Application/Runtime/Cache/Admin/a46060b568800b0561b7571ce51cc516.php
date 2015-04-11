<?php if (!defined('THINK_PATH')) exit();?><div class="col-md-10">
	<form>
		<table class="table table-hover table-striped">
			<thead>
				<tr>
					<td>id</td>
					<td>名字</td>
					<td>图片</td>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($slides)): $i = 0; $__LIST__ = $slides;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo["id"]); ?></td>
					<td><?php echo ($vo["name"]); ?></td>
					<td><img src="/tutor/Public/<?php echo ($vo["img"]); ?>"></td>
					<td><a href="<?php echo U('Slide/delete', array('id' => $vo['id']) );?>">删除</a></td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>
	</form>
</div>
<style type="text/css">
img {
height: 120px;
}
</style>