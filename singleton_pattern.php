<?PHP
//单例模式的实现...singleton...
class Singleton{
	private $id;
	private	static  $_instance  = null;
	//这里定义一个私有的构造方法,这样外部就不能通过 new Singleton() 来实例化该对象了...	
	private function __construct($id){
		$this->id = $id;
	}
	//静态方法,用于创建对象,并且控制对象只有一个...	
	public static function getInstance($id){
		if(self::$_instance!==null){
			return self::$_instance;
		}else{
			self::$_instance = new Singleton($id);	//这里是函数的内部,可以调用该构造方法.
			return self::$_instance;
		}
	}
	//展示方法...
	public function display(){
		echo "The Singleton`s id is :".$this->id."!\n";	
	}
}
?>

<?php
	//如果使用下面的new 方法实例化,则会报错.
	#$sing = new Singleton('fengfu');
	#PHP Fatal error:  Call to private Singleton::__construct() from invalid context
	# in /git/Design_Patterns/singleton_pattern.php on line 27
	
	$singleton = Singleton::getInstance('fengfulee');
	$singleton->display();
?>
