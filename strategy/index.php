<?PHP
  $elements = array(
      array(
        'id'=>2,
        'name'=>'fengfu',
        'date'=>'2014-03-29'
      ),
      array(
        'id'=>3,
        'name'=>'fengfulee',
        'date'=>'2014-03-30'
      ),
  );
  
  $strategy = new Strategy($elements);
  
  $strategy->setComparator(new DateComparator());
  $strategy->sort();
  
  $strategy->setComparator(new NameComparator());
  $strategy->sort();
?>
