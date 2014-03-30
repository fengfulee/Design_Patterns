<?PHP 
  //在这里进行整个的组装流程....
  
  class Director{
    
    //
    //这里需要实例化一个生产车间给我们的监督类..
    public function build(BuilderInterface $builder){
      $builder -> createVehicle();  //这一步先将车子的骨架给弄出来...
      $builder -> addDoors();       //加上门.
      $builder -> addWheel();       //加上轮子.
      $builder -> addEngine();      //加上引擎..
      
      return $builder->getVehicle();  //将这部车子返回....
    }
  }
?>
