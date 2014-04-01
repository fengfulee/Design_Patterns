<?PHP

  class Facade{
      protected $os;
      protected $bios;
      
      public function __construct(BiosInterface $bios,OsInterface $os){
        $this->os = $os;
        $this->bios = $bios;
      }
      
      
      //这里对外提供两个函数..
      public function turnOn(){
        //1
        $this->bios ->execute();
        $this->bios -> launch($this->os);
        
      }
      
      //
      public function turnOff()
      {
        
        $this->os->halt();
        $this->bios->powerDown();
      }      
    }//end of clazz...
?>
