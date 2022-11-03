<?php
require_once "productclasses.php";
class Validation extends Data{
    private $data;
    private $errors=[];
    
   
    public function __construct($post_data)
    {
      $this->data=$post_data;
    }
    public function validateProducts(){
      $this->validateSku();
      $this->validateName();
      $this->validatePrice();
      $this->validateProduct();
      
      
    return $this->errors;
    }
    public function validateSku(){
      $val=$this->data["sku"];
       if(empty($val)){
        $this->addError("sku","Please, submit SKU");
        
       }
       $result=$this->getProduct();
       foreach($result as $item){
        if($item["sku"]===$val){
          $this->addError("sku","SKU already exists");
        }
       }
    }
    public function validateName(){
       $val=$this->data["name"];
       if(empty($val)){
        $this->addError("name","Please, submit Name");
       }
    }
    public function validatePrice(){
      $val=$this->data["price"];
      if(empty($val)){
       $this->addError("price","Please, submit Price");
      }else if($val<0){
        $this->addError("price", "Price must be a positive number");
      }else if(!preg_match("/^(\d*\.)?\d+$/",$val)){
        $this->addError("price","Price must be numbers");
      }
   }
   public function validateProduct(){
    $select=$_POST["product"];
    if(empty($select)){
     $this->addError("product","Please, switch the type");
    }if($select=="dvdValue"){
        $this->validateSize();
    }if($select=="bookValue"){
        $this->validateWeight();
          
    }if($select=="furnitureValue"){
        $this->validateHeight();
       $this->validateLength();
      $this->validateWidth();
    }
  }
  public function validateSize(){
    $val=$this->data["size"];
    if(empty($val)){
     $this->addError("size","Please, provide size");
    }
  }
  public function validateWeight(){
    $val=$this->data["weight"];
    if(empty($val)){
     $this->addError("weight","Please, provide weight");
    } else if($val<0){
      $this->addError("weight", "Weight must be a positive number");
    }else if(!preg_match("/^(\d*\.)?\d+$/",$val)){
        $this->addError("weight","Weight must be numbers");
      }
  }
  public function validateHeight(){
    $val=$this->data["height"];
    if(empty($val)){
     $this->addError("height","Please, provide height");
    } else if($val<0){
      $this->addError("Height", "Height must be a positive number");
    }
  }
  public function validateWidth(){
    $val=$this->data["width"];
    if(empty($val)){
     $this->addError("width","Please, provide width");
    } else if($val<0){
      $this->addError("width", "width must be a positive number");
    }
  }
  public function validateLength(){
    $val=$this->data["length"];
    if(empty($val)){
     $this->addError("length","Please, provide length");
    } else if($val<0){
      $this->addError("length", "length must be a positive number");
    }
  }
    private function addError($key,$val){
     $this->errors[$key]=$val;
    }
  }
?>