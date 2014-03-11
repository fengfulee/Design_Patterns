<?PHP
//解释器模式...复合分层结构..
//定义一个基类.
class Expression{
	//定义一个方法,子类会去重写这个方法..
	function interpreter($str){
		return $str;
	}
}
//这个类专门用来处理 数字类字符串...
class ExpressionNum extends Expression{
	function interpreter($str){
		switch($str){
			case '0':return '零';
			case '1' :return '一';
			case '2' :return '二';
			case '3' :return '三';
			case '4' :return '四';
			case '5' :return '五';
			case '6' :return '六';
			case '7' :return '七';
			case '8' :return '八';
			case '9' :return '九';
		}
	}
}
//这个类专门用来处理 字符...转化为大写..
class ExpressionCharacter extends Expression{
	function interpreter($str){
		return strtoupper($str);
	}
}

class Interpreter{
	function execute($string){
		$expression = null;
		for($i=0;$i<strlen($string);$i++){
			$temp = $string[$i];
			switch($temp){
				case is_numeric($temp):
					$expression = new ExpressionNum();
					break;
				default:
					$expression = new ExpressionCharacter();
					break;
			}
			echo $expression->interpreter($temp);
		}
	}
}
	$obj = new Interpreter();
	$obj->execute("123456abc");
	echo "\n";
>
