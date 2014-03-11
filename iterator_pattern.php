<?PHP
//该类实现了迭代器模式....
//迭代器的使用场景..
//1 访问一个聚合对象的内容而无需暴露它的内部表示
//2 支持对聚合对象的多种遍历.
//3 为遍历不同的聚合结构提供统一的接口...
class MyIterator implements Iterator{
	//定义一个数组..
	private $arr = array();
	
	public function __construct(array $arr){
		$this->arr = $arr;
	}

	//实现Iterator接口需要实现5个方法..
	//rewind,current,key,valid,next

	public function rewind(){
		reset($this->arr);
	}

	public function current(){
		return current($this->arr);
	}

	public function key(){
		return key($this->arr);
	}

	public function next(){
		return next($this->arr);
	}

	public function valid(){	
		return $this->current()!==false;	//如果有内容则返回 true,否则,false;
	}
}
?>

<?PHP
	$arr = array(1,2,3,4,5);
	$iterator = new MyIterator($arr);
	foreach($iterator as $value){
		echo $value,"\n";
	}
?>
