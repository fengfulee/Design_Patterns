<?PHP
  //汽车的生产车间...
  class CarBuilder implements BuilderInterface{
    //
    protected $car;
    
    public function addDoors(){
      $this->car->setPart('rightdoor',new Builder\Parts\Door());
      $this->car->setPart('leftdoor',new Builder\Parts\Door());
    }
    
    public function addEngine(){
      $this->car->setPart('engine',new Builder\Parts\Engine());
    }
    
    public function addWheel(){
        $this->car->setPart('wheelLF', new Builder\Parts\Wheel());
        $this->car->setPart('wheelRF', new Builder\Parts\Wheel());
        $this->car->setPart('wheelLR', new Builder\Parts\Wheel());
        $this->car->setPart('wheelRR', new Builder\Parts\Wheel());
    }
    
    public function createVehicle(){
      $this->car = new Builder\Parts\Car();
    }
    
    public function getVehicle(){
      return $this->car;
    }
  }
?>
