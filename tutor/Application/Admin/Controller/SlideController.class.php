<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
/**
 * 幻灯片管理
 * @author Zealpane
 * @name 幻灯片管理
 * @see Slide
 */
class SlideController extends BaseController {
	public function toAdd() {
		$this->display('add');
	}
	
	public function add() {
		$upload = new \Think\Upload(); // 实例化上传类
		$upload->maxSize = 3145728; // 设置上传附件的大小
		$upload->exts = array('jpg', 'gif', 'png', 'jpeg');
		$upload->rootPath = "./Public/";
		$upload->savePath = 'uploads/slide'; // 设置附件上传目录
		echo realpath($upload->rootPath);
		// 上传文件
		$info = $upload->upload();
		if (!$info) {
			// 上传失败
			echo '上传失败';
		} else {
			//上传成功
			$Slide = M('Slide');
			$slide = $Slide->create();
			// 		$slide['name'] = $info['name'];
			echo $slide['img'] = $info['photo']['savepath'] . $info['photo']['savename'];
			echo $slide['name'] = $info['photo']['name'];
			$Slide->add($slide);
			echo '上传成功';
		}
	}
	public function listAll() {
		$Slide = M('Slide');
		$slides = $Slide->select();
		$this->assign("slides", $slides);
		$this->display();
	}
}