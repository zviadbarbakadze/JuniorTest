<?php
 require_once "productclasses.php";
 require_once "validation.php";


if(isset($_POST["submit"]))
{
    $validation=new Validation($_POST);
    $errors=$validation->validateProducts();
   
    $dvdData=[
      $sku=$_POST["sku"],
      $name=$_POST["name"],
      $hiddenInput1=$_POST["hiddenInputdvd1"],
      $size=$_POST["size"],
      $hiddenInput2=$_POST["hiddenInputdvd2"],
      $price=$_POST["price"]
    ];
  
  
      $bookData=[
         $sku=$_POST["sku"],
         $name=$_POST["name"],
         $hiddenInput1=$_POST["hiddenInputbook1"],
         $weight=$_POST["weight"],
         $hiddenInput2=$_POST["hiddenInputbook2"],
         $price=$_POST["price"]
        ];
        
   
        $furnitureData=[
          $sku=$_POST["sku"],
          $name=$_POST["name"],
          $hiddenInput1=$_POST["hiddenInputfurniture"],
          $height=$_POST["height"],
          $width=$_POST["width"],
          $length=$_POST["length"],
          $hiddenInput1=$_POST["hiddenInputfurniture2"],
          $price=$_POST["price"]
        ];
      
    if(!$errors){
      $dvd=new Dvd();
      $dvd->setProduct($dvdData);
      
   
      $book=new Book();
      $book->setProduct($bookData);
    
      $furniture=new Furniture();
      $furniture->setProduct($furnitureData);
    
    }
           
        
  }


?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    
    
<title>Products</title>
</head>
<body>
    
<form id="product_form" class="container" method="POST">
  <div class=" container d-flex justify-content-between flex-wrap mt-5 border-bottom border-dark">
     <h1 class="mx-3">Product Add</h1>
     <div class="mb-3 mt-3">
      <button class="btn btn-success mx-3" type="submit" name="submit">Save</button>
      <a href="index.php" class="btn btn-warning">Cancel</a>
     </div>
  </div>
    
 
  
  <div class="mb-3 mt-3">
    <label class="form-label fw-bold ">SKU</label>
    <input type="text" id="sku" class="form-control col-6"  name="sku" placeholder="SKU" value="<?php echo $_POST['sku'] ?? '' ?>" >
    <div class="text-danger"><?php echo $errors["sku"] ?? '' ?></div>
  </div>
  <div class="mb-3 ">
    <label class="form-label fw-bold">Name</label>
    <input type="text" id="name" class="form-control"  name="name" placeholder="Name" value="<?php echo $_POST['name'] ?? '' ?>" >
    <div class="text-danger"><?php echo $errors["name"] ?? '' ?></div>
  </div>
  <div class="mb-3">
    <label class="form-label fw-bold" >Price($)</label>
    <input type="decimal" id="price" class="form-control"  name="price" placeholder="Price" value="<?php echo $_POST['price'] ?? '' ?>" >
    <div class="text-danger"><?php echo $errors["price"] ?? '' ?></div>
  </div>

 <label class="form-label fw-bold">Type Switcher</label>
 <select id="productType" class="form-select form-select-lg mb-3"  name="product"  onChange="products(this.value);" >
    <option value="" selected hidden >Type Switcher</option>
    <option value="dvdValue" name="dvd" id="DVD">DVD</option>
    <option value="bookValue" name="book" id="Book">Book</option>
    <option value="furnitureValue" name="furniture" id="Furniture">Furniture</option>
  </select> 
  <div class="text-danger"><?php echo $errors["product"] ?? '' ?></div>
                   
                
  <div style="display:none" id="div_for_dvd">
      <label  class="form-label fw-bold">Size(MB)</label>
      <input id="size"  placeholder="Size"  class="form-control" type="number" name="size" value="<?php echo $_POST['size'] ?? '' ?>" >
      <div class="text-danger"><?php echo $errors["size"] ?? '<div class="text-dark">Please provide size</div>' ?></div>    
      <input type="text" id="hiddenInput" name="hiddenInputdvd1" value="Size: " hidden>
      <input type="text" id="hiddenInput" name="hiddenInputdvd2" value="MB" hidden>
  </div>
   
   <div style="display:none" id="div_for_book">
     <label class="form-label fw-bold">Weight(KG)</label>
     <input id="weight"  placeholder="Weight"  class="form-control" type="decimal"  name="weight"  value="<?php echo $_POST['weight'] ?? '' ?>" >
     <div class="text-danger"><?php echo $errors["weight"] ?? '<div class="text-dark">Please provide weight</div>' ?></div>    
     <input type="text" id="hiddenInput" name="hiddenInputbook1" value="Weight" hidden>
     <input type="text" id="hiddenInput" name="hiddenInputbook2" value="KG" hidden>
  </div>
   
   <div class="mb-3" style="display:none" id="div_for_furniture">
     <label class="form-label fw-bold">Height(CM)</label>
     <input id="height" placeholder="Height" class="form-control" type="number" name="height" value="<?php echo $_POST['height'] ?? '' ?>">
     <div class="text-danger"><?php echo $errors["height"] ?? '<div class="text-dark">Please provide height</div>' ?></div> 
     <label class="form-label fw-bold">Width(CM)</label>
     <input id="width" placeholder="Width"  class="form-control" type="number" name="width" value="<?php echo $_POST['width'] ?? '' ?>" >
     <div class="text-danger"><?php echo $errors["width"] ?? '<div class="text-dark">Please provide width</div>' ?></div>       
     <label class="form-label fw-bold">Length(CM)</label>
     <input id="length" placeholder="Length" class="form-control" type="number" name="length" value="<?php echo $_POST['length'] ?? '' ?>" >
     <div class="text-danger"><?php echo $errors["length"] ?? '<div class="text-dark">Please provide length</div>' ?></div>         
     <input type="text" id="hiddenInput" name="hiddenInputfurniture" value="Dimension" hidden>
     <input type="text" id="hiddenInput" name="hiddenInputfurniture2" value="" hidden>
   </div>  
    
   
    
    
            
    
  </form>
  
  <footer class=" container  border-top border-dark text-center mt-5">
        <h5 class="m-3">Scandiweb Test assignment</h5>
  </footer>
    

  
           
 
  

  
  
 
  


   
 
  
  <script src="script.js"></script>
</body>
</html>