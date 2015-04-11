<?php if (!defined('THINK_PATH')) exit();?><div>
	<form action="<?php echo U('Menu/add');?>" method="POST">

		<div class="form-group">
			<label for="name"><?php echo (L("menuName")); ?></label> 
			<input type="text" name="name" class="form-control" placeholder="<?php echo (L("menuName")); ?>">
		</div>
		<div class="form-group">
			<label for="action"><?php echo (L("controller")); ?></label>
			<select	name="action" class="form-control">
				<?php if(is_array($controllers)): $i = 0; $__LIST__ = $controllers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["see"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
		<div class="form-group">
			<label for="method"><?php echo (L("option")); ?></label> 
			<input type="text" name="method" class="form-control" placeholder="<?php echo (L("option")); ?>">
		</div>
		<div class="form-group">
			<label for="parentId"><?php echo (L("parentMenu")); ?></label> 
			<select name="parentId" class="form-control">
				<option value="0">无上级菜单</option>
				<?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
		<div class="text-center">
			<input type="submit" value="提交" class="btn btn-success">
		</div>
	</form>
</div>
<script>
</script>