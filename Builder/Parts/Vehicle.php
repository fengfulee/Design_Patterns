<?PHP
  abstract class Vehicle{
    //抽象类,
    var $data;
    
    //string $key
    //mixed $value
    public function setPart($key,$value){
      $this->data[$key] = $value;
    }
  }
?>
