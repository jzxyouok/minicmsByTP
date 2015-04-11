<?php
namespace Admin\Controller;
use Admin\Controller\BaseController;
/**
 * 菜单控制器类
 * @author Zealpane
 * @name 菜单控制器
 * @see Menu
 */
class MenuController extends BaseController {
	
	/* public function index() {
		
		$reflector = new \ReflectionClass('\Admin\Controller\MenuController'); //要获取的类 命名空间 Aa/Bb/Myclass.class.php 类
		$properties = $reflector->getMethods();
		dump($properties);
		
		$doc = $reflector->getDocComment();
		var_dump($doc);
		//解析类的注释头
		$parase_result =  DocParserFactory::getInstance()->parse ( $doc );
		var_dump( $parase_result );
	} */
	
	public function listLeft() {
		// 接收前端传过来的一级菜单的id，作为父id查询菜单集合
		$parentId = I('id');
		$MenuService = D('Menu', 'Service');
		$leftMenus = $MenuService->getLeftMenu($parentId);
		$this->assign('leftMenus', $leftMenus);
		
		$this->display();
	}
	public function sort() {
		
	}
	/**
	 * 分页显示数据
	 */
	public function listByPage() {
		$Menu = M('Menu'); // 实例化Menu对象
		$count = $Menu->count(); // 查询满足要求的总记录数
		$Page = new \Think\Page($count, 5); // 实例化分页类，传入总记录数和每页显示的记录数25
		$show = $Page->show(); // 分页显示输出
		// 进行分页数据查询，注意limit方法的参数要使用Page类的属性
		$list = $Menu->limit($Page->firstRow.''.$Page->listRows)->select();
		$this->assign("list", $list); // 赋值数据集
		$this->assign("page", $show); // 赋值分页输出
		$this->display(); // 输出模板
	}
	
	/**
	 * 列出所有菜单
	 */
	public function listAll() {
		$Menu = M('Menu');
		$menus = $Menu->select();
		$this->assign("menus", $menus);

		$this->display();
	}
	public function delete() {
		$id = I('id');
		$Menu = M('Menu');
		// 第一步，检查当前菜单是否存在
		
		// 第二步，检查当前菜单下是否有其他菜单，有则暂时无法删除
		$count['id'] = $Menu->where("parentId=$id")->field('count(id)')->find();
		if ($count['id' > 0]) {
			// 有子菜单，此处最后列出子菜单以供删除
			echo '有子菜单，不可删除';
		} else {
			echo '无子菜单，可以删除';
// 			$Menu->where("id=$id")->delete();
		}
	}
	/**
	 * 转向菜单添加页面
	 */
	public function toAdd() {
		$controllers = GetControllerAndMethod::getAllController();
		$this->assign("controllers", $controllers);
		
		$menu = M('Menu');
		$menus = $menu->select();
		$this->assign("menus", $menus);
		
		$this->display("add");
	}
	/**
	 * 根据控制器返回method方法
	 */
	public function getMethodsByController() {
		$controller = I('controller');
		$methods = GetControllerAndMethod::getMethods($controller);
// 		$this->assign('methods', $methods);
		// ajax返回
		$this->ajaxReturn($methods);
	}
	/**
	 * 添加菜单
	 */
	public function add() {
		$Menu = M('Menu');
		$menu = $Menu->create();
		$menu['url'] = I('action') . '/' . I('method');
		$menu['create_time'] = date("Y-m-d");
		$menu['create_time'] = date("Y-m-d");
// 		var_dump($menu);
		$Menu->add($menu);
		$this->display('listAll');
	}
	/**
	 * 转向编辑更新页面 
	 */
	public function toUpdate() {
		$data['id'] = I('id');
		
		$controllers = GetControllerAndMethod::getAllController();
// 		var_dump($controllers);
		
		$Menu = M('Menu');
		$menu = $Menu->where($data)->find();
		$menus = $Menu->select();
		
// 		var_dump($controllers);
		// 遍历控制器数组，如果有$controller[i]['see'] == $menu['action']，则$menu['action']=$controller[i]['name']，并删掉$controller[i]
		for ($i=0; $i<sizeof($controllers); $i++) {
			if ($controllers[$i]['see'] == $menu['action']) {
				$menu['actionValue'] = $controllers[$i]['name'];
				unset($controllers[$i]);
			}
		}
// 		echo $menu['action'];
// 		var_dump($controllers);
// 		var_dump($menu);
		$this->assign("menu", $menu);
		$this->assign("menus", $menus);
		$this->assign("controllers", $controllers);
		$this->display("update");
	}
	/**
	 * 更新功能尚未完成
	 */
	public function update() {
		$data['id'] = I('get.id');
		$Menu = M('Menu');
		$menu = $Menu->create();
		var_dump($menu);
		$Menu->where($data)->save($menu);
		
		var_dump($data);
		$this->show("好啊");
	}
}

/**
 * Parses the PHPDoc comments for metadata. Inspired by Documentor code base
 * @category   Framework
 * @package    restler
 * @subpackage helper
 * @author     Murray Picton <info@murraypicton.com>
 * @author     R.Arul Kumaran <arul@luracast.com>
 * @copyright  2010 Luracast
 * @license    http://www.gnu.org/licenses/ GNU General Public License
 * @link       https://github.com/murraypicton/Doqumentor
 */
