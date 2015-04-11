<?php
namespace Admin\Service;
class MenuService extends \Think\Model {
	/**
	 * 获取顶部菜单
	 */
	public function getTopMenu() {
		$Menu = M('Menu');
		$topMenus = $Menu->where('parentId=0')->order('sort')->select();
		return $topMenus;
	}
	public function getLeftMenu($topMenu = 1) {
		$Menu = M('Menu');
		$leftMenus = $Menu->where("parentId=$topMenu")->select();
		return $leftMenus;
	}
}