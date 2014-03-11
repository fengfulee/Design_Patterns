<?PHP
/*
为解除请求的发送者和接收者之间的耦合,而使用多个对象都用机会处理这个请求,将这些对象连成一条链,并沿着这条链传递该请求,直到有一个对象处理它

*/

	abstract class Handler{
		protected $_handler = null;
		//设置继承者..
		public function setSuccessor($handler){
			$this->_handler = $handler;
		}
	}

	class CheckZeroHandler extends Handler{	
		public function handleRequest($request){
			if($request == 0){
				echo "0 is ZERO\n";
			}else{
				$this->_handler->handleRequest($request);
			}
		}
		
	}

	class CheckEvenHandler extends Handler{
		public function handleRequest($request){
			if($request%2==0){
				echo "$request is EVEN\n";
			}else{
				$this->_handler -> handleRequest($request);
			}
		}
	}

	class CheckOddHandler extends Handler{
		public function handleRequest($request){	
			if($request%2!=0){
				echo "$request is ODD\n";
			}else{
				$this->_handler ->handleRequest($request);
			}
		}
	}



?>
<?PHP
	$checkzero = new CheckZeroHandler();
	$checkeven = new CheckEvenHandler();
	$checkodd = new CheckOddHandler();

	$checkzero->setSuccessor($checkeven);
	$checkeven->setSuccessor($checkodd);
	$arr = array(3,4,5,6,0);
	foreach($arr as $v){
		$checkzero->handleRequest($v);
	}
?>
