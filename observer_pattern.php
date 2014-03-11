<?PHP
#观察者模式.
/*定义一种一对多的依赖关系,以便当一个对象的状态发生改变时,所有依赖它的对象都得到通知并且刷新.*/
//这个适合用于广播那里....
//定义个观察者的抽象..
class Observerable{
	private $_observers = array();
	
	public function registerObserver( $observer){
		$this->_observers[] = $observer;	
	}

	public function removeObserver($observer){
		$key = array_search($observer,$this->_observers);
		if($key!==false)
			unset($this->_observers[$key]);
	}
	//这里定义的notify对象,将调用被观察者对象的update 方法,并将自己的实例传递过去.
	//这样的目的很简单,就是用来获取 观察者对象的参数内容或调用观察者的函数.	
	public function notifyObserver(){
		foreach($this->_observers as $v){
			if($v instanceof Observer)
				$v->update($this);
		}
	}
//***************//
}//end of clazz


//下面写被观察者接口..
interface Observer{
	public function update($observer);	
}

//定义一个表示接口
Interface DisplayElement{
	public function display($data);
}

//实例化观察者对象..
class NewsObserverable extends Observerable{
	private $sportnews;
	private $localnews;
	public function setSportNews($news){
		$this->sportnews = $news;
		$this->notifyObserver();
	}
	
	public function getSportNews(){
		return $this->sportnews;
	}
	
	
	public function setLocalNews($news){
		$this->localnews = $news;
		$this->notifyObserver();
	}

	public function getLocalNews(){
		return $this->localnews;
	}
}//end of clazz


class SportObserver implements Observer, DisplayElement{
	private $_data = null;
	public function update($observer){
		if($observer->getSportNews()!=$this->_data){
			$this->_data = $observer -> getSportNews();
			$this -> display($this->_data);
		}
	}


	public function display($data){
		echo "The data is :".$data,",",date('Y-m-d H:i:s'),"\n";
	}
}

class LocalObserver implements Observer , DisplayElement{
	private $_data = null;
	public function update($observer){
		if($observer->getLocalNews()!=$this->_data){
			$this->_data = $observer->getLocalNews();
			$this->display($this->_data);
		}
	}

	public function display($data){
		echo "The data is :".$data,",",date('Y-m-d H:i:s'),"\n";
	}

}//end of clazz


?>

<?PHP
	$observerable = new NewsObserverable();
	$sport = new SportObserver();
	$local = new LocalObserver();
	$observerable -> registerObserver($sport);	
	$observerable -> registerObserver($local);
	
	$observerable -> setSportNews('Sport 1');
	$observerable -> setLocalNews('Local 1');
	$observerable -> removeObserver($sport);
	$observerable -> setSportNews('Sport 2');
	$observerable -> setLocalNews('Local 2');
	$observerable -> removeObserver($local);
	$observerable -> setLocalNews('Local 3');



?>
