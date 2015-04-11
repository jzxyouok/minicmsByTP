<?php if (!defined('THINK_PATH')) exit();?><div>
	<form id="form1" action="<?php echo U('Menu/update', array('id'=>$menu['id']));?>" method="POST">

		<div class="form-group">
			<label for="name"><?php echo (L("menuName")); ?></label> 
			<input type="text" name="name" class="form-control" placeholder="<?php echo (L("menuName")); ?>" value="<?php echo ($menu["name"]); ?>">
		</div>
		<div class="form-group">
			<label for="action"><?php echo (L("controller")); ?></label> 
			<select	name="action" class="form-control">
					<option value="<?php echo ($menu["action"]); ?>" selected="selected"><?php echo ($menu["actionValue"]); ?></option>
				<?php if(is_array($controllers)): $i = 0; $__LIST__ = $controllers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["see"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="method"><?php echo (L("option")); ?></label> 
			<input type="text" name="method" class="form-control" placeholder="<?php echo (L("option")); ?>" value="<?php echo ($menu["method"]); ?>">
		</div>
		<div class="form-group">
			<label for="parentId"><?php echo (L("parentMenu")); ?></label> 
			<select name="parentId" class="form-control">
				<?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($menu['parentId'] == $vo['id']): ?><option value="<?php echo ($vo["id"]); ?>" selected="selected"><?php echo ($vo["name"]); ?></option>
					<?php else: ?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?>
				<option value="0">无上级菜单</option>
			</select>
		</div>
		<div class="text-center">
			<input type="submit" id="submit" value="提交" class="btn btn-success">
		</div>
	</form>
</div>
<script>
$(function() {
	$("#submit").click(function() {
		$.post("<?php echo U('Menu/update', array('id'=>$menu['id']));?>", $("#form1").serialize(), function(data, textStatus) {
			alert('a');
		}, "json")
		return false;
	});
});
</script>