<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
use Admin\Service\MenuService;
/**
 * 首页初始化
 * @author Zealpane
 * @name 首页初始化
 * @see Index
 */
class IndexController extends BaseController {

	public function index(){
    	$MenuService = D('Menu', 'Service');
    	// 获取顶部菜单
    	$topMenus = $MenuService->getTopMenu();
//     	var_dump($topMenus);
    	$this->assign("topMenus", $topMenus);
    	// 获取左侧菜单
    	$firstId = $topMenus[0]['id'];
    	$leftMenus = $MenuService->getLeftMenu($firstId);
    	$this->assign("leftMenus", $leftMenus);
    	
    	$this->display();
//     	$this->display("Menu/add");
    }
}