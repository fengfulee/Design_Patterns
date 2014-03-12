<?PHP
//调节者模式.协同多个College 共同工作.
//同事接口..多个同事同时实现该接口定义的方法...
interface Filter{
	function filter($value);
}
//1
class TrimFilter implements Filter{
	function filter($value){
		return trim($value);	
	}
}
//2
class HtmlEntitiesFilter implements Filter{
	function filter($value){
		return htmlentities($value);
	}
}
//3
class EmptyFilter implements Filter{
	function filter($value){
		return empty($value)?'':$value;
	}
}
//调节者在这里....Mediator
class InputMediator{
	//专门存储多个同事的数组...
	private $_filters = array();
	private $_value ;
	public function setValue($value){
		$this->_value = $this->filter($value);
	}
	//添加Filter 的方法..这个方法能够返回该对象本身..可以执行连接式的添加Filter操作..
	public function addFilter(Filter $filter){
		$this->_filters[] = $filter;
		return $this;
	}
	//调节方法
	public function filter($value){
		foreach($this->_filters as $v)	{
			$value  = $v -> filter($value);	
		}
		return $value;

	}
	//获取内容
	public function getValue(){
		return $this->_value;
	}
}
?>

<?PHP
	$mediator = new InputMediator();
	$mediator->addFilter(new TrimFilter())->addFilter(new HtmlEntitiesFilter())->addFilter(new EmptyFilter());
	$mediator -> setValue('You should use the <h1>-<h6>tags for your headings');
	echo $mediator->getValue(),"\n";
?>
