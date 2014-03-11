<?PHP
//工厂模式,相关类的实例化交给这个类来处理..

	//定义一个human的接口..
	interface Human{
		public function getName();
		public function setName($name);
	}

	class Teacher implements Human{
		private $name;
		public function setName($name) {
			$this-> name = $name;
		}
		public function getName(){
			$_name = $this->name;
			return $_name;
		}
		public function __construct($name){
			$this->name = $name;
		}
		public function teach(){
			echo "I am a teacher,My name is {$this->name},I love teaching!\n";
		}
	}

	class Student implements Human{
		private $name;
		public function setName($name){
			$this->name = $name;
		}
		public function __construct($name){
			$this->name = $name;
		}
		public function getName(){
			return $this->name;
		}

		public function study(){	
			echo "I am a student,My name is {$this->name},I love studying!\n";	
		}
	}

	class Factory{
		
		public static function  _factory($name,$args=null){
			if(class_exists($name)){
				return new $name($args);
			}else{
				return null;
			}
		}
	}
?>

<?PHP
	$teacher = Factory::_factory('Teacher','fengfulee');
	$student = Factory::_factory('Student','lichao');
	$teacher->teach();
	$student->study();
?>
