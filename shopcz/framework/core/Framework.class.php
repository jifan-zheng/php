<?php
//核心启动类
class Framework{
	//run方法
	public static function run() {
		// echo "hello,world";
		self::init();
		self::autoload();
		self::dispatch();
	}

	//初始化方法
	private static  function init(){
		//初始化路径常量
		define("DS",DIRECTORY_SEPARATOR);
		define("ROOT", getcwd() . '/');//根目录
		define("APP_PATH",ROOT . "application" . DS);
		define("FRAMEWORK_PATH",ROOT . "framework" .DS);
		define("PUBLIC_PATH",ROOT . "public" . DS);
		define("CONFIG_PATH",APP_PATH . "config" .DS);
		define("CONTROLLER_PATH",APP_PATH . "controllers" .DS);
		define("MODEL_PATH",APP_PATH . "models" . DS);
		define("VIEWS_PATH",APP_PATH . "views" . DS);
		define("CORE_PATH",FRAMEWORK_PATH . "core" . DS);
		define("DB_PATH",FRAMEWORK_PATH . "databases" . DS);
		define("LIB_PATH",FRAMEWORK_PATH . "libraries" . DS);
		define("HELPER_PATH",FRAMEWORK_PATH . "helpers" . DS);
		define("UPLOAD_PATH",PUBLIC_PATH . "upload" . DS);
		//index.php?p=admin&c=goods&a=add  分别获取URI中的平台下的控制器和该控制器下的方法
		define("PLATFORM",isset($_GET['p'])? $_GET['p']:"admin");
		define("CONTROLLER",isset($_GET['c'])? ucfirst($_GET['c']):"Index");
		define("ACTION",isset($_GET['a'])? $_GET['a']:"index");
		//获取当前平台下的 控制器的路径和视图的路径  c=goods  .  p=admin&c=goods
		define("CUR_CONTROLLER_PATH", CONTROLLER_PATH . PLATFORM . DS);
		define("CUR_VIEW_PATH",VIEWS_PATH . PLATFORM . DS);
		//加载核心类(定义了最顶层的父类的方法 ，这个父类包括了控制器，模型和数据库）
		include CORE_PATH . "Controller.class.php";
		include CORE_PATH . "Model.class.php";
		//载入数据库类
		include DB_PATH . "Mysql.class.php";
		//载入配置文件
		$GLOBALS['config'] = include CONFIG_PATH . "config.php";

	}


	//路由分发
	//index.php?p=admin&c=goods&a=add //后台的GoodsController中的addAction
	private static   function dispatch(){
		$controller_name = CONTROLLER . "Controller";
		$action_name = ACTION . "Action";
		//实例化对象
		$controller = new $controller_name();
		//调用方法
		$controller->$action_name();
	}

	//自动载入
	//此处，只加载application中的controller和model
	private static  function  autoload(){
		spl_autoload_register(array(__CLASS__,'load'));  //__CLASS__：当前类
		//或者
		//sql_autoload_register("self::load");
	}
	//完成指定类的加载
	//只加载application中的controller和model，如GoodsController，BrandModel
	public static function load($classname){
		if(substr($classname,-10)== 'Controller'){
			//加载控制器
			include CUR_CONTROLLER_PATH . "{$classname}.class.php";

		}elseif (substr($classname,-5)=="Model"){
			//加载模型
			// echo $classname;
			include MODEL_PATH . "{$classname}.class.php";
		}else{
			//省略
			// echo "nihao";
			// echo substr($classname,-15);
		}
	} 

}
?>