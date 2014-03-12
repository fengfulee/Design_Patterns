<?PHP
//策略模式.  在此模式下,算法是从复杂类中提取的.可以方便的替换.
//定义一个策略接口...
Interface Strategy{
	function filter($record);
}
//实现策略接口...
class FindAfterStrategy implements Strategy{
	private $name;
	public function __construct($name){
		$this->name = $name;
	}

	public function filter($record){
		return strcmp($this->name,$record)<=0;	//字符串安全比较,前面小于后面返回 负数
							//		前面大于后面 返回 正数
							//		前面等于 后面 返回 零
		
	}

}
//实现策略接口
class RandomStrategy implements Strategy{
	public function filter($record){
		return rand(0,1)>=0.5;
	}
}

//	决策调用类.
class UserList{
	private $_list = array();
	
	public function __construct($names){
		if(is_array($names)){
			$this->_list = array_values($names);
		}else	return false;
	}

	public function add($name){
		$this->_list[] = $name;
	}
	//传递决策句柄,调用决策对象方法..	
	public function find($filter){
		$arr = array();
		foreach($this->_list as $v){
			if($filter->filter($v))	
				$arr[] = $v;
		}

		return $arr;
	}
}

	$user = new UserList(array('Andy','Jack','Lori','Megan'));
	print_r($user->find(new FindAfterStrategy('J')));
	print_r($user->find(new RandomStrategy()));
?>
