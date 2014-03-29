<?PHP
  class Stragegy{
      private $elements;  //比较的元素.
      
      private $comparator;  //比较器.
      
      public function __construct(array $element = array()){
        $this->elements = $elements;
      }
      
      public function sort(){
        if(!$this->comparator){
          throw \LogicException('Comparator is not set');
        }else{
          $callback = array($this->comparator,'compareSort');
          uasort($this->elements,$callback);
        }
      }
      
      public function addComparator(Comparator $comparator){
        $this->comparator = $comparator;
      }
  }
?>