class DocParser {
	private $params = array ();
	function parse($doc = '') {
		if ($doc == '') {
			return $this->params;
		}
		// Get the comment
		if (preg_match ( '#^/\*\*(.*)\*/#s', $doc, $comment ) === false)
			return $this->params;
		$comment = trim ( $comment [1] );
		// Get all the lines and strip the * from the first character
		if (preg_match_all ( '#^\s*\*(.*)#m', $comment, $lines ) === false)
			return $this->params;
		$this->parseLines ( $lines [1] );
		return $this->params;
	}
	private function parseLines($lines) {
		foreach ( $lines as $line ) {
			$parsedLine = $this->parseLine ( $line ); // Parse the line
			 
			if ($parsedLine === false && ! isset ( $this->params ['description'] )) {
				if (isset ( $desc )) {
					// Store the first line in the short description
					$this->params ['description'] = implode ( PHP_EOL, $desc );
				}
				$desc = array ();
			} elseif ($parsedLine !== false) {
				$desc [] = $parsedLine; // Store the line in the long description
			}
		}
		$desc = implode ( ' ', $desc );
		if (! empty ( $desc ))
			$this->params ['long_description'] = $desc;
	}
	private function parseLine($line) {
		// trim the whitespace from the line
		$line = trim ( $line );
		 
		if (empty ( $line ))
			return false; // Empty line
		 
		if (strpos ( $line, '@' ) === 0) {
			if (strpos ( $line, ' ' ) > 0) {
				// Get the parameter name
				$param = substr ( $line, 1, strpos ( $line, ' ' ) - 1 );
				$value = substr ( $line, strlen ( $param ) + 2 ); // Get the value
			} else {
				$param = substr ( $line, 1 );
				$value = '';
			}
			// Parse the line and return false if the parameter is valid
			if ($this->setParam ( $param, $value ))
				return false;
		}
		 
		return $line;
	}
	private function setParam($param, $value) {
		if ($param == 'param' || $param == 'return')
			$value = $this->formatParamOrReturn ( $value );
		if ($param == 'class')
			list ( $param, $value ) = $this->formatClass ( $value );
		 
		if (empty ( $this->params [$param] )) {
			$this->params [$param] = $value;
		} else if ($param == 'param') {
			$arr = array (
					$this->params [$param],
					$value
			);
			$this->params [$param] = $arr;
		} else {
			$this->params [$param] = $value + $this->params [$param];
		}
		return true;
	}
	private function formatClass($value) {
		$r = preg_split ( "[\(|\)]", $value );
		if (is_array ( $r )) {
			$param = $r [0];
			parse_str ( $r [1], $value );
			foreach ( $value as $key => $val ) {
				$val = explode ( ',', $val );
				if (count ( $val ) > 1)
					$value [$key] = $val;
			}
		} else {
			$param = 'Unknown';
		}
		return array (
				$param,
				$value
		);
	}
	private function formatParamOrReturn($string) {
		$pos = strpos ( $string, ' ' );
		 
		$type = substr ( $string, 0, $pos );
		return '(' . $type . ')' . substr ( $string, $pos + 1 );
	}
}
class DocParserFactory{

	private static $p;
	private function DocParserFactory(){
	}

	public static function getInstance(){
// 		if(self::$p == null){
			self::$p = new DocParser ();
// 		}
		return self::$p;
	}

}
/**
 * 工具类
 * @author Zealpane
 */
class GetControllerAndMethod {
	/**
	 * 获取控制器
	 */
	public static function getAllController() {
	
		// 扫描路径
		$baseDir = APP_PATH.'Admin/Controller';
		// 打开文件流
		$fso = opendir($baseDir);
		// 遍历输出控制器名称，并把其放入$controllers数组中
		while($flist = readdir($fso)) {
			if (fnmatch("*.class.php", $flist)) {
				/* echo $flist.'<br/>';
				 * 取出控制器的类名
					echo substr($flist, 0, -10).'<br/>'; */
				$controllerName = substr($flist, 0, -10);
				if (!strstr($controllerName, 'Base')) {
					$controllers[] = $controllerName;
				}
			}
		}
		// 		var_dump($controllers);
		// 关闭文件流
		closedir($baseDir);
	
		// 取出每个控制器对应的文档注释
		foreach ($controllers as $value) {
			// 			echo $value.'<br/>';
			$controllerName = '\Admin\Controller\\' . $value;
			// 			echo $controllerName;
			$value = new \ReflectionClass($controllerName);
				
			$doc = $value->getDocComment();
			// 			var_dump($doc);
			$parase_result[] =  DocParserFactory::getInstance()->parse ( $doc );
			// 			var_dump($parase_result);
			// 取出文档注释中name的值
			// 			echo $parase_result['name'];
		}
		return $parase_result;
	}
	/**
	 * 获取方法以及方法注释
	 */
	public static function getMethods($controller) {
		// 		echo 'a';
		// 		var_dump(get_class());
		$reflector = new \ReflectionClass($controller); //要获取的类 命名空间 Aa/Bb/Myclass.class.php 类
		$methods = $reflector->getMethods();
		// 		dump($methods);
		foreach ($methods as $value) {
			if ($value->class === $controller) {
				// 				$Imethods['name'] = $value->name;
				$doc = $value->getDocComment();
				//解析类的注释头
				$parase_result =  DocParserFactory::getInstance()->parse ( $doc );
				$parase_result['name'] = $value->name;
				// 				var_dump( $parase_result );
				$Imethods[] = $parase_result;
			}
		}
		var_dump($Imethods);
		return $Imethods;
	}
}