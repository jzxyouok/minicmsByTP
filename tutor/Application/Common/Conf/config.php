<?php
return array (
		
		// '配置项'=>'配置值'
		// PDO连接方式
		'DB_TYPE' => 'pdo', // 数据库类型
		'DB_USER' => 'root', // 用户名
		'DB_PWD' => '', // 密码
		'DB_PREFIX' => '',
		'DB_DSN' => 'mysql:host=localhost;dbname=mycms;charset=UTF-8',
		
		'LANG_SWITCH_ON' => true, // 开启语言包功能
		'LANG_AUTO_DETECT' => true, // 自动侦测语言 开启多语言功能后有效
		'LANG_LIST' => 'zh-cn', // 允许切换的语言列表 用逗号分隔
		'VAR_LANGUAGE' => 'l' 
);