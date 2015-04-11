<?php if (!defined('THINK_PATH')) exit();?><div>
	<form action="<?php echo U('Client/add');?>" method="POST">

		<div class="form-group">
			<label for="name">客户名称</label> 
			<input type="text" name="name" class="form-control" placeholder="客户名称">
		</div>
		<div class="form-group">
			<label for="name">客户图标</label>
		</div>
		<div class="form-group">
			<label for="name">客户案例分类</label>
		</div>
		<div class="form-group">
			<label for="name">客户案例标题</label> 
			<input type="text" name="name" class="form-control" placeholder="客户案例标题">
		</div>
		<div class="form-group">
			<label for="name">客户案例副标题</label> 
			<input type="text" name="name" class="form-control" placeholder="客户案例副标题">
		</div>
		<div class="form-group">
			<label for="name">客户链接</label> 
			<input type="text" name="name" class="form-control" placeholder="客户链接">
		</div>
		<div class="form-group">
			<label for="name">客户案例正文</label> 
		</div>
		<div class="form-group">
			<label for="name">客户图片</label> 
		</div>
		
		<div class="text-center">
			<input type="submit" value="提交" class="btn btn-success">
		</div>
	</form>
</div>