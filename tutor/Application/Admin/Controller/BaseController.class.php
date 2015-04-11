<?php

namespace Admin\Controller;

use Think\Controller;
use Org\Util\Rbac;
/**
 * 控制器基类
 * @author Zealpane
 *
 */
class BaseController extends Controller {
	// 初始化
	public function _initialize() {
		// 在此处进行权限验证
		if (session('?username') && session("username") != null) {
// 			echo session("username");
// 			$this->redirect("User/login");
		} else {
			// 提示错误信息
			echo 'b';
			$this->redirect("User/login");
// 			$this->error(L('welcome'),PHP_FILE . C('USER_AUTH_GATEWAY'), 0);
		}
		
	}
}