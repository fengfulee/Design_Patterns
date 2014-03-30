<?PHP
namespace Builder;
  interface BuilderInterface{
    //首先创建这个对象..
    public function createVehicle();
    
    //下面是给这个对象添加一些内容...
    public function addWheel();
    
    public function addEngine();
    
    public function addDoors();
    
    public function getVehicle();
  }
?>
