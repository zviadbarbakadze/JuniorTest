<?php
class Connect{
  private $host='localhost';
  private $user='root';
  private $password='';
  private $database='products';
  
  
  public function dataconnect()
  {
    $con=new mysqli($this->host,$this->user,$this->password,$this->database);
    return $con;
  }
}
class Data extends Connect{
  public function getProduct(){
    $conn=$this->dataconnect();
    $query='SELECT * FROM product';
    $result=$conn->query($query);
    return $result;
  }
}
abstract class MainClass extends Connect{
 
  
  abstract protected function setProduct($inputData);
  
 
}

class Dvd extends MainClass {
 
  
  public function setProduct($inputData){
    $select=$_POST["product"];
    if($select=="dvdValue"){
    $conn=$this->dataconnect();
    $data="'".implode( "','", $inputData)."'";
    $query="INSERT INTO product(sku,name,type,sizevalue,size,price) VALUES($data)";
    if($conn->query($query)){
      header("Location:index.php");
    }
   }
  }
}
class Book extends MainClass {
  public function setProduct($inputData){
    $select=$_POST["product"];
    if ($select=="bookValue"){
    $conn=$this->dataconnect();
    $data="'".implode( "','", $inputData)."'";
    $query="INSERT INTO product(sku,name,type,weight,size,price) VALUES($data)";
    if($conn->query($query)){
      header("Location:index.php");
     }
    }
  }
}
class Furniture extends MainClass {
  public function setProduct($inputData){
    $select=$_POST["product"];
    if($select=="furnitureValue"){
    $conn=$this->dataconnect();
    $data="'".implode( "','", $inputData)."'";
    $query="INSERT INTO product(sku,name,type,height,width,length,size,price) VALUES($data)";
    if($conn->query($query)){
      header("Location:index.php");
      }
    }
  }
}

?>     






 
 



  
   
    
   
   
      
  


  
 
    
    
    
         
  
            
        
        
        
           
             
         
        
    




    