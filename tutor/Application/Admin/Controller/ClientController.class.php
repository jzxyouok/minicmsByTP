<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
/**
 * 客户管理
 * @author Zealpane
 * @name 客户管理
 * @see Client
 */
class ClientController extends BaseController {
	
	public function toAdd() {
		$this->display("add");
	}
}