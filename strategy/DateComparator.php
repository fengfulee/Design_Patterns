<?PHP
  //通过日期的方式进行比较.
  class DateComparator implements ComparatorInterface{
    
    public function compareSort($a,$b){
      $date_a = strtotime($a['date']);
      $date_b = strtotime($b['date]);
      if($date_a==$date_b){
        return 0;
      }else{
        return $date_a<$date_b?-1:1;
      }
      
    }
    
  }//end of clazz...
