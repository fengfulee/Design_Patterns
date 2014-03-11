<?PHP
//装饰模式....
abstract class MessageBoardHandler{
	public function __construct(){}
	
	abstract public function filter($msg);
}

class MessageBoard extends MessageBoardHandler{
	public function filter($msg){
		return substr($msg,0,strlen($msg)-1);
	}
}

class MessageBoardDecorator extends MessageBoardHandler{
	private $_handler = null;
	public function __construct($handler){
		parent::__construct($handler);
		$this->_handler = $handler;
	}
	
	public function filter($msg){
		$this->_handler->filter($msg);
	}
}

class HtmlFilter extends MessageBoardDecorator{
	public function __construct($handler){
		parent::__construct($handler);
	}
	
	public function filter($msg){
		return parent::filter(substr($msg,0,strlen($msg)-1));
	}
}

class SensitiveFilter extends MessageBoardDecorator{
	public function __construct($handler){	
		parent::__construct($handler);
	}

	public function filter($msg){
		return parent::filter(substr($msg,0,strlen($msg)-1));
	}
}

	$obj = new HtmlFilter(new SensitiveFilter(new MessageBoard()));
	echo $obj->filter('abcdefg'),"\n";
?>
