<?PHP
  //自行车制造厂...
  class BikeBuilder implements BuilderInterface{
    
      //
      protected $bike;  //正在生产线上的自行车....
      public function addDoors(){
      
      }
      
      public funtion addEngine(){
        $this->bike->setPart('engine',new Builder\Parts\Engine());
      }
      
      public function addWheel(){
        $this->bike->setPart('forwartWheel',new Builder\Parts\Wheel());
        $this->bike->setPart('rearWheel',new Builder\Parts\Wheel());
        
      }
      //这个是第①步.
      public function createVehicle(){
        $this->bike = new Builder\Parts\Bike();
      }
      
      //这个是最后一步.将自行车取出来...
      public function getVehicle(){
        return $this->bike;
      }
  }
?>
