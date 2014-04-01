<?PHP
namespace Facade;
  interface BiosInterface{
    //执行这个bios芯片..
    public function execute();
    
    //加载系统..
    public function launch(OsInterface $os)();
    
    //关闭bios,这是在关闭系统之后干的事情...
    public function powerDown();
  }
?>
