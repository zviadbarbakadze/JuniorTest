<?php 

require_once "productclasses.php";

class Delete extends Connect{
  public function delete(){
    $conn=$this->dataconnect();
    $checkboxes=$_POST["checkbox"];
    if(!$checkboxes){
      header("Location:index.php");
    }
    $extract=implode(",",$checkboxes);
    $query="DELETE FROM product WHERE id IN($extract)";
    if($conn->query($query)){
      header("Location:index.php");
    }
  }
}
if(isset($_POST["mass-delete"])){
  $delete=new Delete();
  $delete->delete();
}


?>