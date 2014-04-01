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
        //1,执行bios程序.
        $this->bios ->execute();
        //2,加载系统.
        $this->bios -> launch($this->os);
        
      }
      
      //
      public function turnOff()
      {
       //第一步将系统关闭.. 
        $this->os->halt();
        //第二步将bios关闭.
        $this->bios->powerDown();
      }      
    }//end of clazz...
?>
