<?PHP
#简单实现 命令模式.
/*
PHP 命令模式相当于程序中的回调,
命令模式是在一个方法调用之上的抽象,吸收了面向对象的好处:合成,继承,处理.
*/
	#定义一个接口.
	interface Validator{
		#定义一个 check函数的抽象..具体实现在实现它的类里面进行...感觉这好像Java里面的多态....
		#具体怎么 check,在实现它的类中进行定义..
		public function check($value);
	}
	#其中的一种实现...
	class GreaterThanZeroValidator implements Validator {
		public function check($value){
			return $value>0;	#>0 return true,else return falsel;
		}
	} 
	#其中的一种实现..
	class EvenValidator implements Validator{
		public function check($value){
			return $value%2==0;	#if $value%2==0 return true else return false;
		}
	}
	//在这里调用命令...
	class Test{
		protected $_rule = null;	//这里保存的是Validator对象..
		public function __construct(Validator $rule){
			$this->_rule = $rule;
		}

		public function process($arr){
			foreach($arr as $v){
				if($this->_rule->check($v))	{
					echo $v,"\n";
				}
			}
		}
	}
?>

<?PHP
	//test
	$test = new Test(new GreaterThanZeroValidator);
	$arr = array(1,20,18,15,-3,2,-6);
	$test->process($arr);
	echo "\n";

	$test1 = new Test(new EvenValidator);
	$test1 -> process($arr);
?>
