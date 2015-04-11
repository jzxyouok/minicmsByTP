<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
<link rel="stylesheet" type="text/css" href="/tutor/Public/css/backLayout.css" />
</head>
<body>
<h1>管理员登录</h1>
<form action="proLogin" method="POST">
<table>
	<tr>
		<td><?php echo (L("username")); ?></td>
		<td><input type="text" name="username" placeholder="在此输入用户名"></td>
		<td></td>
	</tr>
	<tr>
		<td><?php echo (L("password")); ?></td>
		<td><input type="password" name="password" placeholder="在此输入密码"></td>
		<td></td>
	</tr>
	<tr>
		<td>验证码</td>
		<td><input type="text" name="verify" placeholder="在此输入密码"></td>
		<td><img src="/tutor/index.php/Admin/User/verify/" onClick="this.src+='?' + Math.random();" alt="点击刷新验证码!"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="<?php echo (L("login")); ?>"/></td>
	</tr>
</table>
</form>
</body>
</html>