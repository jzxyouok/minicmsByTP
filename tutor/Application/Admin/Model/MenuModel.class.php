<?php
namespace Admin\Model;
class MenuModel extends \Think\Model {
	private $_validate = array(
			/* array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]) */
			array('vertify' ,'require', '验证码必须'),
			array('name', '', '账号名称已经存在', 0, 'unique', 1),
			array('value', array(1, 2, 3), '值的范围不正确', 2, 'in'),
			array('repassword','password','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致     
			array('password','checkPwd','密码格式不正确',0,'function') // 自定义函数验证密码格式
	);
};