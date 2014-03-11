<?PHP
#代理模式的作用和父类以及接口和组合的作用比较类似...为了聚合共用的代码.减少公共部分代码..	
#定义一个代理类.
class Printer{

	//定义代理类的一些方法..
	public function printA($str){
		if(is_array($str)){
			echo "<pre>";
			var_dump($str);
			echo "</pre>";
		}else{
			print_r($str);
		}
	}
}
//文件打印店..需要代理Printer 类..
class TextShopProxy{
	private $printer;	//这是代理类的变量...
	public function __construct($printer){
		$this->printer = $printer;
	}

	//其他业务.
	public function sellPaper(){
		echo "I also sell paper\n";
	}

	//使用_call 方法..将代理对象有的功能交给代理实体去处理.
	public function __call($method,$args){
		if(method_exists($this->printer,$method)){
			$this->printer->$method($args);
		}
	}
}


//照相馆,需要代理Printer 类..
class PhotoShopProxy{
	private $printer;
	public function __construct($printer){
		$this->printer = $printer;
	}
	
	//其他业务.
	public function takePhoto(){
		echo "I can take photos\n";
	}

	//同样使用 call方法 转交代理类的方法..
	public function __call($method,$args){	
		if(method_exists($this->printer,$method)){
			$this->printer->$method($args);
		}
	}
}

?>


<?PHP
/////test/////
	$printer = new Printer();
	$textshop = new TextShopProxy($printer);
	$photoshop = new PhotoShopProxy($printer);
	$array = Array(1,2,3,4,5);
	$str = 'Hello world';
	$textshop->sellPaper();
	$textshop->printA($array);
	$photoshop->takePhoto();
	$photoshop->printA($str);
?>
