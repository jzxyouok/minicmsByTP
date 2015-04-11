<?php
namespace Admin\Controller;
use Think\Controller;
/**
 * 用户管理
 * @author Zealpane
 * @name 用户管理
 * @see User
 */
class UserController extends Controller {
	
    public function index(){
    	$this->show(session("username"));
//         $this->display();
    }
    /**
     * 跳转到登录页面
     */
    public function login() {
    	
    	$this->display();
    }
    public function Verify() {
    	$Verify = new \Think\Verify();
    	$image = $Verify->entry();
    }
    /**
     * 处理用户登录
     */
    public function proLogin() {
    	// 实例化user
    	$User = M("User");
    	
    	$data['username'] = I('username');
    	
    	$real_password = $User->where($data)->getField("password");
//     	var_dump($user);
    	$password = I('password');
    	if ($real_password !== $password) {
    		$this->error("密码错误", 'login');
    		session("username", null);
    	} else {
    		session('username', $data['username']);
    		$this->success("登录成功", U('Admin/Index/index'));
    	}
    }
}