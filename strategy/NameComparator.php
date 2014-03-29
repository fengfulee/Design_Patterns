<?PHP
//通过字符串来进行比较.
  class NameComparator implements ComparatorInterface{
    
    public function compareSort($a,$b){
      return strcmp($a['name'],$a['name']);
    }
    
  }//end of clazz...
?>
